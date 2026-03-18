import os

css_path = r"e:\suraj\cgnv\cgnv\sass\blog.css"

css_to_append = """
/* ========================================= */
/* FIX TABLE OF CONTENTS SPACING             */
/* ========================================= */

.blog-post-content .post-body .blog-toc,
.blog-post-content .post-body .table-of-contents {
  margin: 15px 0 25px !important;
  padding: 20px 25px !important;
  background: #f8f9fa !important;
  border-radius: 8px !important;
  border: 1px solid #e9ecef !important;
  display: inline-block !important; /* Makes it wrap tightly around content */
  min-width: 300px !important;
}

.blog-post-content .post-body .blog-toc h2,
.blog-post-content .post-body .table-of-contents h2,
.blog-post-content .post-body .blog-toc h4,
.blog-post-content .post-body .table-of-contents h4 {
  margin: 0 0 15px 0 !important;
  padding: 0 !important;
  font-size: 1.25rem !important;
  border: none !important;
  color: #000950 !important;
  font-weight: 700 !important;
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
  padding: 0 0 0 20px !important;
  background: transparent !important;
  list-style: disc !important;
}

.blog-post-content .post-body .blog-toc ul li,
.blog-post-content .post-body .table-of-contents ul li {
  padding: 0 !important;
  margin: 0 0 6px 0 !important;
  background: transparent !important;
  border: none !important;
  box-shadow: none !important;
  font-size: 0.95rem !important;
  line-height: 1.4 !important;
}

.blog-post-content .post-body .blog-toc ul li:hover,
.blog-post-content .post-body .table-of-contents ul li:hover {
  transform: none !important;
  box-shadow: none !important;
  border: none !important;
}

.blog-post-content .post-body .blog-toc ul li::before,
.blog-post-content .post-body .table-of-contents ul li::before {
  display: none !important;
}

.blog-post-content .post-body .blog-toc ul li a,
.blog-post-content .post-body .table-of-contents ul li a {
  color: #425ca9 !important;
  font-weight: 500 !important;
  text-decoration: none !important;
  border: none !important;
}

.blog-post-content .post-body .blog-toc ul li a:hover,
.blog-post-content .post-body .table-of-contents ul li a:hover {
  color: #2FBBE1 !important;
  text-decoration: underline !important;
}
"""

with open(css_path, "a", encoding="utf-8") as f:
    f.write(css_to_append)

print("TOC fix appended!")
