import os

css_path = r"e:\suraj\cgnv\cgnv\sass\blog.css"

css_to_append = """
/* ========================================= */
/* POINTER-WISE LIST BOXES UPGRADE           */
/* ========================================= */

/* Unordered Lists (Icon Boxes) */
.blog-post-content .post-body ul:not(.blog-toc ul) {
  display: flex !important;
  flex-direction: column !important;
  gap: 20px !important;
  background: transparent !important;
  margin: 35px 0 !important;
}

.blog-post-content .post-body ul:not(.blog-toc ul) li {
  padding: 25px 25px 25px 85px !important;
  background: #fff !important;
  border-radius: 12px !important;
  box-shadow: 0 5px 20px rgba(0, 9, 80, 0.04) !important;
  border: 1px solid rgba(47, 187, 225, 0.1) !important;
  transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s !important;
  margin-bottom: 0 !important;
}

.blog-post-content .post-body ul:not(.blog-toc ul) li:hover {
  transform: translateY(-5px) !important;
  box-shadow: 0 15px 35px rgba(0, 9, 80, 0.1) !important;
  border-color: rgba(47, 187, 225, 0.4) !important;
}

.blog-post-content .post-body ul:not(.blog-toc ul) li::before {
  content: '\\f058' !important; /* Check Circle */
  font-family: "Font Awesome 5 Free" !important;
  font-weight: 900 !important;
  position: absolute !important;
  left: 20px !important;
  top: 25px !important;
  color: #2FBBE1 !important;
  font-size: 1.6rem !important;
  background: rgba(47, 187, 225, 0.1) !important;
  width: 45px !important;
  height: 45px !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  border-radius: 50% !important;
  transition: transform 0.3s ease, background 0.3s ease, color 0.3s ease !important;
}

.blog-post-content .post-body ul:not(.blog-toc ul) li:hover::before {
  transform: scale(1.1) !important;
  background: rgba(66, 92, 169, 0.1) !important;
  color: #425CA9 !important;
}

.blog-post-content .post-body ul:not(.blog-toc ul) li strong {
  display: block !important;
  font-size: 1.25rem !important;
  color: #000950 !important;
  margin-bottom: 8px !important;
  font-weight: 800 !important;
}

/* Ordered Lists (Numbered Boxes) */
.blog-post-content .post-body ol {
  display: flex !important;
  flex-direction: column !important;
  gap: 20px !important;
  margin: 35px 0 !important;
}

.blog-post-content .post-body ol li {
  padding: 25px 25px 25px 85px !important;
  background: #fff !important;
  border-radius: 12px !important;
  box-shadow: 0 5px 20px rgba(0, 9, 80, 0.04) !important;
  border: 1px solid rgba(47, 187, 225, 0.1) !important;
  transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s !important;
  margin-bottom: 0 !important;
}

.blog-post-content .post-body ol li:hover {
  transform: translateY(-5px) !important;
  box-shadow: 0 15px 35px rgba(0, 9, 80, 0.1) !important;
  border-color: rgba(47, 187, 225, 0.4) !important;
}

.blog-post-content .post-body ol li::before {
  position: absolute !important;
  left: 20px !important;
  top: 25px !important;
  width: 45px !important;
  height: 45px !important;
  background: linear-gradient(135deg, #000950, #425CA9) !important;
  color: #fff !important;
  border-radius: 50% !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  font-size: 1.15rem !important;
  font-weight: 800 !important;
  box-shadow: 0 4px 15px rgba(0, 9, 80, 0.2) !important;
  line-height: normal !important;
}

.blog-post-content .post-body ol li:hover::before {
  transform: translateY(-2px) scale(1.05) !important;
  background: linear-gradient(135deg, #425CA9, #2FBBE1) !important;
}

.blog-post-content .post-body ol li strong {
  display: block !important;
  font-size: 1.25rem !important;
  color: #000950 !important;
  margin-bottom: 8px !important;
  font-weight: 800 !important;
}
"""

with open(css_path, "a", encoding="utf-8") as f:
    f.write(css_to_append)

print("Pointer Boxes CSS appended to blog.css!")
