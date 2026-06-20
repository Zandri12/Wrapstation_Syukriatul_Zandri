import os
from ultralytics import YOLO

def main():
    model = YOLO("yolov8n.pt") 

    dataset_yaml = "dataset/data.yaml"

    if not os.path.exists(dataset_yaml):
        print(f"Error: File dataset '{dataset_yaml}' tidak ditemukan!")
        print("Silakan unduh dataset dari Kaggle dan ekstrak ke folder 'dataset'")
        print("Dataset: https://www.kaggle.com/datasets/kapturovalexander/fruits-by-yolo-fruits-detection")
        return

    print("Memulai proses training...")
    
    results = model.train(
        data=dataset_yaml,
        epochs=30,
        imgsz=640,
        name="fruit_detection_model"
    )
    
    print("Training selesai! Model weights tersimpan di 'runs/detect/fruit_detection_model/weights/best.pt'")

if __name__ == '__main__':
    main()
