/*jQuery*/
$(function(){
    $(window).on('load scroll', function() {
       var winScroll = $(window).scrollTop();
       var winHeight = $(window).height();
       var scrollPos1 = winScroll + (winHeight * 0.8);  //大きな画像イメージのフェードイン用
       var scrollPos2 = winScroll + (winHeight * 0.6);  //商品イメージのフェードイン用
       $(".show1").each(function() {
          if($(this).offset().top < scrollPos1) {
             $(this).css({opacity: 1, transform: 'translate(0, 0)'});
          }
       });
       $(".show2").each(function() {
        if($(this).offset().top < scrollPos2) {
           $(this).css({opacity: 1, transform: 'translate(0, 0)'});
        }
     });
    });
 });
//ハンバーガーメニュー
$("button.menu-trigger").click(function(){
   if($(this).hasClass("active")){ // クリックされた要素がactiveクラスだったら
     $(this).removeClass("active");
     $(".header-wrapper").removeClass("slide");
     $(".topImages").removeClass("slide");
     $(".inner-wrapper").removeClass("slide");
     $(".about-donyuKosyu").removeClass("slide");
     $(".tsuyari-hope").removeClass("slide");
     $(".footImage").removeClass("slide");
     $(".footer-wrapper1").removeClass("slide");
     $(".footer-wrapper2").removeClass("slide");
     $("nav.hamburgermenu").removeClass("slide");
   }else{
     $(this).addClass("active");
     $(".header-wrapper").addClass("slide");
     $(".topImages").addClass("slide");
     $(".inner-wrapper").addClass("slide");
     $(".about-donyuKosyu").addClass("slide");
     $(".tsuyari-hope").addClass("slide");
     $(".footImage").addClass("slide");
     $(".footer-wrapper1").addClass("slide");
     $(".footer-wrapper2").addClass("slide");
     $("nav.hamburgermenu").addClass("slide");
   }
});