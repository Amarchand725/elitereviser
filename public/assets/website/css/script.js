window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("head").style.background = "#0000fc";
   
  } else {
    // document.getElementById("head").style.background = "linear-gradient(45deg, #070470, #0354d2a6)";
    document.getElementById("head").style.background = "none";
    
  }
}
// $("#mytoggle").click(function(){
//   $(".navbar-Nav").slideUp();
//   console.log('clicked')
// });
$("#mytoggle").click(function(){
  $(".navbar-Nav").animate({
    left: '250px',
    opacity: '0.5',
    height: '150px',
    width: '150px'
  });
});
