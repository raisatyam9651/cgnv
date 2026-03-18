import os
import re

blog_dir = r"e:\suraj\cgnv\cgnv\blog"
index_file = os.path.join(blog_dir, "index.php")

with open(index_file, 'r', encoding='utf-8') as f:
    index_content = f.read()

# Build basic slug to image map
slug_image_map = {}
blocks = index_content.split("'slug' => '")[1:]
for block in blocks:
    slug = block.split("'", 1)[0]
    
    # find image
    if "'image' => '" in block:
        image = block.split("'image' => '")[1].split("'", 1)[0]
        slug_image_map[slug] = image

import glob
for file_path in glob.glob(os.path.join(blog_dir, "*.php")):
    basename = os.path.basename(file_path)
    if basename == "index.php":
        continue
    
    slug = basename.replace(".php", "")
    if slug in slug_image_map:
        correct_image = slug_image_map[slug]
        
        with open(file_path, 'r', encoding='utf-8') as f:
            content = f.read()
            
        new_content = re.sub(r'<img src="[^"]+" alt="([^"]+)" class="blog-post-hero-img">', 
                             f'<img src="{correct_image}" alt="\\1" class="blog-post-hero-img">', 
                             content)
                             
        if new_content != content:
            with open(file_path, 'w', encoding='utf-8') as f:
                f.write(new_content)
            print(f"Fixed image in {basename} -> {correct_image}")
