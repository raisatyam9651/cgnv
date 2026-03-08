<?php
header("Content-Type: application/xml; charset=utf-8");

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$domain = $_SERVER['HTTP_HOST'];
$base_url = $protocol . "://" . $domain;

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Array of files to exclude from the sitemap
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
    'thankyou.php' // usually you don't want thank you pages in the sitemap
];

// Scan current directory
$files = scandir(__DIR__);

// Add home page explicitly
$index_mod_time = file_exists(__DIR__ . '/index.php') ? filemtime(__DIR__ . '/index.php') : time();
echo "  <url>\n";
echo "    <loc>" . htmlspecialchars($base_url . "/") . "</loc>\n";
echo "    <lastmod>" . date('Y-m-d', $index_mod_time) . "</lastmod>\n";
echo "    <changefreq>weekly</changefreq>\n";
echo "    <priority>1.0</priority>\n";
echo "  </url>\n";

foreach ($files as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php' && !in_array($file, $excluded_files) && $file !== 'index.php') {
        // Page slug (filename without .php)
        $slug = pathinfo($file, PATHINFO_FILENAME);
        $file_path = __DIR__ . '/' . $file;
        $lastmod = date('Y-m-d', filemtime($file_path));

        echo "  <url>\n";
        echo "    <loc>" . htmlspecialchars($base_url . "/" . $slug) . "</loc>\n";
        echo "    <lastmod>" . $lastmod . "</lastmod>\n";
        echo "    <changefreq>monthly</changefreq>\n";
        echo "    <priority>0.8</priority>\n";
        echo "  </url>\n";
    }
}

echo '</urlset>';
?>
