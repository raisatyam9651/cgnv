import os
import re
import glob

css_path = r"e:\suraj\cgnv\cgnv\sass\blog.css"
blog_dir = r"e:\suraj\cgnv\cgnv\blog"

# 1. FIX CSS FONTAWESOME REFERENCES
with open(css_path, "r", encoding="utf-8") as f:
    css_content = f.read()

css_content = re.sub(r'font-family:\s*["\']Font Awesome 5 Free["\'](?:\s*!important)?\s*;', "font-family: 'FontAwesome' !important;", css_content)
css_content = re.sub(r'font-weight:\s*900(?:\s*!important)?\s*;', "font-weight: normal !important;", css_content)

with open(css_path, "w", encoding="utf-8") as f:
    f.write(css_content)

# 2. FIX PHP FILE FONTAWESOME CLASSES (FA5 -> FA4)
for filepath in glob.glob(os.path.join(blog_dir, "*.php")):
    with open(filepath, "r", encoding="utf-8") as f:
        php_content = f.read()

    # FA5 has fa-calendar-alt, FA4 uses fa-calendar
    new_php = php_content.replace('fa-calendar-alt', 'fa-calendar')
    
    if new_php != php_content:
        with open(filepath, "w", encoding="utf-8") as f:
            f.write(new_php)

print("Icons fixed successfully across CSS and PHP files!")
