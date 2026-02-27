<script src="assets/js/tweenmax.min.js"></script>
<script src='assets/js/jquery.min.js'></script>
<script src="assets/js/jquery-migrate-3.0.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/js/ScrollMagic.min.js"></script>
<script src="assets/js/animation.gsap.min.js"></script>
<script src="assets/js/debug.addIndicators.min.js"></script>
<script src='assets/js/owl.carousel.js'></script>
<script src='assets/js/aos.js'></script>
<script src='assets/js/custom.js'></script>
<script src='assets/js/menu.js'></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/typed.min.js"></script>
<script src="assets/js/jquery.easypiechart.min.js"></script>
<script src="assets/js/SmoothScroll.min.js"></script>
<script type="text/javascript">
  $(function () {
    AOS.init({
      offset: 100,
      duration: 100,
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
  
   var a ='action';
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

$('#webpopup').change(function(){
	
	$('#webmodal').val($('#webpopup').val());
})
</script>