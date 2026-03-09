import os
import re

dir_path = r"e:\suraj\cgnv\cgnv"

slug_pattern = re.compile(r'-(?:agency|company)-in-([a-z0-9-]+)\.php$')

slugs = set()

# Get all existing unique slugs
for filename in os.listdir(dir_path):
    if filename.endswith(".php"):
        m = slug_pattern.search(filename)
        if m:
            slugs.add(m.group(1))

if "india" in slugs:
    slugs.remove("india")

print(f"Found {len(slugs)} unique location slugs.")

template_path = os.path.join(dir_path, "best-digital-marketing-agency-in-maharashtra.php")

with open(template_path, "r", encoding="utf-8", errors="ignore") as f:
    template_content = f.read()

count = 0
for slug in slugs:
    target_filename = f"best-digital-marketing-agency-in-{slug}.php"
    target_path = os.path.join(dir_path, target_filename)
    
    if not os.path.exists(target_path):
        location_title = slug.replace('-', ' ').title()
        
        # some manual adjustments for title case
        if slug == "new-delhi":
            location_title = "New Delhi"
            
        new_content = template_content.replace("maharashtra", slug)
        new_content = new_content.replace("Maharashtra", location_title)
        
        # Just in case there are variations
        new_content = new_content.replace("MAHARASHTRA", location_title.upper())
        
        with open(target_path, "w", encoding="utf-8") as f:
            f.write(new_content)
        count += 1

print(f"Generated {count} new best-digital-marketing-agency-in-*.php pages.")
