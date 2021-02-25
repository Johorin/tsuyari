/*jQuery*/
$(function() {
   $(window).on('load scroll', function() {
      var winScroll = $(window).scrollTop();
      var winHeight = $(window).height();
      var scrollPos1 = winScroll + (winHeight * 0.8);  //大きな画像イメージのフェードイン用
      var scrollPos2 = winScroll + (winHeight * 0.7);  //文字などのフェードイン用
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
/*JavaScript*/
// hbmn要素を取得(ID)
//var hbmn_element = document.getElementById("hbmn");
// クラス名を追加
//hbmn_element.classList.add("active");
/*document.getElementById('hbmn').addEventListener('click', () => {
   document.getElementById('hbmn').classList.add("active");
});*/
$("button.menu-trigger").click(function(){
   if($(this).hasClass("active")){ // クリックされた要素がactiveクラスだったら
     $(this).removeClass("active");
   }else{
     $(this).addClass("active");
   }
});