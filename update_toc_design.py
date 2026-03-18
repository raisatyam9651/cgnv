import os

css_path = r"e:\suraj\cgnv\cgnv\sass\blog.css"

css_to_append = """
/* ========================================= */
/* PERFECT TABLE OF CONTENTS DESIGN REPLICA  */
/* ========================================= */

.blog-post-content .post-body .blog-toc,
.blog-post-content .post-body .table-of-contents {
  margin: 40px 0 !important;
  padding: 35px 40px !important;
  background: #f4f7fb !important; /* Soft blue-grey from image */
  border-radius: 8px !important;
  border: none !important;
  display: block !important;
  width: 100% !important;
}

.blog-post-content .post-body .blog-toc h2,
.blog-post-content .post-body .table-of-contents h2,
.blog-post-content .post-body .blog-toc h4,
.blog-post-content .post-body .table-of-contents h4 {
  margin: 0 0 25px 0 !important;
  padding: 0 !important;
  font-size: 2.2rem !important;
  border: none !important;
  color: #1a1e24 !important; /* Dark grey-black from image */
  font-weight: 700 !important;
  letter-spacing: -0.5px !important;
}

.blog-post-content .post-body .blog-toc h2::after,
.blog-post-content .post-body .table-of-contents h2::after,
.blog-post-content .post-body .blog-toc h2::before,
.blog-post-content .post-body .table-of-contents h2::before {
  display: none !important;
}

.blog-post-content .post-body .blog-toc ul,
.blog-post-content .post-body .table-of-contents ul {
  display: block !important;
  margin: 0 !important;
  padding: 0 !important;
  list-style: none !important;
  background: transparent !important;
}

.blog-post-content .post-body .blog-toc ul li,
.blog-post-content .post-body .table-of-contents ul li {
  padding: 0 !important;
  margin: 0 0 16px 0 !important;
  background: transparent !important;
  border: none !important;
  box-shadow: none !important;
  font-size: 1.05rem !important;
  line-height: 1.5 !important;
}

.blog-post-content .post-body .blog-toc ul li:last-child,
.blog-post-content .post-body .table-of-contents ul li:last-child {
  margin-bottom: 0 !important;
}

.blog-post-content .post-body .blog-toc ul li:hover,
.blog-post-content .post-body .table-of-contents ul li:hover {
  transform: none !important;
  box-shadow: none !important;
  border: none !important;
}

.blog-post-content .post-body .blog-toc ul li::before,
.blog-post-content .post-body .table-of-contents ul li::before {
  display: none !important; /* Ensure NO custom pointer icons */
}

.blog-post-content .post-body .blog-toc ul li a,
.blog-post-content .post-body .table-of-contents ul li a {
  color: #425CA9 !important; /* Matching blue link from image */
  font-weight: 400 !important;
  text-decoration: none !important;
  border: none !important;
  display: inline-block !important;
}

.blog-post-content .post-body .blog-toc ul li a:hover,
.blog-post-content .post-body .table-of-contents ul li a:hover {
  text-decoration: underline !important;
  color: #2FBBE1 !important;
}
"""

with open(css_path, "a", encoding="utf-8") as f:
    f.write(css_to_append)

print("TOC replica appended!")
