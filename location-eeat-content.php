<?php
/**
 * E-E-A-T Content Block for Indian Location Pages
 * Attractive design with brand colors
 */

if (isset($_loc_city) && $_loc_city && isset($_loc_service) && $_loc_service) {
  $city_name = $_loc_city[0];
  $state_name = $_loc_city[1];
  $city_tier = $_loc_city[2];
  $industries = $_loc_city[3];
  $city_desc = $_loc_city[4];
  $service_name = $_loc_service[0];
  $service_desc = $_loc_service[1];
  $service_what = $_loc_service[2];
  $service_benefit = $_loc_service[3];

  $seed = crc32($_loc_city_slug . $_loc_service_key);
  srand($seed);
  $shuffled = $industries;
  shuffle($shuffled);
  $ind1 = $shuffled[0];
  $ind2 = $shuffled[1];
  $ind3 = isset($shuffled[2]) ? $shuffled[2] : $shuffled[0];
  $ind4 = isset($shuffled[3]) ? $shuffled[3] : $shuffled[1];
  $var = $seed % 5;

  $why_intros = [
    "$city_name is $city_desc. The local market here is driven by $ind1, $ind2, and $ind3 industries, creating immense demand for $service_desc. Businesses that leverage professional $service_what gain a decisive competitive advantage.",
    "The business landscape in $city_name, $state_name is rapidly evolving. With key sectors like $ind1, $ind2, and $ind3 driving economic growth, local companies need robust $service_desc strategies to capture their target audience and convert them into paying customers.",
    "As $city_desc, $city_name offers enormous market potential for businesses in $ind1, $ind2, and $ind3 sectors. Our expert $service_desc services are specifically tailored for the $city_name market, helping businesses build brand authority and generate qualified leads.",
    "Businesses in $city_name face unique market dynamics shaped by $ind1, $ind2, and $ind3 industries. The digital landscape in $state_name is growing at an unprecedented rate, making $service_desc not just an option, but a necessity for sustainable growth.",
    "$city_name's thriving economy, powered by $ind1, $ind2, and $ind3 sectors, demands a sophisticated approach to $service_desc. At Cognivic Digital, we bring proven expertise and data-driven strategies that have generated 5000L+ revenue across 1000+ clients."
  ];

  $approach_texts = [
    "Our approach to $service_name in $city_name starts with deep market research specific to $state_name's business environment. We analyze local competition, identify high-intent keywords that $city_name customers actually search for, and build strategies around the $ind1 and $ind2 sectors where your business operates.",
    "We don't believe in cookie-cutter strategies. For $city_name businesses, we conduct thorough local market analysis, study consumer behavior patterns specific to $state_name, and develop customized $service_what campaigns targeting $ind1, $ind2, and $ind4 industry audiences.",
    "Every $service_name campaign we run for $city_name businesses begins with understanding your unique position in the local $ind1 and $ind2 market. We combine our national expertise (7.8X average ROAS) with $state_name-specific insights to deliver measurable results.",
    "For businesses in $city_name's competitive $ind1 and $ind2 landscape, we take a data-first approach to $service_desc. Our team analyzes local search trends, competitor strategies, and audience demographics specific to $state_name before launching any campaign.",
    "Our $city_name $service_name strategy is built on three pillars: local market intelligence for $state_name, industry-specific expertise in $ind1 and $ind3 sectors, and proven frameworks that have delivered 40K+ leads for businesses across India."
  ];

  $results_texts = [
    "Our $service_name expertise has helped businesses across $state_name achieve remarkable growth. From $ind1 startups to established $ind2 enterprises in $city_name, we've consistently delivered ROI-positive campaigns that drive real business outcomes.",
    "Whether you're a $ind1 company looking to expand your $city_name customer base or a $ind2 business seeking to dominate $state_name's digital space, our $service_desc strategies are designed to deliver measurable, trackable results.",
    "We've worked with businesses across diverse sectors in $state_name — from $ind1 and $ind2 to $ind3. Our $city_name clients consistently report increased lead quality, reduced customer acquisition costs, and improved brand visibility in their target markets.",
    "The $city_name market rewards businesses that invest smartly in $service_desc. Our clients in the $ind1 and $ind4 sectors have seen significant improvements in online visibility, customer engagement, and revenue growth within the first 90 days.",
    "From helping $ind1 businesses in $city_name generate their first online leads to scaling $ind2 enterprises across $state_name, our $service_name campaigns are backed by data, driven by expertise, and measured by results."
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

        <div class="eeat-badge"><?php echo htmlspecialchars($service_name); ?> in <?php echo htmlspecialchars($city_name); ?></div>
        <h2 class="eeat-title">Why <?php echo htmlspecialchars($city_name); ?> Businesses Choose Cognivic Digital for <span><?php echo htmlspecialchars($service_name); ?></span></h2>

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

        <h3 class="eeat-subtitle">Our <?php echo htmlspecialchars($service_name); ?> Approach for <?php echo htmlspecialchars($city_name); ?>, <?php echo htmlspecialchars($state_name); ?></h3>

        <p class="eeat-text">
          <?php echo htmlspecialchars($approach_texts[$var]); ?>
        </p>

        <div class="row mt-4 mb-5">
          <div class="col-md-4 mb-4">
            <div class="eeat-card">
              <div class="eeat-card-icon blue"><i class="fas fa-map-marker-alt"></i></div>
              <h4>Local Market Expertise</h4>
              <p>Deep understanding of <?php echo htmlspecialchars($city_name); ?>'s <?php echo htmlspecialchars($ind1); ?> and <?php echo htmlspecialchars($ind2); ?> industries for targeted <?php echo htmlspecialchars($service_what); ?>.</p>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="eeat-card">
              <div class="eeat-card-icon orange"><i class="fas fa-chart-line"></i></div>
              <h4>Proven ROI Results</h4>
              <p>5000L+ revenue generated with 7.8X average ROAS for businesses across <?php echo htmlspecialchars($state_name); ?> and all of India.</p>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="eeat-card">
              <div class="eeat-card-icon purple"><i class="fas fa-bullseye"></i></div>
              <h4><?php echo htmlspecialchars($state_name); ?> Focused Strategy</h4>
              <p>Tailored <?php echo htmlspecialchars($service_benefit); ?> strategies built for the unique business environment in <?php echo htmlspecialchars($city_name); ?>.</p>
            </div>
          </div>
        </div>

        <h3 class="eeat-subtitle">Delivering Real Results in <?php echo htmlspecialchars($city_name); ?></h3>

        <p class="eeat-text">
          <?php echo htmlspecialchars($results_texts[$var]); ?>
        </p>

        <div class="eeat-cta mt-4">
          <div class="row align-items-center">
            <div class="col-lg-8 mb-3 mb-lg-0">
              <h4>Ready to Grow Your <?php echo htmlspecialchars($city_name); ?> Business?</h4>
              <p>Get a free <?php echo htmlspecialchars($service_name); ?> audit and customized strategy for your <?php echo htmlspecialchars($ind1); ?> or <?php echo htmlspecialchars($ind2); ?> business in <?php echo htmlspecialchars($city_name); ?>, <?php echo htmlspecialchars($state_name); ?>.</p>
            </div>
            <div class="col-lg-4 text-lg-right text-center">
              <a href="javascript:void(0)" data-toggle="modal" data-target="#tteModal" class="eeat-cta-btn">Get Free Audit</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<?php
}?>
