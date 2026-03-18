import os

css_path = r"e:\suraj\cgnv\cgnv\sass\blog.css"

css_to_append = """
/* ========================================= */
/* ADDITIONAL SECTION ICONS EVERYWHERE       */
/* ========================================= */

/* FAQ Section Icon */
.blog-faq h2 {
  position: relative;
  display: inline-block;
  padding-left: 45px !important;
}
.blog-faq h2::before {
  content: '\\f29c' !important; /* fa-question-circle-o */
  font-family: 'FontAwesome' !important;
  font-weight: normal !important;
  position: absolute !important;
  left: 0 !important;
  top: 50% !important;
  transform: translateY(-50%) !important;
  color: #2FBBE1 !important;
  font-size: 2rem !important;
}

/* Related Posts Icon */
.related-posts h2 {
  position: relative;
  display: inline-block;
  padding-left: 60px !important;
}
.related-posts h2::before {
  content: '\\f02d' !important; /* fa-book */
  font-family: 'FontAwesome' !important;
  font-weight: normal !important;
  position: absolute !important;
  left: 0 !important;
  top: 50% !important;
  transform: translateY(-50%) !important;
  color: #000950 !important;
  font-size: 2.2rem !important;
}

/* Sidebar CTA Icon */
.blog-sidebar-cta h4 {
  position: relative;
  padding-left: 35px !important;
}
.blog-sidebar-cta h4::before {
  content: '\\f0f3' !important; /* fa-bell */
  font-family: 'FontAwesome' !important;
  font-weight: normal !important;
  position: absolute !important;
  left: 0 !important;
  top: 15px !important;
  color: #fff !important;
  font-size: 1.5rem !important;
}

/* Main CTA Box Icon */
.blog-cta-box h3 {
  position: relative;
  padding-left: 45px !important;
}
.blog-cta-box h3::before {
  content: '\\f0e7' !important; /* fa-bolt */
  font-family: 'FontAwesome' !important;
  font-weight: normal !important;
  position: absolute !important;
  left: 0 !important;
  top: 50% !important;
  transform: translateY(-50%) !important;
  color: #2FBBE1 !important;
  font-size: 2rem !important;
}
"""

with open(css_path, "a", encoding="utf-8") as f:
    f.write(css_to_append)

print("Additional Section Icons appended to blog.css!")
