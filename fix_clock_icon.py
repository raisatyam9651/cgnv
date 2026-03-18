import os
import glob

blog_dir = r"e:\suraj\cgnv\cgnv\blog"
count = 0

for filepath in glob.glob(os.path.join(blog_dir, "*.php")):
    with open(filepath, "r", encoding="utf-8") as f:
        php_content = f.read()

    # FA5 has fa-clock, FA4 uses fa-clock-o
    new_php = php_content.replace('fa-clock"', 'fa-clock-o"').replace('fa-clock ', 'fa-clock-o ')
    
    if new_php != php_content:
        with open(filepath, "w", encoding="utf-8") as f:
            f.write(new_php)
        count += 1

print(f"Fixed fa-clock in {count} files!")
