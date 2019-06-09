window.onscroll = function() {
  fixNavbar();
  scrollFunction();
}

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("atas").style.display = "block";
    } else {
        document.getElementById("atas").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  
        $('html, body').animate({scrollTop : 0},600);
        return false;
    
}

function fixNavbar() {
  var $nav  = $('.navbar-default');
      

  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    $nav.css({
    	  'background-image':'none',
  'background-color': 'rgba(0, 0, 0, 0.5)', /* Make the menu become transparent */
  'border-radius':' 0px',
  'border':' 1',
  'box-shadow':' none',
  'padding':' 10px',
  'position': 'fixed', /* Make the menu out of the document flow so it can placed anywhere without disturbing other widgets */
  'top':' 0',
  'left': '0',
  'right':'0',
  'z-index': '10'
    });
  } else {
    $nav.css({
      'background-image':'none',
  'background-color': 'transparent', /* Make the menu become transparent */
  'border-radius':' 0px',
  'border':' 0',
  'box-shadow':' none',
  'padding':' 10px',
  'position': 'absolute', /* Make the menu out of the document flow so it can placed anywhere without disturbing other widgets */
  'top':' 0',
  'left': '0',
  'right':'0',
  'z-index': '10'
    });
  }
}




 
 