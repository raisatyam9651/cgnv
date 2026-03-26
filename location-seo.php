<?php
/**
 * Location SEO Engine - Generates unique E-E-A-T content, JSON-LD schema,
 * and optimized meta for each city+service combination
 * Include this file in all Indian location pages
 */

require_once(__DIR__ . '/location-data.php');

// Auto-detect city slug and service type from filename
$_loc_filename = basename($_SERVER['PHP_SELF'], '.php');

// Extract city slug and service type
$_loc_city_slug = '';
$_loc_service_key = '';

foreach ($service_types as $prefix => $data) {
    if (strpos($_loc_filename, $prefix . '-in-') === 0) {
        $_loc_service_key = $prefix;
        $_loc_city_slug = str_replace($prefix . '-in-', '', $_loc_filename);
        break;
    }
}

// Fallback for patterns like best-digital-marketing-agency-in-X
if (empty($_loc_city_slug)) {
    if (preg_match('/^(.+)-in-(.+)$/', $_loc_filename, $matches)) {
        $_loc_service_key = $matches[1];
        $_loc_city_slug = $matches[2];
    }
}

// Get city data
$_loc_city = isset($location_data[$_loc_city_slug]) ? $location_data[$_loc_city_slug] : null;
$_loc_service = isset($service_types[$_loc_service_key]) ? $service_types[$_loc_service_key] : null;

if ($_loc_city && $_loc_service) {
    $city_name = $_loc_city[0];
    $state_name = $_loc_city[1];
    $city_tier = $_loc_city[2];
    $industries = $_loc_city[3];
    $city_desc = $_loc_city[4];

    $service_name = $_loc_service[0];
    $service_desc = $_loc_service[1];
    $service_what = $_loc_service[2];
    $service_benefit = $_loc_service[3];

    // Generate dynamic industry references (pick 3 for variety)
    $seed = crc32($_loc_city_slug . $_loc_service_key);
    srand($seed);
    $shuffled_industries = $industries;
    shuffle($shuffled_industries);
    $top_industries = array_slice($shuffled_industries, 0, 3);
    $industry_text = implode(', ', array_slice($top_industries, 0, 2)) . ' and ' . $top_industries[2];

    // Generate unique content variations based on city+service hash
    $variation = $seed % 5;

    // Build dynamic meta keywords
    $_loc_keywords_arr = [
        strtolower($service_name) . ' in ' . $city_name,
        strtolower($service_name) . ' agency ' . $city_name,
        'best ' . strtolower($service_name) . ' ' . $city_name,
        strtolower($service_name) . ' company ' . $city_name,
        strtolower($service_desc) . ' ' . $city_name,
        strtolower($service_what) . ' ' . $city_name,
        'digital marketing ' . $city_name,
        strtolower($service_name) . ' in ' . $state_name,
        strtolower($top_industries[0]) . ' marketing ' . $city_name,
        strtolower($top_industries[1]) . ' digital marketing ' . $city_name,
        strtolower($service_benefit) . ' ' . $city_name,
        'Cognivic Digital ' . $city_name,
        'online marketing agency ' . $city_name,
        strtolower($service_name) . ' near me',
        'best digital marketing agency ' . $city_name,
    ];
    $_loc_keywords = implode(', ', $_loc_keywords_arr);
}
?>
<?php if ($_loc_city && $_loc_service): ?>

<!-- LOCATION SEO: Dynamic Meta Keywords -->
<meta name="keywords" content="<?php echo htmlspecialchars($_loc_keywords); ?>">

<!-- LOCATION SEO: JSON-LD Service Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "serviceType": "<?php echo htmlspecialchars($service_name); ?>",
  "name": "<?php echo htmlspecialchars($service_name . ' in ' . $city_name); ?>",
  "description": "Cognivic Digital provides expert <?php echo htmlspecialchars($service_desc); ?> services in <?php echo htmlspecialchars($city_name); ?>, <?php echo htmlspecialchars($state_name); ?>. We help local businesses in <?php echo htmlspecialchars($industry_text); ?> industries grow through <?php echo htmlspecialchars($service_what); ?>.",
  "provider": {
    "@type": "ProfessionalService",
    "name": "Cognivic Digital",
    "url": "https://www.cognivicdigital.com/",
    "telephone": "+91-7737861358",
    "email": "info@cognivicdigital.com",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Gurugram",
      "addressRegion": "Haryana",
      "addressCountry": "IN"
    },
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "4.9",
      "reviewCount": "150",
      "bestRating": "5"
    }
  },
  "areaServed": {
    "@type": "<?php echo ($city_tier === 'state') ? 'State' : 'City'; ?>",
    "name": "<?php echo htmlspecialchars($city_name); ?>"<?php if ($city_tier !== 'state'): ?>,
    "containedInPlace": {
      "@type": "State",
      "name": "<?php echo htmlspecialchars($state_name); ?>"
    }<?php endif; ?>
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "<?php echo htmlspecialchars($service_name); ?> Packages",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "<?php echo htmlspecialchars($service_name); ?> - Starter Plan",
          "description": "Essential <?php echo htmlspecialchars($service_desc); ?> package for small businesses in <?php echo htmlspecialchars($city_name); ?>."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "<?php echo htmlspecialchars($service_name); ?> - Growth Plan",
          "description": "Advanced <?php echo htmlspecialchars($service_desc); ?> for growing businesses looking to dominate the <?php echo htmlspecialchars($city_name); ?> market."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "<?php echo htmlspecialchars($service_name); ?> - Enterprise Plan",
          "description": "Comprehensive <?php echo htmlspecialchars($service_desc); ?> solution for established enterprises in <?php echo htmlspecialchars($city_name); ?>, <?php echo htmlspecialchars($state_name); ?>."
        }
      }
    ]
  }
}
</script>

<!-- LOCATION SEO: Local FAQ Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is the cost of <?php echo htmlspecialchars($service_desc); ?> in <?php echo htmlspecialchars($city_name); ?>?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The cost of <?php echo htmlspecialchars($service_desc); ?> in <?php echo htmlspecialchars($city_name); ?> varies based on your business size, competition level, and campaign goals. At Cognivic Digital, our <?php echo htmlspecialchars($service_name); ?> packages for <?php echo htmlspecialchars($city_name); ?> businesses start from INR 15,000/month. We offer customized pricing based on your specific needs in the <?php echo htmlspecialchars($industry_text); ?> sectors."
      }
    },
    {
      "@type": "Question",
      "name": "Why should businesses in <?php echo htmlspecialchars($city_name); ?> invest in <?php echo htmlspecialchars($service_desc); ?>?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "<?php echo htmlspecialchars($city_name); ?> is <?php echo htmlspecialchars($city_desc); ?>, making it a highly competitive market. Businesses in <?php echo htmlspecialchars($industry_text); ?> sectors need expert <?php echo htmlspecialchars($service_desc); ?> to stand out. With increasing digital adoption in <?php echo htmlspecialchars($state_name); ?>, investing in professional <?php echo htmlspecialchars($service_what); ?> helps you capture high-intent customers and stay ahead of local competitors."
      }
    },
    {
      "@type": "Question",
      "name": "How long does it take to see results from <?php echo htmlspecialchars($service_desc); ?> in <?php echo htmlspecialchars($city_name); ?>?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Results timeline depends on competition levels in <?php echo htmlspecialchars($city_name); ?>'s market, your industry, and campaign scope. For <?php echo htmlspecialchars($service_what); ?>, most <?php echo htmlspecialchars($city_name); ?> businesses see initial improvements within 2-4 weeks for paid campaigns and 3-6 months for organic strategies. Our team provides transparent monthly reporting so you can track ROI from day one."
      }
    },
    {
      "@type": "Question",
      "name": "Does Cognivic Digital serve businesses across all of <?php echo htmlspecialchars($state_name); ?>?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, while we specialize in <?php echo htmlspecialchars($service_name); ?> for <?php echo htmlspecialchars($city_name); ?>, we serve businesses across <?php echo htmlspecialchars($state_name); ?> and all of India. Being a Gurgaon-headquartered agency with 1000+ happy clients and 5000L+ revenue generated, we bring national-level expertise with local market understanding to every campaign."
      }
    }
  ]
}
</script>

<?php endif; ?>
