import os
import glob

blog_dir = r"e:\suraj\cgnv\cgnv\blog"
count = 0

for filepath in glob.glob(os.path.join(blog_dir, "*.php")):
    with open(filepath, "r", encoding="utf-8") as f:
        content = f.read()

    # The string that was erroneously placed in the file:
    bad_str = r"<?php include(\'../header.php\'); ?>"
    good_str = "<?php include('../header.php'); ?>"

    new_content = content.replace(bad_str, good_str)
    
    if new_content != content:
        with open(filepath, "w", encoding="utf-8") as f:
            f.write(new_content)
        count += 1

print(f"Fixed syntax in {count} files.")
