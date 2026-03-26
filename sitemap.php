<?php
header("Content-Type: application/xml; charset=utf-8");

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$domain = $_SERVER['HTTP_HOST'];
$base_url = $protocol . "://" . $domain;

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Files to exclude from the sitemap
$excluded_files = [
    'header.php',
    'header-2.php',
    'footer.php',
    'footer-js.php',
    'footer-popup.php',
    'mail.php',
    'head-links.php',
    'topbar.php',
    'sitemap.php',
    'thankyou.php',
    'location-data.php',
    'location-seo.php',
    'location-eeat-content.php'
];

// Directories to completely exclude from sitemap (only assets, not country dirs)
$excluded_dirs = ['assets', 'fonts', 'images', 'images1', 'sass', 'css', 'js', '.git'];

// High-priority core service pages
$high_priority_pages = [
    'best-seo-company-in-india',
    'google-ads-services',
    'ppc-services',
    'social-media-marketing',
    'web-development',
    'local-seo',
    'ecommerce-seo',
    'content-marketing',
    'facebook-instagram-ads',
    'youtube-marketing',
    'about-us',
    'contact-us'
];

// Medium-priority pages
$medium_priority_pages = [
    'ui-ux-design',
    'landing-page-design',
    'creative-services',
    'video-editing'
];

// Add home page explicitly (highest priority)
$index_mod_time = file_exists(__DIR__ . '/index.php') ? filemtime(__DIR__ . '/index.php') : time();
echo "  <url>\n";
echo "    <loc>" . htmlspecialchars($base_url . "/") . "</loc>\n";
echo "    <lastmod>" . date('Y-m-d', $index_mod_time) . "</lastmod>\n";
echo "    <changefreq>weekly</changefreq>\n";
echo "    <priority>1.0</priority>\n";
echo "  </url>\n";

// Scan current directory for root-level pages
$files = scandir(__DIR__);

foreach ($files as $file) {
    if ($file === '.' || $file === '..') continue;
    $file_path = __DIR__ . '/' . $file;

    if (is_dir($file_path)) {
        // Skip only asset directories
        if (in_array($file, $excluded_dirs)) continue;

        // Process all subdirectories (blog, country dirs like ar/, au/, uk/, us/ etc.)
        $sub_files = scandir($file_path);
        foreach ($sub_files as $sub_file) {
            if (pathinfo($sub_file, PATHINFO_EXTENSION) === 'php' && !in_array($sub_file, $excluded_files)) {
                $sub_file_path = $file_path . '/' . $sub_file;
                $slug = pathinfo($sub_file, PATHINFO_FILENAME);
                if ($slug === 'index') {
                    $url_path = $file . "/";
                } else {
                    $url_path = $file . "/" . $slug;
                }

                // Country hub pages (index.php) get higher priority
                if ($slug === 'index') {
                    $priority = '0.7';
                    $changefreq = 'weekly';
                } else {
                    $priority = '0.5';
                    $changefreq = 'monthly';
                }

                echo "  <url>\n";
                echo "    <loc>" . htmlspecialchars($base_url . "/" . $url_path) . "</loc>\n";
                echo "    <lastmod>" . date('Y-m-d', filemtime($sub_file_path)) . "</lastmod>\n";
                echo "    <changefreq>" . $changefreq . "</changefreq>\n";
                echo "    <priority>" . $priority . "</priority>\n";
                echo "  </url>\n";
            }
        }
    } else {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'php' && !in_array($file, $excluded_files) && $file !== 'index.php') {
            $slug = pathinfo($file, PATHINFO_FILENAME);
            $lastmod = date('Y-m-d', filemtime($file_path));

            // Determine priority based on page importance
            if (in_array($slug, $high_priority_pages)) {
                $priority = '0.9';
                $changefreq = 'weekly';
            } elseif (in_array($slug, $medium_priority_pages)) {
                $priority = '0.8';
                $changefreq = 'weekly';
            } else {
                // Indian city location pages
                $priority = '0.6';
                $changefreq = 'monthly';
            }

            echo "  <url>\n";
            echo "    <loc>" . htmlspecialchars($base_url . "/" . $slug) . "</loc>\n";
            echo "    <lastmod>" . $lastmod . "</lastmod>\n";
            echo "    <changefreq>" . $changefreq . "</changefreq>\n";
            echo "    <priority>" . $priority . "</priority>\n";
            echo "  </url>\n";
        }
    }
}

echo '</urlset>';
?>
