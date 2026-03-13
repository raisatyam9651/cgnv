<?php
$states = [
    "Andhra Pradesh",
    "Arunachal Pradesh",
    "Assam",
    "Bihar",
    "Chhattisgarh",
    "Goa",
    "Gujarat",
    "Haryana",
    "Himachal Pradesh",
    "Jharkhand",
    "Karnataka",
    "Kerala",
    "Madhya Pradesh",
    "Maharashtra",
    "Manipur",
    "Meghalaya",
    "Mizoram",
    "Nagaland",
    "Odisha",
    "Punjab",
    "Rajasthan",
    "Sikkim",
    "Tamil Nadu",
    "Telangana",
    "Tripura",
    "Uttar Pradesh",
    "Uttarakhand",
    "West Bengal"
];

// 1. Revert footer - we modified it globally, we need to revert it.
$footer_content = file_get_contents('footer.php');
$footer_content = preg_replace('/<div class="col-md-12 mt-4 pt-3"><span class="d-block mb-3 text-white" style="font-size: 18px; font-weight: 600;">Our Serving Locations.*?<\/div><\/div><\/div><\/div><\/div>\s*<div class="copyright">/s', '<div class="copyright">', $footer_content);
file_put_contents('footer.php', $footer_content);

// 2. We need to add it to best-seo-company-in-india.php before the footer.
// Using a visible grid of links instead of a dropdown solves all JS/mobile issues, and is vastly better for SEO link crawling.
$grid_html = '<div class="container mb-5 mt-5">
    <div class="row">
        <div class="col-md-12 text-center mb-4">
            <h3 class="h2 font-weight-bold" style="color: #000;">Our Serving Locations</h3>
            <p style="color: #666;">Explore our expert SEO services across India</p>
        </div>
        <div class="col-md-12">
            <div class="row">';

foreach ($states as $state) {
    $slug = strtolower(str_replace(' ', '-', $state));
    $grid_html .= '<div class="col-md-3 col-6 mb-3"><a class="btn btn-outline-primary w-100" style="font-size: 14px; padding: 10px 5px;" href="seo-company-in-' . $slug . '">SEO Company in ' . $state . '</a></div>';
}

$grid_html .= '</div>
        </div>
    </div>
</div>';

$best_seo_content = file_get_contents('best-seo-company-in-india.php');

// Make sure it's not already there
if (strpos($best_seo_content, 'Our Serving Locations') === false) {
    if(strpos($best_seo_content, '<?php include(\'footer.php\'); ?>') !== false) {
       $best_seo_content = str_replace('<?php include(\'footer.php\'); ?>', $grid_html . "\n      <?php include('footer.php'); ?>", $best_seo_content);
    } else {
       // Also check double quotes
       $best_seo_content = str_replace('<?php include("footer.php"); ?>', $grid_html . "\n      <?php include('footer.php'); ?>", $best_seo_content);
    }
    file_put_contents('best-seo-company-in-india.php', $best_seo_content);
}

echo "Done.";
