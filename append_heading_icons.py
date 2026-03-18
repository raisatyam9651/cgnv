import os

css_path = r"e:\suraj\cgnv\cgnv\sass\blog.css"

css_to_append = """
/* ========================================= */
/* HEADING ICONS (POINTER-WISE EXPLAINS)     */
/* ========================================= */

/* Add a pointer icon to all H2 Subheadings */
.blog-post-content .post-body h2:not(#introduction):not(:first-of-type) {
  position: relative;
  padding-left: 50px !important;
}

.blog-post-content .post-body h2:not(#introduction):not(:first-of-type)::before {
  content: '\\f0a4'; /* Hand Point Right */
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  color: #425CA9;
  font-size: 2rem;
  opacity: 0.8;
}

/* Add a bullet icon to all H3 Subheadings */
.blog-post-content .post-body h3 {
  position: relative;
  padding-left: 35px !important;
}

.blog-post-content .post-body h3::before {
  content: '\\f138'; /* Chevron Circle Right */
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  color: #2FBBE1;
  font-size: 1.4rem;
}
"""

with open(css_path, "a", encoding="utf-8") as f:
    f.write(css_to_append)

print("Heading Icons CSS appended to blog.css!")
