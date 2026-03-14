import os
import glob

base_dir = r"e:\suraj\cgnv\cgnv"
ar_dir = os.path.join(base_dir, "ar")
uae_dir = os.path.join(base_dir, "uae")

if not os.path.exists(uae_dir):
    os.makedirs(uae_dir)

# Define locations
locations = {
    "dubai": "Dubai",
    "abu-dhabi": "Abu Dhabi",
    "sharjah": "Sharjah",
    "ajman": "Ajman",
    "umm-al-quwain": "Umm Al Quwain",
    "ras-al-khaimah": "Ras Al Khaimah",
    "fujairah": "Fujairah",
    "uae": "UAE"
}

# Find all jujuy template files in the ar folder
templates = glob.glob(os.path.join(ar_dir, "*-in-jujuy.php"))

count = 0
for template_path in templates:
    filename = os.path.basename(template_path)
    
    with open(template_path, "r", encoding="utf-8", errors="ignore") as f:
        content = f.read()
        
    for slug, title in locations.items():
        # Generate the new filename: e.g. content-marketing-agency-in-dubai.php
        new_filename = filename.replace("jujuy", slug)
        target_path = os.path.join(uae_dir, new_filename)
        
        # Replace occurrences in content
        new_content = content.replace("jujuy", slug)
        new_content = new_content.replace("Jujuy", title)
        new_content = new_content.replace("JUJUY", title.upper())
        
        with open(target_path, "w", encoding="utf-8") as f:
            f.write(new_content)
            
        count += 1
        print(f"Created {new_filename}")

print(f"Total pages generated: {count}")
