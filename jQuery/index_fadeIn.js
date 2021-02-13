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