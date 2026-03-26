<?php
/**
 * Country SEO Engine - Generates unique JSON-LD schema, meta keywords,
 * and E-E-A-T content for international location pages
 */

require_once(__DIR__ . '/country-data.php');

// Detect country code from directory and region+service from filename
$_cty_dir = basename(dirname($_SERVER['PHP_SELF']));
$_cty_filename = basename($_SERVER['PHP_SELF'], '.php');

// Extract region slug and service type
$_cty_region_slug = '';
$_cty_service_key = '';

foreach ($service_types as $prefix => $data) {
    if (strpos($_cty_filename, $prefix . '-in-') === 0) {
        $_cty_service_key = $prefix;
        $_cty_region_slug = str_replace($prefix . '-in-', '', $_cty_filename);
        break;
    }
}

// Fallback
if (empty($_cty_region_slug) && preg_match('/^(.+)-in-(.+)$/', $_cty_filename, $m)) {
    $_cty_service_key = $m[1];
    $_cty_region_slug = $m[2];
}

// Get data
$_cty_country = isset($country_info[$_cty_dir]) ? $country_info[$_cty_dir] : null;
$_cty_region = isset($region_data[$_cty_region_slug]) ? $region_data[$_cty_region_slug] : null;
$_cty_service = isset($service_types[$_cty_service_key]) ? $service_types[$_cty_service_key] : null;

// If region not in data, generate from slug
if (!$_cty_region && $_cty_country && $_cty_region_slug) {
    $region_display = ucwords(str_replace('-', ' ', $_cty_region_slug));
    $_cty_region = [$region_display, $_cty_dir, $_cty_country[3], 'a key region in ' . $_cty_country[0]];
}

if ($_cty_country && $_cty_region && $_cty_service) {
    $country_name = $_cty_country[0];
    $country_lang = $_cty_country[1];
    $country_currency = $_cty_country[2];
    $country_industries = $_cty_country[3];
    $country_desc = $_cty_country[4];

    $region_name = $_cty_region[0];
    $region_industries = $_cty_region[2];
    $region_desc = $_cty_region[3];

    $svc_name = $_cty_service[0];
    $svc_desc = $_cty_service[1];
    $svc_what = $_cty_service[2];
    $svc_benefit = $_cty_service[3];

    // Shuffle industries per page
    $seed = crc32($_cty_region_slug . $_cty_service_key . $_cty_dir);
    srand($seed);
    $shuf_ind = $region_industries;
    shuffle($shuf_ind);
    $ind1 = $shuf_ind[0];
    $ind2 = $shuf_ind[1];
    $ind3 = isset($shuf_ind[2]) ? $shuf_ind[2] : $shuf_ind[0];

    $var = $seed % 5;

    // Build keywords
    $_cty_keywords = implode(', ', [
        strtolower($svc_name) . ' in ' . $region_name,
        strtolower($svc_name) . ' agency ' . $region_name,
        'best ' . strtolower($svc_name) . ' ' . $region_name,
        strtolower($svc_desc) . ' ' . $region_name,
        strtolower($svc_name) . ' ' . $country_name,
        'digital marketing agency ' . $region_name,
        strtolower($ind1) . ' marketing ' . $region_name,
        strtolower($ind2) . ' digital marketing ' . $region_name,
        strtolower($svc_what) . ' ' . $region_name,
        'Cognivic Digital ' . $region_name,
        strtolower($svc_benefit) . ' ' . $country_name,
        'online marketing ' . $region_name . ' ' . $country_name,
        'best digital marketing agency ' . $region_name,
    ]);
}
?>
<?php if (isset($country_name) && $_cty_service): ?>

<!-- COUNTRY SEO: Meta Keywords -->
<meta name="keywords" content="<?php echo htmlspecialchars($_cty_keywords); ?>">

<!-- COUNTRY SEO: JSON-LD Service Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "serviceType": "<?php echo htmlspecialchars($svc_name); ?>",
  "name": "<?php echo htmlspecialchars($svc_name . ' in ' . $region_name . ', ' . $country_name); ?>",
  "description": "Cognivic Digital provides expert <?php echo htmlspecialchars($svc_desc); ?> services in <?php echo htmlspecialchars($region_name); ?>, <?php echo htmlspecialchars($country_name); ?>. We help businesses in <?php echo htmlspecialchars($ind1); ?>, <?php echo htmlspecialchars($ind2); ?> and <?php echo htmlspecialchars($ind3); ?> industries grow through <?php echo htmlspecialchars($svc_what); ?>.",
  "provider": {
    "@type": "ProfessionalService",
    "name": "Cognivic Digital",
    "url": "https://www.cognivicdigital.com/",
    "telephone": "+91-7737861358",
    "email": "info@cognivicdigital.com",
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "4.9",
      "reviewCount": "150",
      "bestRating": "5"
    }
  },
  "areaServed": {
    "@type": "AdministrativeArea",
    "name": "<?php echo htmlspecialchars($region_name); ?>",
    "containedInPlace": {
      "@type": "Country",
      "name": "<?php echo htmlspecialchars($country_name); ?>"
    }
  }
}
</script>

<!-- COUNTRY SEO: Local FAQ Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is the cost of <?php echo htmlspecialchars($svc_desc); ?> in <?php echo htmlspecialchars($region_name); ?>, <?php echo htmlspecialchars($country_name); ?>?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The cost of <?php echo htmlspecialchars($svc_desc); ?> in <?php echo htmlspecialchars($region_name); ?> depends on your business goals, competition level, and campaign scope. <?php echo htmlspecialchars($country_name); ?> is <?php echo htmlspecialchars($country_desc); ?>, and businesses in <?php echo htmlspecialchars($ind1); ?> and <?php echo htmlspecialchars($ind2); ?> sectors need tailored pricing. Contact Cognivic Digital for a customized quote."
      }
    },
    {
      "@type": "Question",
      "name": "Why should <?php echo htmlspecialchars($region_name); ?> businesses invest in <?php echo htmlspecialchars($svc_desc); ?>?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "<?php echo htmlspecialchars($region_name); ?> is <?php echo htmlspecialchars($region_desc); ?>. With key industries like <?php echo htmlspecialchars($ind1); ?>, <?php echo htmlspecialchars($ind2); ?>, and <?php echo htmlspecialchars($ind3); ?> driving growth, businesses need expert <?php echo htmlspecialchars($svc_what); ?> to reach their target audience and outperform competitors in the <?php echo htmlspecialchars($country_name); ?> market."
      }
    },
    {
      "@type": "Question",
      "name": "Does Cognivic Digital serve businesses across all of <?php echo htmlspecialchars($country_name); ?>?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, Cognivic Digital provides <?php echo htmlspecialchars($svc_name); ?> services across <?php echo htmlspecialchars($country_name); ?> and internationally. As a Gurgaon-headquartered agency with 1000+ clients and 5000L+ revenue generated, we bring global expertise with local market understanding to every campaign in <?php echo htmlspecialchars($region_name); ?>."
      }
    }
  ]
}
</script>

<?php endif; ?>
