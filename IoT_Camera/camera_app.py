import cv2
import os
import time
import logging
import numpy as np
import winsound

logging.basicConfig(level=logging.INFO, format='%(asctime)s - %(levelname)s - %(message)s')

class AdvancedIoTCamera:
    def __init__(self, camera_index=0, width=1280, height=720):
        self.camera_index = camera_index
        self.width = width
        self.height = height
        
        self.exposure = None
        self.iso = None
        
        self.key_capture = ord('c')
        self.key_burst = ord('b')
        self.key_quit = ord('q')
        
        self.save_dir = "captures"
        os.makedirs(self.save_dir, exist_ok=True)
        
        self.cap = None
        self.is_bursting = False
        self.burst_count = 0
        self.flash_frames = 0
        
        self.prev_frame_time = 0
        self.new_frame_time = 0

    def setup_camera(self):
        self.cap = cv2.VideoCapture(self.camera_index, cv2.CAP_DSHOW) 
        
        if not self.cap.isOpened():
            self.cap = cv2.VideoCapture(self.camera_index)
            if not self.cap.isOpened():
                logging.error("Failed to open camera hardware.")
                return False
            
        self.cap.set(cv2.CAP_PROP_FRAME_WIDTH, self.width)
        self.cap.set(cv2.CAP_PROP_FRAME_HEIGHT, self.height)
        
        if self.exposure is not None:
            self.cap.set(cv2.CAP_PROP_AUTO_EXPOSURE, 0.25)
            self.cap.set(cv2.CAP_PROP_EXPOSURE, self.exposure)
            
        if self.iso is not None:
            self.cap.set(cv2.CAP_PROP_ISO_SPEED, self.iso)
            
        return True

    def play_shutter_sound(self, mode="single"):
        if mode == "single":
            winsound.Beep(1500, 100)
        elif mode == "burst":
            winsound.Beep(1000, 50) 

    def draw_advanced_hud(self, frame):
        h, w = frame.shape[:2]
        overlay = frame.copy()
        
        grid_color = (255, 255, 255)
        cv2.line(overlay, (w//3, 0), (w//3, h), grid_color, 1)
        cv2.line(overlay, (2*w//3, 0), (2*w//3, h), grid_color, 1)
        cv2.line(overlay, (0, h//3), (w, h//3), grid_color, 1)
        cv2.line(overlay, (0, 2*h//3), (w, 2*h//3), grid_color, 1)
        
        alpha = 0.15
        cv2.addWeighted(overlay, alpha, frame, 1 - alpha, 0, frame)

        bracket_color = (0, 255, 255) 
        cx, cy = w//2, h//2
        s = 30 
        cv2.line(frame, (cx-s, cy-s), (cx-s+10, cy-s), bracket_color, 2)
        cv2.line(frame, (cx-s, cy-s), (cx-s, cy-s+10), bracket_color, 2)
        cv2.line(frame, (cx+s, cy-s), (cx+s-10, cy-s), bracket_color, 2)
        cv2.line(frame, (cx+s, cy-s), (cx+s, cy-s+10), bracket_color, 2)
        cv2.line(frame, (cx-s, cy+s), (cx-s+10, cy+s), bracket_color, 2)
        cv2.line(frame, (cx-s, cy+s), (cx-s, cy+s-10), bracket_color, 2)
        cv2.line(frame, (cx+s, cy+s), (cx+s-10, cy+s), bracket_color, 2)
        cv2.line(frame, (cx+s, cy+s), (cx+s, cy+s-10), bracket_color, 2)

        self.new_frame_time = time.time()
        fps = 1 / (self.new_frame_time - self.prev_frame_time) if (self.new_frame_time - self.prev_frame_time) > 0 else 0
        self.prev_frame_time = self.new_frame_time
        cv2.putText(frame, f"FPS: {int(fps)}", (20, 40), cv2.FONT_HERSHEY_SIMPLEX, 0.6, (0, 255, 0), 2)

        mean_brightness = np.mean(frame)
        meter_x = w - 40
        meter_y = int(h * 0.2)
        meter_h = int(h * 0.6)
        cv2.rectangle(frame, (meter_x, meter_y), (meter_x + 15, meter_y + meter_h), (255, 255, 255), 1)
        
        fill_h = int((mean_brightness / 255.0) * meter_h)
        bar_color = (0, 0, 255) if mean_brightness < 50 or mean_brightness > 200 else (0, 255, 0)
            
        cv2.rectangle(frame, (meter_x+2, meter_y + meter_h - fill_h), (meter_x + 13, meter_y + meter_h), bar_color, -1)
        cv2.putText(frame, "EXP", (meter_x-5, meter_y - 10), cv2.FONT_HERSHEY_SIMPLEX, 0.4, (255,255,255), 1)

        cv2.putText(frame, f"RES: {w}x{h}", (20, 70), cv2.FONT_HERSHEY_SIMPLEX, 0.6, (255, 255, 255), 1)
        controls_text = "[C] Capture   [B] Burst Hold   [Q] Quit"
        cv2.putText(frame, controls_text, (20, h - 30), cv2.FONT_HERSHEY_SIMPLEX, 0.6, (200, 200, 200), 2)
        
        if self.is_bursting:
            if int(time.time() * 10) % 2 == 0:
                cv2.rectangle(frame, (0, 0), (w-1, h-1), (0, 0, 255), 4)
            cv2.circle(frame, (w - 180, 40), 8, (0, 0, 255), -1)
            cv2.putText(frame, f"REC [{self.burst_count}]", (w - 160, 45), cv2.FONT_HERSHEY_SIMPLEX, 0.7, (0, 0, 255), 2)
            
        if self.flash_frames > 0:
            flash_overlay = frame.copy()
            cv2.rectangle(flash_overlay, (0, 0), (w, h), (255, 255, 255), -1)
            cv2.addWeighted(flash_overlay, 0.5, frame, 0.5, 0, frame)
            self.flash_frames -= 1
            
        return frame

    def save_image(self, frame, prefix="img"):
        timestamp = time.strftime("%Y%m%d_%H%M%S")
        ms = int((time.time() % 1) * 1000)
        filename = os.path.join(self.save_dir, f"{prefix}_{timestamp}_{ms:03d}.jpg")
        cv2.imwrite(filename, frame)
        return filename

    def run(self):
        if not self.setup_camera():
            return
            
        logging.info("Advanced Live Preview Started.")
        
        while True:
            ret, frame = self.cap.read()
            if not ret:
                logging.error("Failed to read from hardware sensor.")
                break
                
            clean_frame = frame.copy()
            hud_frame = self.draw_advanced_hud(frame)
            
            cv2.imshow("Advanced IoT Camera", hud_frame)
            
            key = cv2.waitKey(1) & 0xFF
            
            if key == self.key_quit:
                logging.info("Terminating process...")
                break
            elif key == self.key_capture:
                fname = self.save_image(clean_frame, "capture")
                logging.info(f"Captured high-res: {fname}")
                self.flash_frames = 4 
                self.play_shutter_sound("single")
            elif key == self.key_burst:
                self.is_bursting = True
                fname = self.save_image(clean_frame, "burst")
                self.burst_count += 1
                logging.info(f"Burst frame saved: {fname}")
                self.flash_frames = 1
                self.play_shutter_sound("burst")
            else:
                if self.is_bursting:
                    logging.info(f"Burst mode sequence completed. Frames: {self.burst_count}")
                self.is_bursting = False
                self.burst_count = 0
                
        self.cap.release()
        cv2.destroyAllWindows()

if __name__ == "__main__":
    app = AdvancedIoTCamera()
    app.run()
