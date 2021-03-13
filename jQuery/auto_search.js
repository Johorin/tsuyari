/*以下ajaxzip3（住所の自動取得をするためのスクリプト）*/
/*$('.ajaxzip3').on('click', function(){
  AjaxZip3.zip2addr('zip','','pref','addr1','addr2', 'addr3');
  //成功時に実行する処理
  AjaxZip3.onSuccess = function() {
      $('.addr3').focus();
  };
  //失敗時に実行する処理
  AjaxZip3.onFailure = function() {
      alert('郵便番号に該当する住所が見つかりません');
  };
  return false;
});*/
$('.searchAddress').on('click', function() {
    AjaxZip3.zip2addr('zip', '', 'pref', 'address');
    //成功時に実行する処理
    AjaxZip3.onSuccess = function() {
        setTimeout(function() {
        $('.address').focus();
        },10);
    };
    //失敗時に実行する処理
    AjaxZip3.onFailure = function() {
        alert('郵便番号に該当する住所が見つかりません');
    };
    return false;
});