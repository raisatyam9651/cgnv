<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/sass/main.css">
  <link rel='stylesheet' href='/assets/css/owl.carousel.css'>
  <link rel='stylesheet' href='/assets/css/owl.theme.default.css'>
  <link rel="stylesheet" href="/assets/css/aos.css">
  <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="/fonts/font-awesome.min.css" />
  <link rel="icon" type="image/x-icon" href="/images/Our/logo/favicon.png">
  <link rel="apple-touch-icon" href="/images/Our/logo/favicon.png">
  <style>.top-client-bar .item a img { height: 75px !important; width: auto !important; object-fit: contain; margin: 0 auto; }</style>
<?php
$page_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$page_slug = strtolower(basename($_SERVER['PHP_SELF'], ".php"));

if ($page_slug == "index" || empty($page_slug)) {
    $canonical_url = "https://www.cognivicdigital.com/";
} else {
    # Check if we are in a subdirectory
    $dir = dirname($_SERVER['PHP_SELF']);
    if ($dir != "/" && $dir != "\\") {
        $canonical_url = "https://www.cognivicdigital.com" . $dir . "/" . $page_slug;
    } else {
        $canonical_url = "https://www.cognivicdigital.com/" . $page_slug;
    }
}

$current_url = $canonical_url;
$dynamic_title = ucwords(str_replace("-", " ", $page_slug));
if($dynamic_title == "Index" || empty($dynamic_title)) { $dynamic_title = "#1 Digital Marketing Agency in Gurgaon"; }
$og_title = $dynamic_title . " | Cognivic Digital";

// Dynamic OG description - pull from page meta if available, fallback to default
$og_desc = "Cognivic Digital is the #1 digital marketing agency in Gurgaon. 5000L+ revenue generated for 1000+ happy clients. Expert SEO, Google Ads, PPC & social media marketing. Get a free strategy call today!";

?>
<link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">

<!-- Essential Core Tags -->
<meta name="author" content="Cognivic Digital">
<meta name="geo.region" content="IN-HR">
<meta name="geo.placename" content="Gurugram">
<meta name="language" content="English">
<meta name="revisit-after" content="7 days">

<!-- Open Graph Tags -->
<meta property="og:locale" content="en_IN">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo htmlspecialchars($og_title); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($og_desc); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($current_url); ?>">
<meta property="og:site_name" content="Cognivic Digital">
<meta property="og:image" content="https://www.cognivicdigital.com/images/Our/logo/logo.png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="Cognivic Digital - #1 Digital Marketing Agency in Gurgaon">

<!-- Twitter Card Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($og_title); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($og_desc); ?>">
<meta name="twitter:image" content="https://www.cognivicdigital.com/images/Our/logo/logo.png">
<meta name="twitter:site" content="@cognivicdigital">

<!-- JSON-LD Structured Data: ProfessionalService (more specific than LocalBusiness) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ProfessionalService",
  "name": "Cognivic Digital",
  "alternateName": "Cognivic Digital Marketing Agency",
  "image": "https://www.cognivicdigital.com/images/Our/logo/logo.png",
  "@id": "https://www.cognivicdigital.com/#organization",
  "url": "https://www.cognivicdigital.com/",
  "telephone": "+91-7737861358",
  "email": "info@cognivicdigital.com",
  "description": "Cognivic Digital is the #1 digital marketing agency in Gurgaon, India. We provide expert SEO, Google Ads, PPC, social media marketing, web development, and content marketing services. With 5000L+ revenue generated and 1000+ happy clients, we deliver measurable ROI-driven results.",
  "priceRange": "$$",
  "foundingDate": "2020",
  "areaServed": [
    {
      "@type": "Country",
      "name": "India"
    },
    {
      "@type": "City",
      "name": "Gurugram"
    }
  ],
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Gurgaon",
    "addressLocality": "Gurugram",
    "addressRegion": "Haryana",
    "postalCode": "122001",
    "addressCountry": "IN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "28.4595",
    "longitude": "77.0266"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
    "opens": "09:00",
    "closes": "19:00"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Digital Marketing Services",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Search Engine Optimization (SEO)",
          "description": "Boost your organic rankings, drive targeted traffic, and increase conversions with our expert SEO services. We provide on-page SEO, off-page SEO, technical SEO, and local SEO.",
          "url": "https://www.cognivicdigital.com/best-seo-company-in-india"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Google Ads Management",
          "description": "Maximize your ROI with targeted Google Ads campaigns. Our certified Google Ads experts create high-converting PPC campaigns for businesses of all sizes.",
          "url": "https://www.cognivicdigital.com/google-ads-services"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Social Media Marketing",
          "description": "Build a strong brand presence across Facebook, Instagram, LinkedIn, and YouTube. We create engaging content and run targeted social media campaigns.",
          "url": "https://www.cognivicdigital.com/social-media-marketing"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "PPC Services",
          "description": "Data-driven pay-per-click advertising management for instant, high-converting traffic. We optimize campaigns across Google, Bing, and social platforms.",
          "url": "https://www.cognivicdigital.com/ppc-services"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Web Development",
          "description": "Custom website development that converts visitors into customers. We build responsive, fast-loading, SEO-optimized websites.",
          "url": "https://www.cognivicdigital.com/web-development"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Local SEO",
          "description": "Dominate local search results and Google Maps. We optimize your Google Business Profile and build local citations to attract nearby customers.",
          "url": "https://www.cognivicdigital.com/local-seo"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Content Marketing",
          "description": "Engage your target audience with high-quality, SEO-optimized content. We create blog posts, articles, infographics, and more to drive organic traffic.",
          "url": "https://www.cognivicdigital.com/content-marketing"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Meta Ads Management",
          "description": "Scalable Facebook and Instagram advertising campaigns. We create and manage high-ROI Meta ad campaigns that generate leads and sales.",
          "url": "https://www.cognivicdigital.com/facebook-instagram-ads"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "E-commerce SEO",
          "description": "Drive more sales to your online store with specialized e-commerce SEO. We optimize product pages, category pages, and site architecture for search engines.",
          "url": "https://www.cognivicdigital.com/ecommerce-seo"
        }
      }
    ]
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.9",
    "reviewCount": "150",
    "bestRating": "5",
    "worstRating": "1"
  },
  "sameAs": [
    "https://www.linkedin.com/in/cognivic-digital/"
  ]
}
</script>

<!-- JSON-LD Structured Data: WebSite with SearchAction (helps Google understand site) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "Cognivic Digital",
  "alternateName": "Cognivic Digital Marketing Agency",
  "url": "https://www.cognivicdigital.com/"
}
</script>

<!-- JSON-LD Structured Data: BreadcrumbList -->
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "Home",
    "item": "https://www.cognivicdigital.com/"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "<?php echo htmlspecialchars($dynamic_title); ?>",
    "item": "<?php echo htmlspecialchars($current_url); ?>"
  }]
}
</script>
