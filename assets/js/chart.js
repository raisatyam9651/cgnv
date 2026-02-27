$(document).ready(function() {
   var $win = $(window),
       $win_height = $(window).height(),
       // - A multiple of viewport height - The higher this number the sooner triggered.
       windowPercentage = $(window).height() * 0.9;
   $win.on("scroll", scrollReveal);
   function scrollReveal() {
       var scrolled = $win.scrollTop();
       
       ///////////////////////////////////////
       // Bar Charts scroll activate, looking for .trigger class to fire.
       $(".trigger").each(function() {
           var $this = $(this),
               offsetTop = $this.offset().top;
           if (
               scrolled + windowPercentage > offsetTop ||
               $win_height > offsetTop
           ) {
               $(this).each(function(key, bar) {
                   var percentage = $(this).data("percentage");
                   $(this).css("height", percentage + "%"); 
                   
                   ///////////////////////////////////////
                   //        Animated numbers
                   $(this).prop("Counter", 0).animate(
                     //show bar percentage
                     //   {
                     //       Counter: $(this).data("percentage")
                     //   },
                       {
                           duration: 2000,
                           easing: "swing",
                           step: function(now) {
                               $(this).text(Math.ceil(now));
                           }
                       }
                   );
                   //        Animated numbers
                   ///////////////////////////////////////
               });

           } else {
               ///////////////////////////////////////
               // To keep them triggered, lose this block.
               $(this).each(function(key, bar) {
                   $(this).css("height", 0);
               });
           }    
           
       });

   }
   scrollReveal();
});