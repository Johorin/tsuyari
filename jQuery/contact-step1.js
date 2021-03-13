$("button.menu-trigger").click(function(){
    if($(this).hasClass("active")){ // クリックされた要素がactiveクラスだったら
      $(this).removeClass("active");
      $(".header-wrapper").removeClass("slide");
      $(".contact-wrapper").removeClass("slide");
      $(".footer-wrapper1").removeClass("slide");
      $(".footer-wrapper2").removeClass("slide");
      $("nav.hamburgermenu").removeClass("slide");
    }else{
      $(this).addClass("active");
      $(".header-wrapper").addClass("slide");
      $(".contact-wrapper").addClass("slide");
      $(".footer-wrapper1").addClass("slide");
      $(".footer-wrapper2").addClass("slide");
      $("nav.hamburgermenu").addClass("slide");
    }
 });