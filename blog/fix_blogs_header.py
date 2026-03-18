import os
import glob
import re

blog_dir = r"e:\suraj\cgnv\cgnv\blog"

modified_count = 0

for filepath in glob.glob(os.path.join(blog_dir, "*.php")):
    if os.path.basename(filepath) == "index.php":
        continue
        
    with open(filepath, "r", encoding="utf-8") as f:
        content = f.read()
        
    pattern = re.compile(
        r"<\?php include\('\.\./header\.php'\); \?>\s*(?:<!-- Blog Post Banner -->\s*)+<section class=\"blog-post-banner\"([^>]*)>",
        re.IGNORECASE | re.DOTALL
    )
    
    def repl(m):
        attrs = m.group(1)
        return f"<!-- Blog Post Banner -->\n  <section class=\"blog-post-banner banner-sec seo-header\"{attrs}>\n    <?php include('../header-2.php'); ?>"
    
    new_content, count = pattern.subn(repl, content)
    
    if count > 0:
        with open(filepath, "w", encoding="utf-8") as f:
            f.write(new_content)
        modified_count += 1
        print(f"Modified: {os.path.basename(filepath)}")

print(f"Total files modified: {modified_count}")
