import os
import glob
import re

blog_dir = r"e:\suraj\cgnv\cgnv\blog"

modified_count = 0
for filepath in glob.glob(os.path.join(blog_dir, "*.php")):
    with open(filepath, "r", encoding="utf-8") as f:
        content = f.read()

    new_content = re.sub(
        r'<section class=\"(blog-post-banner|blog-banner) banner-sec seo-header\"([^>]*)>\s*<\?php include\(\'\.\./header-2\.php\'\); \?>',
        r'<section class="\1"\2>\n    <?php include(\'../header.php\'); ?>',
        content
    )
    
    if new_content != content:
        with open(filepath, "w", encoding="utf-8") as f:
            f.write(new_content)
        modified_count += 1
        print(f"Modified: {os.path.basename(filepath)}")

print(f"Total files modified: {modified_count}")
