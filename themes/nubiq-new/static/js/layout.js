jQuery(function($) {
  
  var iOS=/iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
  
  $(".menu-handle, .main-menu .close").click(function(e) {
    e.preventDefault();
    $(".main-menu").toggleClass("active");
  });
  
  $(window).scroll(function() {
    var st=$(".backtotop");
    if ($(window).scrollTop()>100)
      st.addClass("visible");
    else
      st.removeClass("visible");
  });
  
  $(".backtotop").click(function(e) {
    e.preventDefault();
    $("body,html").animate({scrollTop: 0}, 300);
  });
  
  $(".tdots a").click(function(e) {
    e.preventDefault();
    var index=$(".tdots a").index(this);
    $(".tdots li").removeClass("active").eq(index).addClass("active");
    $(".tquotes li").removeClass("active").eq(index).addClass("active");
  });
  setInterval(function() {
    var index=$(".tdots li").index($(".tdots li.active"));
    index++;
    index%=$(".tdots li").length;
    $(".tdots li").removeClass("active").eq(index).addClass("active");
    $(".tquotes li").removeClass("active").eq(index).addClass("active");    
  }, 15000);
  
  if (iOS) {
    $(".service-list > li").click(function() {
      $(".service-list > li").removeClass("active");
      $(this).addClass("active");
    });
  }
  
});