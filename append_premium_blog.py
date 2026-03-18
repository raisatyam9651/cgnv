import os

css_path = r"e:\suraj\cgnv\cgnv\sass\blog.css"

css_to_append = """
/* ========================================= */
/* PREMIUM BLOG DETAILS AESTHETICS OVERRIDES */
/* ========================================= */

.blog-post-content .post-body p {
  font-size: 1.1rem !important;
  line-height: 1.9 !important;
  color: #444 !important;
  margin-bottom: 25px !important;
}

.blog-post-content .post-body h2 {
  font-size: 2.2rem !important;
  font-weight: 800 !important;
  color: #000950 !important;
  margin: 55px 0 25px !important;
  padding-bottom: 12px !important;
  border-bottom: 2px solid rgba(47, 187, 225, 0.2) !important;
  position: relative;
}
.blog-post-content .post-body h2::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 80px;
  height: 2px;
  background: #2FBBE1;
}

.blog-post-content .post-body h3 {
  font-size: 1.5rem !important;
  font-weight: 700 !important;
  color: #425CA9 !important;
  margin: 45px 0 20px !important;
}

/* Enhanced Pointers for Unordered Lists */
.blog-post-content .post-body ul {
  list-style: none !important;
  padding-left: 0 !important;
  margin: 25px 0 !important;
}
.blog-post-content .post-body ul li {
  position: relative;
  padding-left: 40px !important;
  margin-bottom: 18px !important;
  font-size: 1.1rem !important;
  line-height: 1.8 !important;
  color: #444 !important;
}
.blog-post-content .post-body ul:not(.blog-toc ul) li::before {
  content: '\\f058'; /* Check Circle */
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  position: absolute;
  left: 0;
  top: 3px;
  color: #2FBBE1;
  font-size: 1.3rem;
  transition: transform 0.3s ease;
}
.blog-post-content .post-body ul:not(.blog-toc ul) li:hover::before {
  transform: scale(1.15);
  color: #425CA9;
}

/* Enhanced Ordered Lists */
.blog-post-content .post-body ol {
  counter-reset: custom-counter;
  list-style: none !important;
  padding-left: 0 !important;
  margin: 25px 0 !important;
}
.blog-post-content .post-body ol li {
  position: relative;
  padding-left: 50px !important;
  margin-bottom: 18px !important;
  font-size: 1.1rem !important;
  line-height: 1.8 !important;
  color: #444 !important;
  counter-increment: custom-counter;
}
.blog-post-content .post-body ol li::before {
  content: counter(custom-counter);
  position: absolute;
  left: 0;
  top: 0;
  width: 32px;
  height: 32px;
  background: linear-gradient(135deg, #000950, #425CA9);
  color: #fff;
  border-radius: 50%;
  text-align: center;
  line-height: 32px;
  font-size: 0.95rem;
  font-weight: 700;
  box-shadow: 0 4px 10px rgba(0, 9, 80, 0.2);
  transition: transform 0.3s ease;
}
.blog-post-content .post-body ol li:hover::before {
  transform: translateY(-2px);
  background: linear-gradient(135deg, #425CA9, #2FBBE1);
}

/* Premium Images */
.blog-post-content .post-body img {
  max-width: 100% !important;
  height: auto !important;
  border-radius: 16px !important;
  margin: 40px 0 !important;
  box-shadow: 0 15px 35px rgba(0, 9, 80, 0.08) !important;
  border: 1px solid rgba(0,0,0,0.03) !important;
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
}
.blog-post-content .post-body img:hover {
  transform: translateY(-8px) scale(1.02);
  box-shadow: 0 25px 45px rgba(0, 9, 80, 0.15) !important;
}

/* Elegant Blockquotes */
.blog-post-content .post-body blockquote {
  position: relative;
  border-left: none !important;
  padding: 35px 45px 35px 65px !important;
  background: linear-gradient(135deg, rgba(66, 92, 169, 0.04), rgba(47, 187, 225, 0.06)) !important;
  border-radius: 20px !important;
  margin: 50px 0 !important;
  font-style: italic !important;
  font-size: 1.3rem !important;
  color: #000950 !important;
  font-weight: 500 !important;
  line-height: 1.8 !important;
  box-shadow: inset 0 0 0 1px rgba(66, 92, 169, 0.1) !important;
}
.blog-post-content .post-body blockquote::before {
  content: '\\f10d'; /* Quote Left */
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  position: absolute;
  top: 25px;
  left: 20px;
  font-size: 2.5rem;
  color: rgba(47, 187, 225, 0.3);
}

/* Table of Contents Exceptions so we don't break TOC */
.blog-post-content .post-body .blog-toc ul li {
  padding-left: 0 !important;
  margin-bottom: 8px !important;
}
"""

with open(css_path, "a", encoding="utf-8") as f:
    f.write(css_to_append)

print("Premium CSS appended to blog.css!")
