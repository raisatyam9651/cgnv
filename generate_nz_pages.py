import os
import glob
import re

base_dir = r"e:\suraj\cgnv\cgnv"
au_dir = os.path.join(base_dir, "au")
nz_dir = os.path.join(base_dir, "nz")

if not os.path.exists(nz_dir):
    os.makedirs(nz_dir)

# Define New Zealand target locations
locations = {
    "auckland": "Auckland",
    "wellington": "Wellington",
    "christchurch": "Christchurch",
    "hamilton": "Hamilton",
    "tauranga": "Tauranga",
    "napier-hastings": "Napier-Hastings",
    "dunedin": "Dunedin",
    "palmerston-north": "Palmerston North",
    "nelson": "Nelson",
    "rotorua": "Rotorua",
    "new-plymouth": "New Plymouth",
    "whangarei": "Whangarei",
    "invercargill": "Invercargill",
    "whanganui": "Whanganui",
    "gisborne": "Gisborne",
    "new-zealand": "New Zealand"
}

# Find all victoria template files in the au folder
templates = glob.glob(os.path.join(au_dir, "*-in-victoria.php"))

count = 0

for template_path in templates:
    filename = os.path.basename(template_path)
    
    with open(template_path, "r", encoding="utf-8", errors="ignore") as f:
        content = f.read()
        
    for slug, title in locations.items():
        # Generate the standard new filename wrapper
        new_filename = filename.replace("victoria", slug)
        target_path = os.path.join(nz_dir, new_filename)
        
        # Base location replacements
        new_content = content.replace("victoria", slug)
        new_content = new_content.replace("Victoria", title)
        new_content = new_content.replace("VICTORIA", title.upper())
        
        # Save standard service page
        with open(target_path, "w", encoding="utf-8") as f:
            f.write(new_content)
        count += 1
        print(f"Created {new_filename}")

        # If this is the web development template, also generate the special requested sub-niches!
        if filename == "web-development-agency-in-victoria.php":
            
            # --- Generate Ecommerce Website Development ---
            ecom_filename = "ecommerce-website-development-agency-in-" + slug + ".php"
            ecom_content = new_content.replace("Web Development", "Ecommerce Website Development")
            ecom_content = ecom_content.replace("web development", "ecommerce website development")
            ecom_content = ecom_content.replace("Web development", "Ecommerce website development")
            
            ecom_target = os.path.join(nz_dir, ecom_filename)
            with open(ecom_target, "w", encoding="utf-8") as f:
                f.write(ecom_content)
            count += 1
            print(f"Created {ecom_filename}")

            # --- Generate WordPress Website Development ---
            wp_filename = "wordpress-website-development-agency-in-" + slug + ".php"
            wp_content = new_content.replace("Web Development", "WordPress Website Development")
            wp_content = wp_content.replace("web development", "WordPress website development")
            wp_content = wp_content.replace("Web development", "WordPress website development")
            
            wp_target = os.path.join(nz_dir, wp_filename)
            with open(wp_target, "w", encoding="utf-8") as f:
                f.write(wp_content)
            count += 1
            print(f"Created {wp_filename}")

print(f"Total pages generated for New Zealand: {count}")
