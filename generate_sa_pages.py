import os
import glob

base_dir = r"e:\suraj\cgnv\cgnv"
template_dir = os.path.join(base_dir, "ar")
target_dir = os.path.join(base_dir, "sa")

if not os.path.exists(target_dir):
    os.makedirs(target_dir)

# Define locations in Saudi Arabia
locations = {
    "riyadh": "Riyadh",
    "jeddah": "Jeddah",
    "mecca": "Mecca",
    "medina": "Medina",
    "dammam": "Dammam",
    "khobar": "Khobar",
    "dhahran": "Dhahran",
    "abha": "Abha",
    "taif": "Taif",
    "tabuk": "Tabuk",
    "buraidah": "Buraidah",
    "khamis-mushait": "Khamis Mushait",
    "hofuf": "Hofuf",
    "jubail": "Jubail",
    "yanbu": "Yanbu",
    "al-ahsa": "Al Ahsa",
    "jizan": "Jizan",
    "najran": "Najran",
    "hail": "Hail",
    "arar": "Arar"
}

# Find all templates in the ar folder using 'jujuy' as placeholder
templates = glob.glob(os.path.join(template_dir, "*-in-jujuy.php"))

count = 0
for template_path in templates:
    filename = os.path.basename(template_path)
    
    with open(template_path, "r", encoding="utf-8", errors="ignore") as f:
        content = f.read()
        
    for slug, title in locations.items():
        # Generate the new filename: e.g. web-development-agency-in-riyadh.php
        new_filename = filename.replace("jujuy", slug)
        target_path = os.path.join(target_dir, new_filename)
        
        # Replace occurrences in content
        new_content = content.replace("jujuy", slug)
        new_content = new_content.replace("Jujuy", title)
        new_content = new_content.replace("JUJUY", title.upper())
        
        # Replace locale if present (templates have en-IN)
        new_content = new_content.replace("en-IN", "en-SA")
        
        with open(target_path, "w", encoding="utf-8") as f:
            f.write(new_content)
            
        count += 1
        # print(f"Created {new_filename}") # Reduced output to avoid flooding

print(f"Total pages generated: {count}")
