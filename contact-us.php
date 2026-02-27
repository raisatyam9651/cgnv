<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-IN" lang="en-IN">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <title>Contact Us | Cognivic Digital</title>
  <meta name="description" content="">
  <link rel="canonical" href="contact-us.php">
  <meta name='robots' content='index, follow' />
  <link rel="icon" type="image/x-icon" href="images/Our/logo/favicon.png">
  <meta charset="utf-8">
  <?php include('head-links.php'); ?>
    <!-- Google Tag Manager -->

</head>

<body>

<!-- End Google Tag Manager (noscript) -->
  <div class="talk-to-expert-page are-you-looking">
    <div class="tte-bg"></div>
    <div class="container px-4 px-md-0">
      <div class="row align-items-center main-row">
        <div class="col-md-6">
          <div class="logo" data-aos="fade-right" data-aos-delay="100" data-aos-duration="1000">
            <a href="index">
              <img src="images/Our/logo/cognivic-logo.png" alt="" class="img-fluid" style="width:250px">
            </a>
          </div>
          
          <div class="exp-heading" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000" >
            <h2 style="font-size:35px; line-height:45px;">Your Ads, Our Expertise, Guaranteed Results. We Paint the Picture of Success.</h2>
          </div>
          <div class="pt-md-5 pt-5 row pricing-page">
            <div class="col-md-2">
              <div class="" data-aos="fade-up" data-aos-delay="300"
                data-aos-duration="1000">
                <div class="icon"><img src="images/growth.svg" alt=""></div>
                </div>
              </div>
			  
			  <div class="col-md-10">
				<div class="exp-quality" data-aos="fade-up" data-aos-delay="300"
                data-aos-duration="1000">
                <h3 class="title h5">Let’s Kickstart Your Success Today!</h3>
                <p class="sub-title">Ready to unlock your business's full potential? Let us craft a tailored PPC strategy designed to deliver real, measurable results.</p>
                </div> </div>	

            <div class="col-md-2">
              <div class="" data-aos="fade-up" data-aos-delay="300"
                data-aos-duration="1000">
                <div class="icon"><img src="images/audience.svg" alt=""></div>
                </div>
              </div>
			  
			  <div class="col-md-10">
				<div class="exp-quality" data-aos="fade-up" data-aos-delay="300"
                data-aos-duration="1000">
              <h3 class="title">Talk to Our Experts—No Strings Attached!</h3>
                  <p class="sub-title">Get a free consultation with our PPC professionals. We’ll analyze your website, pinpoint issues, and provide actionable insights to enhance your traffic, conversions, and ROI.</p>
                </div> </div>	

   <div class="col-md-2">
              <div class="" data-aos="fade-up" data-aos-delay="300"
                data-aos-duration="1000">
                <div class="icon"><img src="images/audience.svg" alt=""></div>
                </div>
              </div>
			  
			  <div class="col-md-10">
				<div class="exp-quality" data-aos="fade-up" data-aos-delay="300"
                data-aos-duration="1000">
             <h3 class="title h5">Go Beyond Expectations!</h3>
                  <p class="sub-title">Partner with digital marketing experts who dig deep into strategies that drive results. From increasing leads to scaling sales, we bring customers directly to your business.</p>
                </div> </div>					
				
			 
          </div>
          <div class="row align-items-center py-5 px-md-0 px-3">
            <div class="col-12">
                <div  class="text-white">As industry leaders in PPC, we fine-tune your campaigns for performance. With regular success tracking and personalized support, we help you crush your business goals.</div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="ppc-form-box">
            <p class="title h2">Request Pricing</p>
            <p class="subtitle h3">Schedule your conversation today.</p>
            <p class="mini-title">Just drop in your details here and we'll get back to you!</p>
          
			
			 <form action="mail.php" method="post" >
                        <div class="form-group">
                          <input type="text" class="form-control pl-user name" name="name"  placeholder="Name" required>
                        </div>
                        <div class="form-group">
                          <input type="email" class="form-control pl-email email" name="email"  placeholder="Email" required>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control pl-phone phone" name="phone"  placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control pl-url web" name="web"  placeholder="Website URL">
                        </div>
                       <div class="form-group">
                        <input type="text" class="form-control pl-home tte-home comp" name="company" placeholder="Company Name">
                      </div>
                      <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                              <input class="form-control" placeholder="100+39 = ?" type="text" name="captcha" style="width:100%" required>
                            </div>
                          </div>
                        </div>

                        
                        <button type="submit" class="btn-exp d-block text-uppercase w-100">TALK TO OUR EXPERT</button>
						 <p class="bot-info pt-4">By using our offerings and services, you are agreeing to the Terms of Services
                and License Agreement and understand that your use and access will be subject to the terms and
                conditions and Privacy Notice</p>
                      </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>


<script src="assets/js/tweenmax.min.js"></script>
<script src='assets/js/jquery.min.js'></script>
<script src="assets/js/aos.js"></script>
<script type="text/javascript">
  $(function () {
    AOS.init({
      offset: 100,
      duration: 700,
      easing: "ease-in",
      once: !0
    });
    window.addEventListener('load', AOS.refresh);
  });
</script>
<script>
 $(".bform").submit(function (t) {
	  t.preventDefault();
		 var name = $(this).find(".name").val();
		 var email = $(this).find(".email").val();
		 var phone = $(this).find(".phone").val();
		 
		 var athis = $(this);
		 if(name== "" || email == "" || phone == ""){
			 alert('Please fill required field');
			 return false;
		 }
		 if($(this).find('.web').length){
			var web = $(this).find(".web").val();
		 if(web== ""){
			 alert('Please fill website field');
			 return false;
		 }
		 }
  
   var a = 'action',
      e = $(this).attr("method"),
      s = $(this).serialize();
   $.ajax({
      url: a,
      type: e,
      data: s
   }).done(function (t) {
		window.dataLayer = window.dataLayer || []; 
		window.dataLayer.push({'event':'form-submit-success'});
		athis.append('<div class="alert alert-success">Your query has been submitted successfully.</div>'), 
	  
		$(".name").val(""), $(".email").val(""), $(".phone").val(""), $(".msg").val(""), $(".web").val(""), $(".comp").val("");
   })
});
</script>


</html>