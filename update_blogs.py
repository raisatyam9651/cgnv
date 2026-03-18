import os
import glob
import re

blog_dir = r"e:\suraj\cgnv\cgnv\blog"
index_file = os.path.join(blog_dir, "index.php")

# Read index.php to extract blog data
with open(index_file, 'r', encoding='utf-8') as f:
    index_content = f.read()

# Pattern to extract blog entries from $blogs array
# E.g.
# 'slug' => '...',
# 'title' => '...',
# 'excerpt' => '...',
# 'category' => '...',
# 'date' => '...',
# 'image' => '...'
blog_data = {}
entries = re.findall(r"\['slug'\s*=>\s*'([^']*)',\s*'title'\s*=>\s*'([^']*)'(?:.*?)'category'\s*=>\s*'([^']*)',\s*'date'\s*=>\s*'([^']*)',\s*'image'\s*=>\s*'([^']*)'", index_content, re.DOTALL)

for slug, title, category, date, image in entries:
    blog_data[slug] = {
        'title': title.strip(),
        'category': category.strip(),
        'date': date.strip(),
        'image': image.strip()
    }

# Some entries might have mismatched regex due to string matching...
# Let's write a safer parser if that missed things.
missing = 0
php_files = glob.glob(os.path.join(blog_dir, "*.php"))
for file_path in php_files:
    basename = os.path.basename(file_path)
    if basename == "index.php":
        continue
    
    slug = basename.replace(".php", "")
    
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Extract existing meta if not in index.php
    title_match = re.search(r'<h1>(.*?)</h1>', content)
    category_match = re.search(r'<span class="blog-category">(.*?)</span>', content)
    date_match = re.search(r'<span class="blog-date">(.*?)</span>', content)
    read_time_match = re.search(r'<span class="blog-read-time">(.*?)</span>', content)
    author_match = re.search(r'<span class="blog-author">(.*?)</span>', content)
    
    title = title_match.group(1) if title_match else (blog_data.get(slug, {}).get('title', ''))
    category = category_match.group(1) if category_match else (blog_data.get(slug, {}).get('category', 'Category'))
    author_str = author_match.group(1) if author_match else "By Cognivic Digital"
    
    # Sometimes 'By ' is inside, let's keep it clean
    if author_str.startswith("By "):
        author_str = author_str[3:]
        
    date_str = date_match.group(1) if date_match else (blog_data.get(slug, {}).get('date', ''))
    read_time = read_time_match.group(1) if read_time_match else "10 min read"
    
    # image - fallback to svg if exists, else guess
    image_path = blog_data.get(slug, {}).get('image', f"/images/blog/{slug}.svg")

    if not title:
        missing += 1
        continue
        
    # Replace breadcrumb and header
    # They are followed by <!-- Table of Contents --> or <div class="post-body"> or <div class="table-of-contents">
    
    parts = content.split('<!-- Breadcrumb -->', 1)
    if len(parts) < 2:
        # Try finding <section class="blog-post-banner">
        parts = content.split('<section class="blog-post-banner">', 1)
        if len(parts) < 2:
            print(f"Skipped {basename} - no anchor found")
            continue
    
    head = parts[0]
    tail = parts[1]
    
    match = re.search(r'(<!-- Table of Contents -->|<div class="blog-toc">|<div class="post-body">|<div class="table-of-contents">)', tail)
    if not match:
        print(f"Skipped {basename} - no anchor found after header")
        continue
        
    tail_after_header = tail[match.start():]
    
    new_banner = f"""<!-- Blog Post Banner -->
  <section class="blog-post-banner" style="background: linear-gradient(135deg, #000950 0%, #425CA9 100%);">
    <div class="container">
      <div class="breadcrumb-blog">
        <a href="/">Home</a> / <a href="/blog/">Blog</a> / <span>{title}</span>
      </div>
      <span class="blog-category-badge">{category}</span>
      <h1>{title}</h1>
      <div class="post-meta">
        <span><i class="fa fa-calendar-alt"></i> {date_str}</span>
        <span><i class="fa fa-user"></i> By {author_str}</span>
        <span><i class="fa fa-clock"></i> {read_time}</span>
      </div>
    </div>
  </section>

  <!-- Blog Post Content -->
  <section class="blog-post-content">
    <div class="container">
      <div class="blog-post-wrapper">
        <div class="blog-post-hero-img-container">
          <img src="{image_path}" alt="{title}" class="blog-post-hero-img">
        </div>

        """
    
    new_content = head + new_banner + "\n        " + tail_after_header
    
    if new_content == content:
        print(f"Failed to replace in {basename}")
    else:
        with open(file_path, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f"Updated {basename}")

print("Missing:", missing)
