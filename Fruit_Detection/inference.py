import cv2
import os
import glob
from ultralytics import YOLO

def main():
    image_dir = "dataset/Fruits by YOLO/Fruits by YOLO/test" 
    model_path = "weights/best.pt"
    
    if not os.path.exists(model_path):
        # Fallback to runs/detect if weights/best.pt is missing locally
        model_path = "runs/detect/fruit_detection_model/weights/best.pt"
        
    if not os.path.exists(model_path):
        print(f"Error: Model '{model_path}' tidak ditemukan.")
        print("Pastikan Anda sudah menjalankan script training (train.py) atau meletakkan 'best.pt' di folder 'weights'.")
        return

    if not os.path.exists(image_dir):
        print(f"Error: Direktori gambar '{image_dir}' tidak ditemukan.")
        return

    print(f"Memuat model dari {model_path}...")
    model = YOLO(model_path)

    image_files = glob.glob(os.path.join(image_dir, "*.[jp][pn][g]"))
    
    if not image_files:
        print(f"Tidak ada gambar yang ditemukan di direktori {image_dir}")
        return

    print(f"Ditemukan {len(image_files)} gambar. Memulai preview...")
    print("Tekan tombol 'q' atau 'ESC' pada keyboard untuk keluar dari pop-up window.")
    print("Tekan sembarang tombol lain untuk melihat gambar berikutnya.")

    window_name = "Fruit Detection Result Preview"
    cv2.namedWindow(window_name, cv2.WINDOW_NORMAL)

    for img_path in image_files:
        results = model(img_path)
        annotated_frame = results[0].plot()

        cv2.imshow(window_name, annotated_frame)
        
        key = cv2.waitKey(0) & 0xFF
        
        if key == ord('q') or key == 27:
            break

    cv2.destroyAllWindows()

if __name__ == '__main__':
    main()
