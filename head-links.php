<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="sass/main.css">
  <link rel='stylesheet' href='assets/css/owl.carousel.css'>
  <link rel='stylesheet' href='assets/css/owl.theme.default.css'>
  <link rel="stylesheet" href="assets/css/aos.css">
  <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="fonts/font-awesome.min.css" />
  <link rel="icon" type="image/x-icon" href="images/Our/logo/favicon.png"><style>.top-client-bar .item a img { height: 75px !important; width: auto !important; object-fit: contain; margin: 0 auto; }</style>
<?php
$current_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$page_slug = basename($_SERVER['PHP_SELF'], ".php");
$dynamic_title = ucwords(str_replace("-", " ", $page_slug));
if($dynamic_title == "Index" || empty($dynamic_title)) { $dynamic_title = "Digital Marketing Agency"; }
$og_title = $dynamic_title . " | Cognivic Digital";
?>

<!-- Essential Core Tags -->
<meta name="author" content="Cognivic Digital">
<!-- (Viewport, Charset, Title, and Description are already defined in individual pages natively) -->

<!-- Open Graph Tags -->
<meta property="og:locale" content="en_IN">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $og_title; ?>">
<meta property="og:description" content="Cognivic Digital provides tailored, result-driven digital marketing solutions to scale your brand with the best possible Growth and ROI.">
<meta property="og:url" content="<?php echo $current_url; ?>">
<meta property="og:site_name" content="Cognivic Digital">
<meta property="og:image" content="https://www.cognivicdigital.com/images/Our/logo/logo.png">

<!-- Twitter Card Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $og_title; ?>">
<meta name="twitter:description" content="Cognivic Digital provides tailored, result-driven digital marketing solutions.">
<meta name="twitter:image" content="https://www.cognivicdigital.com/images/Our/logo/logo.png">

<!-- JSON-LD Structured Data: LocalBusiness / Organization -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Cognivic Digital",
  "image": "https://www.cognivicdigital.com/images/Our/logo/logo.png",
  "@id": "https://www.cognivicdigital.com/",
  "url": "https://www.cognivicdigital.com/",
  "telephone": "+91-7737861358",
  "email": "info@cognivicdigital.com",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Gurgaon",
    "addressLocality": "Gurugram",
    "addressRegion": "HR",
    "addressCountry": "IN"
  },
  "sameAs": [
    "https://www.facebook.com/cognivicdigital",
    "https://www.instagram.com/cognivicdigital",
    "https://www.linkedin.com/company/cognivicdigital"
  ]
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
    "name": "<?php echo $dynamic_title; ?>",
    "item": "<?php echo $current_url; ?>"  
  }]
}
</script>

<!-- JSON-LD Structured Data: Article snippet -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?php echo $current_url; ?>"
  },
  "headline": "<?php echo $og_title; ?>",
  "image": "https://www.cognivicdigital.com/images/Our/logo/logo.png",  
  "author": {
    "@type": "Organization",
    "name": "Cognivic Digital"
  },  
  "publisher": {
    "@type": "Organization",
    "name": "Cognivic Digital",
    "logo": {
      "@type": "ImageObject",
      "url": "https://www.cognivicdigital.com/images/Our/logo/logo.png"
    }
  }
}
</script>
