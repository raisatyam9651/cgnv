import os

css_path = r"e:\suraj\cgnv\cgnv\sass\blog.css"

css_to_append = """
/* --- Bulletproof Header Overrides for Blog --- */
.blog-banner .header,
.blog-post-banner .header {
  position: absolute !important;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 9999;
  background: transparent !important;
  padding: 15px 0 !important;
}

.blog-banner .header .menu-main > li > a,
.blog-post-banner .header .menu-main > li > a,
.blog-banner .header .menu-main > li > a i,
.blog-post-banner .header .menu-main > li > a i {
  color: #fff !important;
}

.blog-banner .header .menu-main > li > a:hover,
.blog-post-banner .header .menu-main > li > a:hover {
  color: #2FBBE1 !important;
}

.blog-banner .header .logo a img,
.blog-post-banner .header .logo a img {
  filter: brightness(0) invert(1) !important;
}

/* Ensure the banner content starts below the absolute header */
.blog-banner,
.blog-post-banner {
  padding-top: 150px !important;
}
"""

with open(css_path, "a", encoding="utf-8") as f:
    f.write(css_to_append)

print("CSS appended to blog.css!")
