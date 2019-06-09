	
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})

$(function() {
  $('.navbar-default .navbar-nav > li > a').hover(function() {
    $('.navbar-default .navbar-brand').css('color', 'rgba(255, 255, 255, 0.4)');
    $('.navbar-default .navbar-nav > li > a').css('color', 'rgba(255, 255, 255, 0.4)');
    $('.navbar-default .navbar-nav > li > a:hover').css('color', '#fff');
  }, function() {
    // on mouseout, reset the background colour
    $('.navbar-default .navbar-brand').css('color', '#fff');
    $('.navbar-default .navbar-nav > li > a').css('color', '#fff');
  });
});
$(function() {
  $('.navbar-default .navbar-brand').hover(function() {
    $('.navbar-default .navbar-brand').css('color', 'rgba(255, 255, 255, 0.4)');
    $('.navbar-default .navbar-nav > li > a').css('color', 'rgba(255, 255, 255, 0.4)');
    $('.navbar-default .navbar-brand:hover').css('color', '#fff');
  }, function() {
    // on mouseout, reset the background colour
    $('.navbar-default .navbar-brand').css('color', '#fff');
    $('.navbar-default .navbar-nav > li > a').css('color', '#fff');
  });
});

