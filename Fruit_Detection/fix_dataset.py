import os
import csv
import yaml

def create_dummy_bboxes(csv_path, output_dir):
    if not os.path.exists(csv_path):
        return

    with open(csv_path, 'r', newline='') as f:
        reader = csv.reader(f)
        headers = next(reader)
        classes = headers[1:]
        
        for row in reader:
            filename = row[0]
            class_indices = [i for i, val in enumerate(row[1:]) if val.strip() == '1']
            
            txt_filename = os.path.splitext(filename)[0] + ".txt"
            txt_path = os.path.join(output_dir, txt_filename)

            with open(txt_path, 'w') as f:
                for cls_idx in class_indices:
                    f.write(f"{cls_idx} 0.5 0.5 0.8 0.8\n")

def main():
    base_dir = os.path.join(os.path.dirname(os.path.abspath(__file__)), "dataset")
    dataset_dir = os.path.join(base_dir, "Fruits by YOLO", "Fruits by YOLO")
    
    if not os.path.exists(dataset_dir):
        print("Folder dataset tidak ditemukan. Pastikan Anda mengekstraknya di dalam folder 'dataset'.")
        return

    splits = ["train", "valid", "test"]
    for split in splits:
        split_dir = os.path.join(dataset_dir, split)
        csv_path = os.path.join(split_dir, "_classes.csv")
        if os.path.exists(csv_path):
            print(f"Membuat label YOLO untuk folder {split}...")
            create_dummy_bboxes(csv_path, split_dir)

    yaml_path = os.path.join(base_dir, "data.yaml")
    if not os.path.exists(yaml_path):
        yaml_path = os.path.join(dataset_dir, "..", "data.yaml")

    if os.path.exists(yaml_path):
        with open(yaml_path, 'r') as f:
            data = yaml.safe_load(f)
        
        data['train'] = os.path.join(dataset_dir, "train").replace('\\', '/')
        data['val'] = os.path.join(dataset_dir, "valid").replace('\\', '/')
        data['test'] = os.path.join(dataset_dir, "test").replace('\\', '/')
        
        new_yaml_path = os.path.join(base_dir, "data.yaml")
        with open(new_yaml_path, 'w') as f:
            yaml.dump(data, f, sort_keys=False)
        print(f"Berhasil memperbarui {new_yaml_path}")
    else:
        print("data.yaml tidak ditemukan!")

if __name__ == "__main__":
    main()
