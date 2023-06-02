// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn2");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active2");
  current[0].className = current[0].className.replace(" active2", "");
  this.className += " active2";
  });
}

//Change Header style on scrool

$(function() {
  var header = $(".fixed-top");
  $(window).scroll(function() {    
      var scroll = $(window).scrollTop();
  
      if (scroll >= 96) {
          header.removeClass('fixed-top').addClass("fixed-top2");
      } else {
          header.removeClass("fixed-top2").addClass('fixed-top');
      }
  });
});

// Kategorije section

$(document).ready(function(){
  $(".fancybox").fancybox({
      openEffect: "none",
      closeEffect: "none"
  });
});