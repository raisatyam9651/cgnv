<?php
/**
 * E-E-A-T Content Block for Country Location Pages
 * Attractive design with brand colors
 */

if (isset($country_name) && isset($region_name) && isset($svc_name)) {

  $why_intros = [
    "$region_name is $region_desc. The local market is powered by $ind1, $ind2, and $ind3 industries, creating strong demand for professional $svc_desc. Businesses that invest in expert $svc_what gain a decisive edge in the $country_name market.",
    "The business environment in $region_name, $country_name is evolving rapidly. With $ind1, $ind2, and $ind3 sectors driving economic growth, companies need robust $svc_desc strategies to capture and convert their target audience effectively.",
    "As $region_desc, $region_name offers significant market potential. $country_name is $country_desc, and businesses in $ind1, $ind2, and $ind3 sectors are increasingly investing in $svc_what to build brand authority and generate leads.",
    "Companies in $region_name operate in a competitive landscape shaped by $ind1, $ind2, and $ind3 industries. The digital economy in $country_name is expanding rapidly, making professional $svc_desc essential for sustainable business growth.",
    "$region_name's economy, driven by $ind1, $ind2, and $ind3, demands a data-driven approach to $svc_desc. At Cognivic Digital, we bring proven expertise with 5000L+ revenue generated across 1000+ clients worldwide."
  ];

  $approach_texts = [
    "Our $svc_name approach for $region_name begins with comprehensive market research specific to $country_name. We analyze local competition, identify high-value opportunities in the $ind1 and $ind2 sectors, and craft strategies that deliver measurable ROI for your business.",
    "We build custom $svc_what strategies for $region_name businesses. Our team studies consumer behavior in $country_name, maps the competitive landscape in $ind1 and $ind2 markets, and creates campaigns that connect your brand with the right audience.",
    "For $region_name businesses targeting $country_name's $ind1 and $ind2 markets, we combine global best practices with local market insights. Our data-driven $svc_desc methodology ensures every campaign dollar is optimized for maximum returns.",
    "Every $svc_name campaign we create for $region_name is rooted in market intelligence. We understand the $country_name digital ecosystem, track trends in $ind1 and $ind3 industries, and build strategies that scale.",
    "Our $region_name strategy leverages three pillars: deep understanding of $country_name's market dynamics, sector expertise in $ind1 and $ind2, and proven frameworks that have delivered 7.8X ROAS across diverse industries."
  ];

  $results_texts = [
    "From $ind1 startups to established $ind2 enterprises in $region_name, our $svc_desc services have consistently delivered growth. We help $country_name businesses achieve higher visibility, better engagement, and increased revenue.",
    "Whether you're a $ind1 company expanding in $region_name or a $ind2 business looking to dominate $country_name's digital space, our $svc_name strategies are built for real, measurable outcomes.",
    "We've helped businesses across $country_name — from $ind1 and $ind2 to $ind3 sectors — achieve significant growth through expert $svc_what. Our $region_name clients report improved ROI and customer acquisition.",
    "The $region_name market rewards businesses that invest in professional $svc_desc. Our clients in $country_name's $ind1 and $ind2 sectors have seen substantial improvements in brand visibility and lead quality.",
    "From driving first leads for $ind1 startups in $region_name to scaling $ind2 enterprises across $country_name, our $svc_name campaigns are measured by one metric: your business growth."
  ];
?>

<style>
.eeat-section{position:relative;overflow:hidden;padding:60px 0 70px}
.eeat-section::before{content:'';position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,#FF8500,#2FBBE1,#425CA9)}
.eeat-badge{display:inline-block;background:linear-gradient(135deg,#FF8500,#e07200);color:#fff;font-size:13px;font-weight:700;padding:6px 18px;border-radius:50px;letter-spacing:1px;text-transform:uppercase;margin-bottom:15px}
.eeat-title{font-size:32px;font-weight:800;color:#000950;line-height:1.3;margin-bottom:20px}
.eeat-title span{color:#2FBBE1}
.eeat-text{font-size:16px;line-height:1.9;color:#444;margin-bottom:25px}
.eeat-subtitle{font-size:22px;font-weight:700;color:#000950;margin-bottom:15px;padding-left:15px;border-left:4px solid #FF8500}
.eeat-card{background:#fff;border-radius:16px;padding:28px 24px;height:100%;position:relative;overflow:hidden;box-shadow:0 4px 20px rgba(0,9,80,0.08);transition:all 0.3s ease;border:1px solid rgba(47,187,225,0.1)}
.eeat-card:hover{transform:translateY(-5px);box-shadow:0 12px 35px rgba(0,9,80,0.12);border-color:#2FBBE1}
.eeat-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,#2FBBE1,#425CA9);border-radius:16px 16px 0 0}
.eeat-card-icon{width:50px;height:50px;border-radius:12px;display:flex;align-items:center;justify-content:center;margin-bottom:15px;font-size:22px}
.eeat-card-icon.blue{background:rgba(47,187,225,0.12);color:#2FBBE1}
.eeat-card-icon.orange{background:rgba(255,133,0,0.12);color:#FF8500}
.eeat-card-icon.purple{background:rgba(66,92,169,0.12);color:#425CA9}
.eeat-card h4{font-size:17px;font-weight:700;color:#000950;margin-bottom:8px}
.eeat-card p{font-size:14px;color:#666;line-height:1.7;margin:0}
.eeat-stats{display:flex;gap:30px;flex-wrap:wrap;margin:30px 0}
.eeat-stat{text-align:center;flex:1;min-width:120px}
.eeat-stat-num{font-size:32px;font-weight:800;background:linear-gradient(135deg,#2FBBE1,#425CA9);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1}
.eeat-stat-label{font-size:13px;color:#888;margin-top:5px;font-weight:500}
.eeat-cta{background:linear-gradient(135deg,#000950 0%,#425CA9 50%,#2FBBE1 100%);border-radius:20px;padding:40px;color:#fff;position:relative;overflow:hidden}
.eeat-cta::before{content:'';position:absolute;top:-50%;right:-10%;width:300px;height:300px;background:rgba(255,133,0,0.15);border-radius:50%;pointer-events:none}
.eeat-cta::after{content:'';position:absolute;bottom:-30%;left:-5%;width:200px;height:200px;background:rgba(47,187,225,0.1);border-radius:50%;pointer-events:none}
.eeat-cta h4{font-size:24px;font-weight:700;margin-bottom:10px;position:relative;z-index:1}
.eeat-cta p{font-size:15px;opacity:0.9;margin:0;position:relative;z-index:1}
.eeat-cta-btn{display:inline-block;background:#FF8500;color:#fff;padding:14px 35px;border-radius:50px;font-weight:700;font-size:16px;text-decoration:none;transition:all 0.3s ease;position:relative;z-index:1;box-shadow:0 4px 15px rgba(255,133,0,0.4)}
.eeat-cta-btn:hover{background:#e07200;transform:translateY(-2px);box-shadow:0 6px 20px rgba(255,133,0,0.5);color:#fff;text-decoration:none}
@media(max-width:768px){.eeat-title{font-size:24px}.eeat-cta{padding:25px;border-radius:15px}.eeat-stats{gap:15px}.eeat-stat-num{font-size:24px}}
</style>

<section class="eeat-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">

        <div class="eeat-badge"><?php echo htmlspecialchars($svc_name); ?> in <?php echo htmlspecialchars($region_name); ?></div>
        <h2 class="eeat-title">Why <?php echo htmlspecialchars($region_name); ?> Businesses Choose Cognivic Digital for <span><?php echo htmlspecialchars($svc_name); ?></span></h2>

        <p class="eeat-text">
          <?php echo htmlspecialchars($why_intros[$var]); ?>
        </p>

        <div class="eeat-stats">
          <div class="eeat-stat">
            <div class="eeat-stat-num">5000L+</div>
            <div class="eeat-stat-label">Revenue Generated</div>
          </div>
          <div class="eeat-stat">
            <div class="eeat-stat-num">7.8X</div>
            <div class="eeat-stat-label">Average ROAS</div>
          </div>
          <div class="eeat-stat">
            <div class="eeat-stat-num">40K+</div>
            <div class="eeat-stat-label">Leads Delivered</div>
          </div>
          <div class="eeat-stat">
            <div class="eeat-stat-num">1000+</div>
            <div class="eeat-stat-label">Happy Clients</div>
          </div>
        </div>

        <h3 class="eeat-subtitle">Our <?php echo htmlspecialchars($svc_name); ?> Approach for <?php echo htmlspecialchars($region_name); ?>, <?php echo htmlspecialchars($country_name); ?></h3>

        <p class="eeat-text">
          <?php echo htmlspecialchars($approach_texts[$var]); ?>
        </p>

        <div class="row mt-4 mb-5">
          <div class="col-md-4 mb-4">
            <div class="eeat-card">
              <div class="eeat-card-icon blue"><i class="fas fa-globe-americas"></i></div>
              <h4><?php echo htmlspecialchars($country_name); ?> Market Expertise</h4>
              <p>Deep understanding of <?php echo htmlspecialchars($region_name); ?>'s <?php echo htmlspecialchars($ind1); ?> and <?php echo htmlspecialchars($ind2); ?> industries for targeted <?php echo htmlspecialchars($svc_what); ?>.</p>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="eeat-card">
              <div class="eeat-card-icon orange"><i class="fas fa-chart-line"></i></div>
              <h4>Proven Global Results</h4>
              <p>5000L+ revenue generated with 7.8X average ROAS for 1000+ businesses across India and internationally.</p>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="eeat-card">
              <div class="eeat-card-icon purple"><i class="fas fa-bullseye"></i></div>
              <h4>Tailored for <?php echo htmlspecialchars($region_name); ?></h4>
              <p>Custom <?php echo htmlspecialchars($svc_benefit); ?> strategies built for the unique business landscape in <?php echo htmlspecialchars($country_name); ?>.</p>
            </div>
          </div>
        </div>

        <h3 class="eeat-subtitle">Delivering Real Results in <?php echo htmlspecialchars($region_name); ?></h3>

        <p class="eeat-text">
          <?php echo htmlspecialchars($results_texts[$var]); ?>
        </p>

        <div class="eeat-cta mt-4">
          <div class="row align-items-center">
            <div class="col-lg-8 mb-3 mb-lg-0">
              <h4>Ready to Grow Your <?php echo htmlspecialchars($region_name); ?> Business?</h4>
              <p>Get a free <?php echo htmlspecialchars($svc_name); ?> consultation tailored for <?php echo htmlspecialchars($ind1); ?> and <?php echo htmlspecialchars($ind2); ?> businesses in <?php echo htmlspecialchars($region_name); ?>, <?php echo htmlspecialchars($country_name); ?>.</p>
            </div>
            <div class="col-lg-4 text-lg-right text-center">
              <a href="javascript:void(0)" data-toggle="modal" data-target="#tteModal" class="eeat-cta-btn">Get Free Consultation</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<?php
}?>
