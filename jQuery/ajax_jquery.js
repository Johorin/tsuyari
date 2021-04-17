'use strict';

$.ajax({url: '/data/instagram.json', dataType: 'json'})
.done(function(data){
    //console.log(data);
    //console.log(data.media.data[0].media_url);
    //var img = document.getElementById('instagram');
    //img.setAttribute('src', data.media.data[0].media_url);

    /* BOMの改行コードを正規表現(/\s+/g)で検索し全て<br>に置き換える */
    var str1 = data.media.data[0].caption;
    var str2 = data.media.data[1].caption;
    var str3 = data.media.data[2].caption;
    var str4 = data.media.data[3].caption;
    var str5 = data.media.data[4].caption;
    var str6 = data.media.data[5].caption;
    var str7 = data.media.data[6].caption;
    var str8 = data.media.data[7].caption;
    var result1 = str1.replace(/\s+/g, '<br>');
    var result2 = str2.replace(/\s+/g, '<br>');
    var result3 = str3.replace(/\s+/g, '<br>');
    var result4 = str4.replace(/\s+/g, '<br>');
    var result5 = str5.replace(/\s+/g, '<br>');
    var result6 = str6.replace(/\s+/g, '<br>');
    var result7 = str7.replace(/\s+/g, '<br>');
    var result8 = str8.replace(/\s+/g, '<br>');

    /* Instagramの投稿画像 */
    var post1 = document.getElementById('posting1');
    var post2 = document.getElementById('posting2');
    var post3 = document.getElementById('posting3');
    var post4 = document.getElementById('posting4');
    var post5 = document.getElementById('posting5');
    var post6 = document.getElementById('posting6');
    var post7 = document.getElementById('posting7');
    var post8 = document.getElementById('posting8');
    post1.style.background = "url(" + data.media.data[0].media_url + ") center center / cover no-repeat";
    post2.style.background = "url(" + data.media.data[1].media_url + ") center center / cover no-repeat";
    post3.style.background = "url(" + data.media.data[2].media_url + ") center center / cover no-repeat";
    post4.style.background = "url(" + data.media.data[3].media_url + ") center center / cover no-repeat";
    post5.style.background = "url(" + data.media.data[4].media_url + ") center center / cover no-repeat";
    post6.style.background = "url(" + data.media.data[5].media_url + ") center center / cover no-repeat";
    post7.style.background = "url(" + data.media.data[6].media_url + ") center center / cover no-repeat";
    post8.style.background = "url(" + data.media.data[7].media_url + ") center center / cover no-repeat";

    /* Instagramの投稿に対するいいね数 */
    var like_count1 = document.getElementById('like-count1');
    var like_count2 = document.getElementById('like-count2');
    var like_count3 = document.getElementById('like-count3');
    var like_count4 = document.getElementById('like-count4');
    var like_count5 = document.getElementById('like-count5');
    var like_count6 = document.getElementById('like-count6');
    var like_count7 = document.getElementById('like-count7');
    var like_count8 = document.getElementById('like-count8');
    like_count1.innerHTML = "<p>" + data.media.data[0].like_count + "</p>";
    like_count2.innerHTML = "<p>" + data.media.data[1].like_count + "</p>";
    like_count3.innerHTML = "<p>" + data.media.data[2].like_count + "</p>";
    like_count4.innerHTML = "<p>" + data.media.data[3].like_count + "</p>";
    like_count5.innerHTML = "<p>" + data.media.data[4].like_count + "</p>";
    like_count6.innerHTML = "<p>" + data.media.data[5].like_count + "</p>";
    like_count7.innerHTML = "<p>" + data.media.data[6].like_count + "</p>";
    like_count8.innerHTML = "<p>" + data.media.data[7].like_count + "</p>";

    /* Instagramの投稿のキャプション */
    var caption1 = document.getElementById('posting1-text');
    var caption2 = document.getElementById('posting2-text');
    var caption3 = document.getElementById('posting3-text');
    var caption4 = document.getElementById('posting4-text');
    var caption5 = document.getElementById('posting5-text');
    var caption6 = document.getElementById('posting6-text');
    var caption7 = document.getElementById('posting7-text');
    var caption8 = document.getElementById('posting8-text');
    caption1.innerHTML = "<p>" + result1 + "</p>";
    caption2.innerHTML = "<p>" + result2 + "</p>";
    caption3.innerHTML = "<p>" + result3 + "</p>";
    caption4.innerHTML = "<p>" + result4 + "</p>";
    caption5.innerHTML = "<p>" + result5 + "</p>";
    caption6.innerHTML = "<p>" + result6 + "</p>";
    caption7.innerHTML = "<p>" + result7 + "</p>";
    caption8.innerHTML = "<p>" + result8 + "</p>";

    /* Instagramの投稿へのリンク */
    var postLink1 = document.getElementById('post-link1');
    var postLink2 = document.getElementById('post-link2');
    var postLink3 = document.getElementById('post-link3');
    var postLink4 = document.getElementById('post-link4');
    var postLink5 = document.getElementById('post-link5');
    var postLink6 = document.getElementById('post-link6');
    var postLink7 = document.getElementById('post-link7');
    var postLink8 = document.getElementById('post-link8');
    postLink1.setAttribute('href', data.media.data[0].permalink);
    postLink2.setAttribute('href', data.media.data[1].permalink);
    postLink3.setAttribute('href', data.media.data[2].permalink);
    postLink4.setAttribute('href', data.media.data[3].permalink);
    postLink5.setAttribute('href', data.media.data[4].permalink);
    postLink6.setAttribute('href', data.media.data[5].permalink);
    postLink7.setAttribute('href', data.media.data[6].permalink);
    postLink8.setAttribute('href', data.media.data[7].permalink);
})
.fail(function(){
    console.log('$.ajax failed!');
})