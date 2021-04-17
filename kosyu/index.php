<?php
    // jsonファイルとして認識する
    //header("Content-Type: application/json; charset=utf-8");


    // 有効なjsonファイルが存在するかのboolean
    $is_file = false;

    // ディレクトリがない場合は、ディレクトリを作成する
    $json_dir = __DIR__.'/data';
    if (!is_dir($json_dir)) {
    mkdir($json_dir);
    }

    // jsonファイルのパス
    $json_file = $json_dir.'/instagram.json';

    // jsonファイルがすでに存在しているか判別する
    if (file_exists($json_file)) {
    
        // ファイルアクセス時の時間（時のみ）
        $current_hour = (+date('H'));
        
        // 0時と12時にcronが実行するような振る舞い
        switch (true) {
            case ($current_hour < 12):
            $check_hour = 0;
            break;
            
            default:
            $check_hour = 12;
        }
    
        // jsonファイルの更新日時が、cron時間より後か判別する
        if (filemtime($json_file) > mktime($check_hour, 0, 0, date('m'), date('d'), date('Y'))) {
            
            // jsonファイルを呼び出す
            $instagram_api_data = file_get_contents($json_file);
            
            // jsonファイルの呼び出しに成功したか判別する
            if ($instagram_api_data !== false) {
            $is_file = true;
            }
        }
    }



    // jsonファイルが存在しない、もしくはjsonファイルが古い場合
    if ($is_file === false) {
        // InstagramグラフAPIを参照する
        $instagram_request_url = 'https://graph.facebook.com/v10.0/17841420321058726?fields=name,media.limit(8){id,ig_id,media_type,permalink,media_url,like_count,caption}&access_token=EAAQPQmZCh2d8BACJKmAAZBAdKe1QcNGcZAbDVqz3ZBuDulcZCg7dZBHlsUlEVZCL0VvRD50PlkfQ0V8tm4sbZCZCZAdDwKEMQzyitZBCZA5ArM4ktZAEndEZCvqn1ft7j8ZCoZC72ZCGwz3VCxZAI4263WAseaNblP2xBNAZC3NGjOIh3nMWQhiMsySGfyCx4FJ7hY6HDajo9IZD';
        
        // InstagramグラフAPIのデータを取得する
        $instagram_api_data = file_get_contents($instagram_request_url);
        
        // InstagramグラフAPIのデータを取得できたか判別する
        if ($instagram_api_data !== false) {
            file_put_contents($json_file, $instagram_api_data);
        } else {
            $instagram_api_data = '{}';
        }  
    }

    // データを返却する
    //echo $instagram_api_data;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--PC-->
        <link rel="stylesheet" href="./kosyu_css/kosyu_pc.css" media="screen and (min-width:1290px)">
        <!--タブレット-->
        <link rel="stylesheet" href="./kosyu_css/kosyu_tablet.css" media="screen and (min-width:962px) and (max-width:1289px)">
        <!--(タブレット〜)スマホ-->
        <link rel="stylesheet" href="./kosyu_css/kosyu_sp.css" media="screen and (min-width:320px) and (max-width:961px)">
    <link rel="icon" href="../logo-icon/logo-icon-152×152.ico">
    <link rel="apple-touch-icon" type="image/png" href="../logo-icon/logo-icon-152×152.png">
    <title>国産WAX脱毛商材、艶人の販売代理店店｜Luire</title>
    <meta name="description" content="純国産のWAX脱毛商材、艶人の魅力をお伝えしています。植物由来成分100％でどなたでも安心して使える脱毛商材です。">
    <meta name="keywords" content="艶人,WAX脱毛,脱毛商材,国産脱毛材,Luire,ルイ―ル,栃木県,小山市">
</head>
<body>
<header>
<div class="header-wrapper">
    <div class="header-wrapper__logo">
        <div class="header-wrapper__logo--wrapper">
            <h1 class="logo">
                <a href="../index.html"><img src="../logo.png" alt="Total Esthetic SALON LUIRE" id="logoImage"></a>
            </h1>
        </div>
    </div>
    <div class="header-wrapper__nav">
        <ul class="list-header-nav">
            <li><a href="../index.html">HOME</a></li>
            <li><a href="./index.html">導入講習</a></li>
            <li><a href="../contact/form.php">お問い合わせ</a></li>
        </ul>
    </div>
    <!--ハンバーガーメニューの実装がうまくいかなかったので後ほど別の方法で作ります-->
    <div class="header-wrapper__hamburger-menu">
        <button class="menu-trigger" id="hbmn">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</div>
</header>
<main>
<div class="top-wrapper">
    <div class="main-topImage simple-fadeIn show1" id="top" name="top">
        <h2>安心の導入講習制度</h2>
        <h3>艶人ブランド独自のオリジナルコース</h3>
        <div class="main-topImage__textBox">
            <p>艶人ブランドを安心して導入していただくための講習制度</p>
            <p>も完備しています。導入初心者から経験のある方まで、幅</p>
            <p>広く学んでいただけるコース内容になっています。</p>
        </div>
    </div>
</div>
<div class="main-wrapper">
    <div class="main-wrapper__headline slide-bottom show2">
        <h2 class="headline">講習内容について</h2>
    </div>
    <div class="donyu">
        <div class="title-wrapper slide-bottom show2">
            <div class="leftShape">
                <img src="./kosyu_image/shape-left.png" alt="">
            </div>
            <div class="title-wrapper__text">
                <h2 class="titleText">導入講習</h2>
            </div>
            <div class="rightShape">
                <img src="./kosyu_image/shape-right.png" alt="">
            </div>
        </div>
        <div class="donyu__table1 slide-bottom show2">
            <div class="donyu__table1--caution">
                <p class="caution">※税込み表示価格</p>
            </div>
            <table>
                <tr>
                    <th class="head1"><p>日数・時間</p></th>
                    <th class="head2"><p>詳細</p></th>
                    <th class="head3"><p>料金</p></th>
                </tr>
                <tr>
                    <td class="data1"><p>①導入講習<br>2日間/12時間</p></td>
                    <td class="data2">
                        <p class="text1">
                            理論・カウンセリング・商品説明・注意事項<br>
                            ボディー・フェイシャル・ヒゲ・HOT パック<br>
                            ブラジリアン or メンズブラジリアン
                        </p>
                        <p class="text2">
                            理論・カウンセリング・商品説明・注意事項・ボディー・フェイシャル・ヒゲ・HOT パック・ブラジリアン or メンズブラジリアン
                        </p>
                    </td>
                    <td class="data3">
                        <div class="donyu-fee-table text1">
                            <div class="donyu-instructors">
                                <p>マンツーマン</p>
                                <p>3人以上</p>
                                <p>10人以上</p>
                            </div>
                            <div class="donyu-fee">
                                <p>¥198,000</p>
                                <p>¥165,000</p>
                                <p>¥110,000</p>
                            </div>
                        </div>
                        <div class="donyu-fee-table text2">
                            <div class="donyu-specifics">
                                <p>マンツーマン<br>¥198,000</p>
                                <p>3人以上<br>¥165,000</p>
                                <p>10人以上<br>¥110,000</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="pattern slide-bottom show2">
            <h3>ワックス脱毛初心者の方、基礎から理論と技術を学びたい方</h3>
        </div>
        <div class="pattern pattern-sp slide-bottom show2">
            <h3>
                ワックス脱毛初心者の方、<br>
                基礎から理論と技術を学びたい方
            </h3>
        </div>
        <div class="donyu__table2 slide-bottom show2">
            <div class="donyu__table2--first">
                <table>
                    <tr>
                        <th class="head1">導入講習</th>
                    </tr>
                    <tr>
                        <td class="data1">
                            <div class="textGroup">
                                <div class="text1">
                                    <p>講習 2 日間（12時間）</p>
                                </div>
                                <div class="text2">
                                    <p>
                                        テキスト、カウンセリング資料、ディプロマ込み<br>
                                        講習教材費込み
                                    </p>
                                </div>
                            </div>
                            <div class="syozai-donyu-set">
                                <img class="text1" src="./kosyu_image/deploymentalSet.png" alt="商材導入セット（脱毛＋パック）¥63,459（税込）">
                                <img class="text2" src="./kosyu_image/deploymentalSet-big.png" alt="商材導入セット（脱毛＋パック）¥63,459（税込）">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="donyu__table2--second">
                <table>
                    <tr>
                        <th class="head1">内容・特典</th>
                    </tr>
                    <tr>
                        <td class="data1">
                            <div class="textGroup">
                                <ul class="donyu-contentPrivilege">
                                    <li>・ワックス脱毛のメニュー価格、サロンワークへのご提案(部位ごとの施術金額など) サロンワークに必要な資料提供</li>
                                    <li>・販促 POP、画像などの提供</li>
                                    <li>・艶人HPにて認定サロン&取扱サロンとして掲載</li>
                                    <li>・メーカー主催講習割引</li>
                                    <li>・サロンスタッフ様向け講習(有料) </li>
                                    <li>・新商品説明会、各講習会の案内</li>
                                    <li>・各種相談(電話・メール対応)</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="set">
        <div class="title-wrapper slide-bottom show2">
            <div class="leftShape">
                <img src="./kosyu_image/shape-left.png" alt="">
            </div>
            <div class="title-wrapper__text">
                <h2 class="titleText">セット講習</h2>
            </div>
            <div class="rightShape">
                <img src="./kosyu_image/shape-right.png" alt="">
            </div>
        </div>
        <div class="set__table1 slide-bottom show2">
            <table>
                <tr class="head">
                    <th class="head1">日数・時間</th><th class="head2">詳細</th>
                </tr>
                <tr class="data">
                    <td class="data1">②セット講習<br>各1日/5時間</td>
                    <td class="data2">
                        <p class="text1">
                            サロンメニューに必要な技術をセットで学びたい方<br>
                            (全5コース)
                        </p>
                        <p class="text2">
                            サロンメニューに必要な技術を<br>
                            セットで学びたい方<br>
                            (全5コース)
                        </p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="pattern slide-bottom show2">
            <h3>サロンに必要な人気な部位を艶人オリジナルで組み合わせた講習</h3>
        </div>
        <div class="pattern pattern-sp slide-bottom show2">
            <h3>
                サロンに必要な人気な部位を<br>
                艶人オリジナルで組み合わせた講習
            </h3>
        </div>
        <div class="set__table2 set__table2-text1 slide-bottom show2">
            <div class="set__table2--caution">
                <p class="caution">※税込み表示価格</p>
            </div>
            <table>
                <tr class="head">
                    <th class="head1" colspan="2">コース内容</th>
                    <th class="head2">受講料</th>
                    <th class="head3">特典</th>
                </tr>
                <tr class="data">
                    <th class="al-head al-headA">A</th>
                    <td class="data1">
                        <h3>フェイシャルに特化コース</h3>
                        <p>フェイシャル・鼻毛・フェイシャル HOT パック</p>
                    </td>
                    <td class="data2">￥71,500</td>
                    <td class="data3" rowspan="5">
                        <div class="textGroup">
                            <ul>
                                <li>・本部、販売店主催フォロー<br>
                                    講習参加(有料・受講部位のみ)</li>
                                <li>　</li>
                                <li>・認定&取扱サロン登録</li>
                            </ul>
                        </div>
                        <div class="privilege">
                            <img src="./kosyu_image/privilege-tax.png" alt="テキストとディプロマは有料、教材費は¥16,500もしくは購入商材使用">
                        </div>
                    </td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headB">B</th>
                    <td class="data1">
                        <h3>𫝶ったまま施術できるコース</h3>
                        <p>鼻毛・うなじ・眉毛・指毛・手の甲・耳毛</p>
                    </td>
                    <td class="data2">￥60,500</td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headC">C</th>
                    <td class="data1">
                        <h3>メンズに特化コース</h3>
                        <p>ヒゲ・鼻毛・フェイシャル HOT パック</p>
                    </td>
                    <td class="data2">￥71,500</td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headD">D</th>
                    <td class="data1">
                        <h3>ブライダル向けコース</h3>
                        <p>デコルテ・背中・うなじ・バスト HOT パック</p>
                    </td>
                    <td class="data2">￥77,000</td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headE">E</th>
                    <td class="data1 data1-last">
                        <h3>デリケートゾーンに特化コース</h3>
                        <p>レディース VIO・メンズ VIO・VIOHOT パック</p>
                    </td>
                    <td class="data2 data2-last">￥104,500</td>
                </tr>
            </table>
        </div>
        <div class="set__table2 set__table2-text2 slide-bottom show2">
            <div class="set__table2--caution">
                <p class="caution">※税込み表示価格</p>
            </div>
            <table class="tableA">
                <tr class="head">
                    <th class="head1" colspan="2">コース内容</th>
                    <th class="head2">受講料</th>
                </tr>
                <tr class="data">
                    <th class="al-head al-headA">A</th>
                    <td class="data1">
                        <h3>フェイシャルに特化コース</h3>
                        <p>フェイシャル・鼻毛・フェイシャル HOT パック</p>
                    </td>
                    <td class="data2">￥71,500</td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headB">B</th>
                    <td class="data1">
                        <h3>𫝶ったまま施術できるコース</h3>
                        <p>鼻毛・うなじ・眉毛・指毛・手の甲・耳毛</p>
                    </td>
                    <td class="data2">￥60,500</td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headC">C</th>
                    <td class="data1">
                        <h3>メンズに特化コース</h3>
                        <p>ヒゲ・鼻毛・フェイシャル HOT パック</p>
                    </td>
                    <td class="data2">￥71,500</td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headD">D</th>
                    <td class="data1">
                        <h3>ブライダル向けコース</h3>
                        <p>デコルテ・背中・うなじ・バスト HOT パック</p>
                    </td>
                    <td class="data2">￥77,000</td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headE">E</th>
                    <td class="data1 data1-last">
                        <h3>デリケートゾーンに特化コース</h3>
                        <p>レディース VIO・メンズ VIO・VIOHOT パック</p>
                    </td>
                    <td class="data2 data2-last">￥104,500</td>
                </tr>
            </table>
            <table class="tableB">
                <tr class="head">
                    <th class="head1">
                        <h3>特典</h3>
                    </th>
                </tr>
                <tr class="data">
                    <td class="data1">
                        <div class="textBox">
                            <ul>
                                <li>・本部、販売店主催フォロー<br>
                                    講習参加(有料・受講部位のみ)</li>
                                <li>　</li>
                                <li>・認定&取扱サロン登録</li>
                            </ul>
                        </div>
                        <div class="privilege">
                            <img class="text1" src="./kosyu_image/privilege-tax.png" alt="テキストとディプロマは有料、教材費は¥16,500もしくは購入商材使用">
                            <img class="text2" src="./kosyu_image/privilege-tax-big.png" alt="テキストとディプロマは有料、教材費は¥16,500もしくは購入商材使用">
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="byPart">
        <div class="title-wrapper slide-bottom show2">
            <div class="leftShape">
                <img src="./kosyu_image/shape-left.png" alt="">
            </div>
            <div class="title-wrapper__text">
                <h2 class="titleText">パーツ別講習</h2>
            </div>
            <div class="rightShape">
                <img src="./kosyu_image/shape-right.png" alt="">
            </div>
        </div>
        <div class="byPart__table1 slide-bottom show2">
            <div class="byPart__caution">
                <p class="caution">※税込み表示価格</p>
            </div>
            <table>
                <tr class="head">
                    <th class="head1">日数・時間</th>
                    <th class="head2">詳細</th>
                    <th class="head3">料金</th>
                </tr>
                <tr class="data">
                    <td class="data1">③パーツ別講習<br>1コース/5時間</td>
                    <td class="data2">部位ごとの専門技術を習得<br>(全6コース)</td>
                    <td class="data3">各 ¥55,000</td>
                </tr>
            </table>
        </div>
        <div class="pattern slide-bottom show2">
            <h3>サロンメニューに必要な技術をパーツ別に学べる講習</h3>
        </div>
        <div class="pattern pattern-sp slide-bottom show2">
            <h3>
                サロンメニューに必要な技術を<br>
                パーツ別に学べる講習
            </h3>
        </div>
        <div class="byPart__table2 byPart__table2-text1 slide-bottom show2">
            <div class="byPart__table2--caution">
                <p class="caution">※税込み表示価格</p>
            </div>
            <table>
                <tr class="head">
                    <th class="head1" colspan="2">コース内容</th>
                    <th class="head2">受講料</th>
                    <th class="head3">特典</th>
                </tr>
                <tr class="data">
                    <th class="al-head al-headA">A</th>
                    <td class="data1">
                        <h3>ボディー(脚・腕・うなじ・脇)</h3>
                    </td>
                    <td class="data2" rowspan="6">各 ¥55,000<br>(5時間)</td>
                    <td class="data3" rowspan="6">
                        <div class="textGroup">
                            <ul>
                                <li>・本部、販売店主催フォロー<br>
                                    講習参加(有料・受講部位のみ)</li>
                                <li>　</li>
                                <li>・認定&取扱サロン登録</li>
                            </ul>
                        </div>
                        <div class="privilege">
                            <img src="./kosyu_image/privilege-tax.png" alt="テキストとディプロマは有料、教材費は¥16,500もしくは購入商材使用">
                        </div>
                    </td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headB">B</th>
                    <td class="data1">
                        <h3>フェイシャル(女性フェイシャル、鼻毛)</h3>
                    </td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headC">C</th>
                    <td class="data1">
                        <h3>ヒゲ(男性ヒゲ・鼻毛)</h3>
                    </td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headD">D</th>
                    <td class="data1">
                        <h3>ブラジリアン(女性 VIO)</h3>
                    </td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headE">E</th>
                    <td class="data1">
                        <h3>メンズブラジリアン(男性 VIO)</h3>
                    </td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headF">F</th>
                    <td class="data1 data1-last">
                        <h3>HOT パック(フェイシャル・かかと・VIO・バスト)</h3>
                    </td>
                </tr>
            </table>
        </div>
        <div class="byPart__table2 byPart__table2-text2 slide-bottom show2">
            <div class="byPart__table2--caution">
                <p class="caution">※税込み表示価格</p>
            </div>
            <table class="tableA">
                <tr class="head">
                    <th class="head1" colspan="2">コース内容</th>
                    <th class="head2">受講料</th>
                </tr>
                <tr class="data">
                    <th class="al-head al-headA">A</th>
                    <td class="data1">
                        <h3>ボディー(脚・腕・うなじ・脇)</h3>
                    </td>
                    <td class="data2" rowspan="6">各 ¥55,000<br>(5時間)</td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headB">B</th>
                    <td class="data1">
                        <h3>フェイシャル(女性フェイシャル、鼻毛)</h3>
                    </td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headC">C</th>
                    <td class="data1">
                        <h3>ヒゲ(男性ヒゲ・鼻毛)</h3>
                    </td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headD">D</th>
                    <td class="data1">
                        <h3>ブラジリアン(女性 VIO)</h3>
                    </td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headE">E</th>
                    <td class="data1">
                        <h3>メンズブラジリアン(男性 VIO)</h3>
                    </td>
                </tr>
                <tr class="data">
                    <th class="al-head al-headF">F</th>
                    <td class="data1 data1-last">
                        <h3>HOT パック(フェイシャル・かかと・VIO・バスト)</h3>
                    </td>
                </tr>
            </table>
            <table class="tableB">
                <tr class="head">
                    <th class="head1">
                        <h3>特典</h3>
                    </th>
                </tr>
                <tr class="data">
                    <td class="data1">
                        <div class="textBox">
                            <ul>
                                <li>・本部、販売店主催フォロー<br>
                                    講習参加(有料・受講部位のみ)</li>
                                <li>　</li>
                                <li>・認定&取扱サロン登録</li>
                            </ul>
                        </div>
                        <div class="privilege">
                            <img class="text1" src="./kosyu_image/privilege-tax.png" alt="テキストとディプロマは有料、教材費は¥16,500もしくは購入商材使用">
                            <img class="text2" src="./kosyu_image/privilege-tax-big.png" alt="テキストとディプロマは有料、教材費は¥16,500もしくは購入商材使用">
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="switchCompany">
        <div class="title-wrapper slide-bottom show2">
            <div class="leftShape">
                <img src="./kosyu_image/shape-left.png" alt="">
            </div>
            <div class="title-wrapper__text">
                <h2 class="titleText">他社切り替え講習</h2>
            </div>
            <div class="rightShape">
                <img src="./kosyu_image/shape-right.png" alt="">
            </div>
        </div>
        <div class="switchCompany__table1 slide-bottom show2">
            <div class="switchCompany__table1--caution">
                <p class="caution">※税込み表示価格</p>
            </div>
            <table>
                <tr class="head">
                    <th class="head1">日数・時間</th>
                    <th class="head2">詳細</th>
                    <th class="head3">料金</th>
                </tr>
                <tr class="data">
                    <td class="data1">④他社切り替え講習<br>1日 /5時間</td>
                    <td class="data2">
                        <p class="text1">
                            他社講習取得済みのサロン様からで<br>
                            艶人の商材を導入したい方<br>
                            　<br>
                            他社で講習を受けられた部位のみを施術する場合、<br>
                            講習なしでも艶人の商材を導入いただけます。<br>
                            （講習なしの場合、特典やテキスト資料、<br>
                            ディプロマ発行はございません）
                        </p>
                        <p class="text2">
                            他社講習取得済みのサロン様からで艶人の商材を導入したい方<br>
                            　<br>
                            他社で講習を受けられた部位のみを施術する場合、講習なしでも艶人の商材を導入いただけます。（講習なしの場合、特典やテキスト資料、ディプロマ発行はございません）
                        </p>
                    </td>
                    <td class="data3">各 ¥55,000</td>
                </tr>
            </table>
        </div>
        <div class="pattern slide-bottom show2">
            <h3>他社講習取得済の方で艶人の技術の基本、商材について学べる講習</h3>
        </div>
        <div class="pattern pattern-sp slide-bottom show2">
            <h3>
                他社講習取得済の方で艶人の技術の基本、<br>
                商材について学べる講習
            </h3>
        </div>
        <div class="switchCompany__table2 slide-bottom show2">
            <div class="switchCompany__table2--caution">
                <p class="caution">※税込み表示価格</p>
            </div>
            <div class="switchCompany__table2--text1">
                <table>
                    <tr class="head">
                        <th class="head1">コース内容</th>
                        <th class="head2">受講料</th>
                        <th class="head3">特典</th>
                    </tr>
                    <tr class="data">
                        <td class="data1">
                            商品説明・基本技術(他社で講習済み部位のみ) <br>
                            【条件】<br>
                            他社ディプロマ提示 or <br>
                            HPやホットペッパー等メニューが確認できるもの
                        </td>
                        <td class="data2">
                            <p class="text1">¥55,000(5時間)</p>
                            <p class="text2">¥55,000<br>(5時間)</p>
                        </td>
                        <td class="data3">
                            <ul>
                                <li>・本部、販売店主催フォロー<br>講習参加(有料・受講部位のみ)</li>
                                <li>　</li>
                                <li>・認定&取扱サロン登録</li>
                            </ul>
                            <div class="privilege">
                                <img class="text1" src="./kosyu_image/privilege-tax.png" alt="テキストとディプロマは有料、教材費は¥16,500もしくは購入商材使用">
                                <img class="text2" src="./kosyu_image/privilege-tax-big.png" alt="テキストとディプロマは有料、教材費は¥16,500もしくは購入商材使用">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="switchCompany__table2--text2">
                <table class="tableA">
                    <tr class="head">
                        <th class="head1">コース内容</th>
                        <th class="head2">受講料</th>
                    </tr>
                    <tr class="data">
                        <td class="data1">
                            商品説明・基本技術(他社で講習済み部位のみ) <br>
                            【条件】<br>
                            他社ディプロマ提示 or <br>
                            HPやホットペッパー等メニューが確認できるもの
                        </td>
                        <td class="data2">
                            <p>¥55,000<br>(5時間)</p>
                        </td>
                    </tr>
                </table>
                <table class="tableB">
                    <tr class="head">
                        <th class="head1">特典</th>
                    </tr>
                    <tr class="data">
                        <td class="data1">
                            <ul>
                                <li>・本部、販売店主催フォロー<br>講習参加(有料・受講部位のみ)</li>
                                <li>　</li>
                                <li>・認定&取扱サロン登録</li>
                            </ul>
                            <div class="privilege">
                                <img src="./kosyu_image/privilege-tax-big.png" alt="テキストとディプロマは有料、教材費は¥16,500もしくは購入商材使用">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="initialDeployment slide-bottom show2">
        <div class="title-wrapper">
            <div class="leftShape">
                <img src="./kosyu_image/shape-left.png" alt="">
            </div>
            <div class="title-wrapper__text">
                <h2 class="titleText">初回限定導入セット</h2>
            </div>
            <div class="rightShape">
                <img src="./kosyu_image/shape-right.png" alt="">
            </div>
        </div>
        <div class="pattern slide-bottom show2">
            <h3>初回の講習受講時限定のお得なセット商材です。</h3>
        </div>
        <div class="pattern pattern-sp slide-bottom show2">
            <h3>
                初回の講習受講時限定の<br>
                お得なセット商材です。
            </h3>
        </div>
        <div class="initialDeployment__table1 slide-bottom show2">
            <div class="initialDeployment__table1--A">
                <table>
                    <tr class="head">
                        <th class="head1"><span>A.</span>脱毛 ＋ パック</th>
                    </tr>
                    <tr class="data">
                        <td class="data1">
                            <p>
                                【WAX】Copal、Umber<br>
                                【ローション類】スキンクリーナー、スウェリングプラス<br>
                                　　　　コンディショニングミルク、ホワイティーセラム<br>
                                　　　　レスキューム、パールエッセンス<br>
                                【備品】カラー、スパチュラ大・中・小・ノーズ<br>
                            </p>
                            <div class="limitedPrice">
                                <div class="limitedPrice__text">
                                    <h3 class="price">61,730円</h3>
                                    <h3 class="text">限定価格</h3>
                                </div>
                                <div class="limitedPrice__price">
                                    <h2>57,690円</h2>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="initialDeployment__table1--B">
                <table>
                    <tr class="head">
                        <th class="head1"><span>B.</span>WAX脱毛</th>
                    </tr>
                    <tr class="data">
                        <td class="data1">
                            <p>
                                【WAX】Copal、Umber<br>
                                【ローション類】スキンクリーナー、スウェリングプラス<br>
                                　　　　コンディショニングミルク、ホワイティーセラム<br>
                                　　　　レスキューム<br>
                                【備品】カラー、スパチュラ大・中・小・ノーズ<br>
                            </p>
                            <div class="limitedPrice">
                                <div class="limitedPrice__text">
                                    <h3 class="price">53,930円</h3>
                                    <h3 class="text">限定価格</h3>
                                </div>
                                <div class="limitedPrice__price">
                                    <h2>49,890円</h2>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="initialDeployment__table1--C">
                <div class="C-caution">
                    <p class="caution">※いずれも税込み表示価格</p>
                </div>
                <table>
                    <tr class="head">
                        <th class="head1"><span>C.</span>WAXパック</th>
                    </tr>
                    <tr class="data">
                        <td class="data1">
                            <p>
                                【WAX】Copal or Umber<br>
                                【ローション類】パールエッセンス、ホワイティーセラム<br>
                                【備品】スパチュラ大<br>
                            </p>
                            <div class="limitedPrice">
                                <div class="limitedPrice__text">
                                    <h3 class="price">20,840円</h3>
                                    <h3 class="text">限定価格</h3>
                                </div>
                                <div class="limitedPrice__price">
                                    <h2>19,990円</h2>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="C-caution2">
                    <p class="caution">※いずれも税込み表示価格</p>
                </div>
            </div>
        </div>
    </div>
    <div class="staffTec">
        <div class="title-wrapper slide-bottom show2">
            <div class="leftShape">
                <img src="./kosyu_image/shape-left.png" alt="">
            </div>
            <div class="title-wrapper__text">
                <h2 class="titleText">サロンスタッフ技術講習</h2>
            </div>
            <div class="rightShape">
                <img src="./kosyu_image/shape-right.png" alt="">
            </div>
        </div>
        <div class="staffTec__table1 slide-bottom show2">
            <div class="staffTec__table1--caution">
                <p class="caution">※税込み表示価格</p>
            </div>
            <table>
                <tr class="head">
                    <th class="head1">日数・時間</th>
                    <th class="head2">詳細</th>
                    <th class="head3">料金</th>
                </tr>
                <tr class="data">
                    <td class="data1">⑤サロンスタッフ講習<br>1日/5時間(4名まで)</td>
                    <td class="data2">
                        <p class="text1">
                            導入サロンさんの店舗へ講師が出張し<br>スタッフさんに直接技術指導
                        </p>
                        <p class="text2">
                            導入サロンさんの店舗へ講師が出張しスタッフさんに直接技術指導
                        </p>
                    </td>
                    <td class="data3">各 ¥55,000</td>
                </tr>
            </table>
        </div>
        <div class="pattern slide-bottom show2">
            <h3>導入サロンスタッフへ艶人専属講師による技術、商品販売などの直接指導</h3>
        </div>
        <div class="pattern pattern-sp slide-bottom show2">
            <h3>
                導入サロンスタッフへ艶人専属講師による<br>
                技術、商品販売などの直接指導
            </h3>
        </div>
        <div class="staffTec__table2 slide-bottom show2">
            <div class="staffTec__table2--caution">
                <p class="caution">※税込み表示価格</p>
            </div>
            <div class="staffTec__table2--text1">
                <table>
                    <tr class="head">
                        <th class="head1">コース内容</th>
                        <th class="head2">受講料</th>
                        <th class="head3">特典</th>
                    </tr>
                    <tr class="data">
                        <td class="data1">
                            <ul>
                                <li>・艶人商品説明</li>
                                <li>・商品販売へのアドバイス</li>
                                <li>・技術内容は応相談(受講部位のみ)</li>
                            </ul>
                        </td>
                        <td class="data2">スタッフ4名まで受講可<br>¥55,000(5時間)</td>
                        <td class="data3">
                            <div class="privilege">
                                <img class="text1" src="./kosyu_image/privilege-tax.png" alt="テキストとディプロマは有料、教材費は¥16,500もしくは購入商材使用">
                                <img class="text2" src="./kosyu_image/privilege-tax-big.png" alt="テキストとディプロマは有料、教材費は¥16,500もしくは購入商材使用">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="staffTec__table2--text2">
                <table class="tableA">
                    <tr class="head">
                        <th class="head1">コース内容</th>
                        <th class="head2">受講料</th>
                    </tr>
                    <tr class="data">
                        <td class="data1">
                            <ul>
                                <li>・艶人商品説明</li>
                                <li>・商品販売へのアドバイス</li>
                                <li>・技術内容は応相談(受講部位のみ)</li>
                            </ul>
                        </td>
                        <td class="data2">スタッフ4名まで受講可<br>¥55,000(5時間)</td>
                    </tr>
                </table>
                <table class="tableB">
                    <tr class="head">
                        <th class="head1">特典</th>
                    </tr>
                    <tr class="data">
                        <td class="data1">
                            <div class="privilege">
                                <img src="./kosyu_image/privilege-tax-big.png" alt="テキストとディプロマは有料、教材費は¥16,500もしくは購入商材使用">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="main-wrapper2">
    <div class="main-wrapper2__headline slide-bottom show2">
        <h2 class="headline">お申し込み〜受講までの流れ</h2>
    </div>
    <div class="ApplicationFlowBox slide-right show2">
        <div class="ApplicationFlowBox__titleBox">
            <div class="ApplicationFlowBox__titleBox--number">
                <h2>1</h2>
            </div>
            <div class="ApplicationFlowBox__titleBox--text">
                <h2>受講のお申込み</h2>
            </div>
        </div>
        <div class="ApplicationFlowBox__text ApplicationFlowBox__text-first">
            <p class="text">
                お問い合わせフォームもしくはお電話でお申し込みください。<br>
                受講申込書を送らせていただきます。
            </p>
            <div class="TelEmail">
                <img src="./kosyu_image/TelEmal.png" alt="TEL:050-3503-7195　E-mail:info@tsuyari.luire.salon">
            </div>
        </div>
        <div class="triangle"></div>
    </div>
    <div class="ApplicationFlowBox slide-right show2">
        <div class="ApplicationFlowBox__titleBox">
            <div class="ApplicationFlowBox__titleBox--number">
                <h2>2</h2>
            </div>
            <div class="ApplicationFlowBox__titleBox--text">
                <h2>申し込み完了</h2>
            </div>
        </div>
        <div class="ApplicationFlowBox__text ApplicationFlowBox__text-2nd">
            <p class="text">
                受講申込書をご記入いただき、<br>
                事務局にメールもしくはFAXで送り付けください。
            </p>
        </div>
        <div class="triangle"></div>
    </div>
    <div class="ApplicationFlowBox slide-right show2">
        <div class="ApplicationFlowBox__titleBox">
            <div class="ApplicationFlowBox__titleBox--number">
                <h2>3</h2>
            </div>
            <div class="ApplicationFlowBox__titleBox--text">
                <h2>受講日の調整のご連絡</h2>
            </div>
        </div>
        <div class="ApplicationFlowBox__text ApplicationFlowBox__text-3rd">
            <p class="text">
                艶人各種講習をお申し込み後に、担当講師よりご連絡致します。受講者様のご都合に合わせて受講日を決定させていただきます。
            </p>
        </div>
        <div class="triangle"></div>
    </div>
    <div class="ApplicationFlowBox slide-right show2">
        <div class="ApplicationFlowBox__titleBox">
            <div class="ApplicationFlowBox__titleBox--number">
                <h2>4</h2>
            </div>
            <div class="ApplicationFlowBox__titleBox--text">
                <h2>受講料お振込み</h2>
            </div>
        </div>
        <div class="ApplicationFlowBox__text ApplicationFlowBox__text-4th">
            <p class="text">
                事務局に受講料をお振り込みください。
            </p>
        </div>
        <div class="triangle"></div>
    </div>
    <div class="ApplicationFlowBox slide-right show2">
        <div class="ApplicationFlowBox__titleBox">
            <div class="ApplicationFlowBox__titleBox--number">
                <h2>5</h2>
            </div>
            <div class="ApplicationFlowBox__titleBox--text">
                <h2>講習開催</h2>
            </div>
        </div>
        <div class="ApplicationFlowBox__text ApplicationFlowBox__text-5th">
            <p class="text">
                お申し込みの講習を受講していただきます。
            </p>
        </div>
        <div class="triangle"></div>
    </div>
    <div class="ApplicationFlowBox slide-right show2">
        <div class="ApplicationFlowBox__titleBox ApplicationFlowBox__titleBox-last">
            <div class="ApplicationFlowBox__titleBox--number ApplicationFlowBox__titleBox-last--number-red">
                <h2>6</h2>
            </div>
            <div class="ApplicationFlowBox__titleBox--text ApplicationFlowBox__titleBox-last--text">
                <h2>修了証の授与</h2>
            </div>
        </div>
        <div class="ApplicationFlowBox__text ApplicationFlowBox__text-last">
            <p class="text">
                講習受講後に担当講師より事務局に申請。申請確認後、受講者様へ修了証を送付いたします。
            </p>
        </div>
    </div>
</div>
<div class="footImage">
    <div class="footImage__title">
        <img src="./kosyu_image/footImage/footImage-title.png" alt="脱毛ワックスNo.1ブランドを目指して">
    </div>
    <div class="footImage__merchandises">
        <img src="./kosyu_image/footImage/merchandisesImage.png" alt="商品のイメージ">
    </div>
    <div class="footImage__contactToMail">
        <a class="footImage__contactToMail--btn" href="../contact/form.php">
            <span><img class="mailBox" src="./kosyu_image/footImage/mailBox.png" alt="メール"></span>
            <p>メールでのお問い合わせ</p>
        </a>
    </div>
    <div class="fundColor"></div>
    <div class="footImage__contactToPhone">
        <img src="./kosyu_image/footImage/contactToPhone.png" alt="お電話でのお問い合わせはこちら 050-3503-7195">
    </div>
</div>
<section class="instagram-wrapper">
    <h1>
        <a href="https://www.instagram.com/tsuyari_luire/" target="new" rel="noopener">
            <img src="./Instagram_Glyph_Gradient_RGB.png" alt="Instagram-logo" class="Instagram-logo">
            <svg class="Instagram-font" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" width="840" height="300" viewBox="0 0 840 300" version="1.1">
                <path style="fill:#262626" d="m 64.760239,49.107948 c -16.2103,6.7854 -34.030801,25.955 -39.659101,50.016996 -7.1278,30.487496 22.534301,43.379696 24.967201,39.152496 2.8635,-4.967 -5.3151,-6.6467 -6.9986,-22.465 -2.1758,-20.430692 7.3224,-43.259692 19.2762,-53.276392 2.222,-1.861 2.1163,0.7292 2.1163,5.5203 0,8.5676 -0.4734,85.479502 -0.4734,101.531102 0,21.7198 -0.8971,28.5785 -2.5083,35.3558 -1.6325,6.8681 -4.257,11.5088 -2.2683,13.2964 2.2219,1.9996 11.7086,-2.7567 17.2006,-10.4218 6.5857,-9.1931 8.891,-20.2335 9.3049,-32.2232 0.4999,-14.4532 0.4786,-37.38741 0.4999,-50.46891 0.02,-11.9977 0.2021,-47.129592 -0.2103,-68.249592 -0.1011,-5.1803 -14.4679,-10.6152 -21.2479,-7.7745 M 640.38672,150.75505 c -0.5226,11.2916 -3.0221,20.1175 -6.1242,26.3429 -6.0055,12.052 -18.4671,15.7943 -23.7581,-1.5309 -2.8834,-9.444 -3.0181,-25.2164 -0.9451,-38.39521 2.1102,-13.4255 8.0024,-23.5648 17.7592,-22.6504 9.6235,0.9039 14.128,13.3042 13.0682,36.23311 z m -162.23548,70.0559 c -0.1306,18.7617 -3.0834,35.2118 -9.4155,39.9896 -8.9809,6.7747 -21.0519,1.6929 -18.5524,-11.9977 2.2116,-12.1149 12.6709,-24.4873 27.9933,-39.6044 0,0 0.032,3.4474 -0.025,11.6125 z m -2.4528,-70.1652 c -0.5492,10.2844 -3.2154,20.616 -6.1242,26.4536 -6.0042,12.0519 -18.5564,15.8196 -23.7581,-1.5309 -3.5566,-11.8546 -2.7048,-27.1975 -0.9451,-36.86491 2.2835,-12.543 7.8185,-24.1794 17.7592,-24.1794 9.6648,0 14.4306,10.6033 13.0682,36.12241 z m -93.9833,-0.1573 c -0.5892,10.8922 -2.7141,19.9975 -6.1241,26.6109 -6.1695,11.969 -18.3751,15.7649 -23.7581,-1.5309 -3.8806,-12.4716 -2.5595,-29.47701 -0.9452,-38.66331 2.3956,-13.632 8.3944,-23.2968 17.7593,-22.381 9.6195,0.9398 14.2959,13.3028 13.0681,35.96511 z m 430.70378,12.7226 c -2.3516,0 -3.4247,2.4239 -4.3125,6.504 -3.0794,14.1866 -6.3161,17.3899 -10.49,17.3899 -4.6631,0 -8.853,-7.0246 -9.9301,-21.0866 -0.8465,-11.0572 -0.7105,-31.41391 0.372,-51.66341 0.2212,-4.1605 -0.9265,-8.277 -12.0857,-12.3309 -4.8018,-1.7437 -11.7818,-4.311196 -15.2571,4.0779 -9.8194,23.7007 -13.6614,42.51711 -14.5652,50.16101 -0.047,0.3956 -0.5319,0.4764 -0.6172,-0.4479 -0.5759,-6.1222 -1.8636,-17.24741 -2.0236,-40.62151 -0.031,-4.5605 -0.9971,-8.4424 -6.0308,-11.6205 -3.2661,-2.0622 -13.1842,-5.709496 -16.7555,-1.3704 -3.0941,3.5487 -6.6774,13.0988 -10.4007,24.4193 -3.026,9.2009 -5.1336,15.4251 -5.1336,15.4251 0,0 0.04,-24.8259 0.076,-34.2428 0.016,-3.5526 -2.4209,-4.7364 -3.1554,-4.951 -3.3074,-0.9599 -9.8235,-2.5635 -12.5896,-2.5635 -3.4127,0 -4.2485,1.9076 -4.2485,4.6871 0,0.3639 -0.5386,32.6857 -0.5386,55.28661 0,0.9817 0,2.0528 0.01,3.1906 -1.8876,10.3876 -8.0091,24.4886 -14.6665,24.4886 -6.6654,0 -9.8101,-5.8952 -9.8101,-32.839 0,-15.71831 0.4719,-22.55301 0.7039,-33.92141 0.1346,-6.5481 0.3946,-11.5765 0.3799,-12.7176 -0.049,-3.4993 -6.1001,-5.263 -8.9156,-5.9148 -2.8288,-0.6573 -5.287,-0.9119 -7.2066,-0.8026 -2.7168,0.1533 -4.6391,1.9357 -4.6391,4.3872 0,1.3144 0.015,3.8139 0.015,3.8139 -3.4993,-5.4989 -9.1275,-9.3262 -12.8722,-10.435296 -10.086,-2.995396 -20.6107,-0.3413 -28.5491,10.767296 -6.3095,8.8263 -10.11268,18.823 -11.60978,33.1856 -1.0944,10.50011 -0.7372,21.14791 1.2078,30.15281 -2.3502,10.161 -6.7134,14.3239 -11.4911,14.3239 -6.936,0 -11.9644,-11.3212 -11.3805,-30.9007 0.3852,-12.87821 2.9621,-21.91581 5.7789,-34.99061 1.2011,-5.5736 0.2253,-8.4917 -2.2223,-11.2885 -2.2449,-2.5648 -7.0279,-3.8752 -13.904,-2.2635 -4.8977,1.1491 -11.9003,2.3848 -18.3071,3.334 0,0 0.3866,-1.5424 0.7039,-4.2618 1.6663,-14.261292 -13.8307,-13.104192 -18.7751,-8.549096 -2.9514,2.719496 -4.9604,5.926896 -5.7229,11.693796 -1.2091,9.1516 6.2548,13.4681 6.2548,13.4681 -2.4489,11.2098 -8.4517,25.85361 -14.6492,36.44091 -3.3193,5.6724 -5.8588,9.8757 -9.1369,14.3439 -0.012,-1.6638 -0.021,-3.3274 -0.027,-4.9834 -0.075,-23.56751 0.2386,-42.11591 0.3772,-48.80131 0.1347,-6.548 0.3973,-11.4431 0.3826,-12.5842 -0.037,-2.5595 -1.5317,-3.526 -4.6404,-4.7498 -2.7488,-1.0824 -5.9989,-1.8316 -9.3702,-2.0929 -4.2552,-0.3319 -6.8187,1.925 -6.7521,4.5938 0.013,0.5039 0.013,3.598 0.013,3.598 -3.4994,-5.499 -9.1276,-9.3262 -12.8722,-10.435396 -10.0861,-2.994096 -20.6107,-0.3399 -28.5492,10.767296 -6.3081,8.8263 -10.4393,21.2119 -11.6098,33.0763 -1.0904,11.05771 -0.8891,20.45471 0.5973,28.37051 -1.6037,7.9266 -6.2148,16.2156 -11.4285,16.2156 -6.6654,0 -10.458,-5.8953 -10.458,-32.839 0,-15.71831 0.4719,-22.55301 0.7039,-33.92021 0.1346,-6.548 0.3946,-11.5777 0.3799,-12.7175 -0.049,-3.4993 -6.1002,-5.263 -8.9156,-5.9162 -2.9461,-0.6812 -5.4896,-0.9318 -7.4426,-0.7879 -2.5768,0.192 -4.3885,2.4996 -4.3885,4.2206 l 0,3.9659 c -3.4993,-5.499 -9.1275,-9.3262 -12.8722,-10.435396 -10.086,-2.994096 -20.552,-0.2972 -28.5491,10.767296 -5.215,7.2146 -9.4369,15.2131 -11.6098,32.919 -0.6279,5.11671 -0.9052,9.90811 -0.8692,14.38661 -2.0796,12.7179 -11.2645,27.376 -18.7777,27.376 -4.3965,0 -8.5837,-8.5275 -8.5837,-26.7015 0,-24.20871 1.4984,-58.676706 1.7517,-61.998702 0,0 9.4928,-0.1613 11.3312,-0.1827 4.735,-0.052 9.0236,0.06 15.3303,-0.2626 3.1634,-0.1613 6.2108,-11.5138 2.9461,-12.9188 -1.4797,-0.6359 -11.9377,-1.1931 -16.0835,-1.2811 -3.486,-0.079 -13.1908,-0.7972 -13.1908,-0.7972 0,0 0.8705,-22.8783 1.0731,-25.2951 0.172,-2.0143 -2.4342,-3.0514 -3.9286,-3.6807 -3.6339,-1.537 -6.8853,-2.2729 -10.7392,-3.0674 -5.3244,-1.0984 -7.7399,-0.024 -8.2118,4.4698 -0.7105,6.8201 -1.0785,26.7962 -1.0785,26.7962 -3.9072,0 -17.254,-0.7638 -21.1625,-0.7638 -3.6313,0 -7.5506,15.617 -2.5302,15.8089 5.7762,0.224 15.8423,0.4173 22.5156,0.6186 0,0 -0.2972,35.035892 -0.2972,45.852492 0,1.1508 0.01,2.259 0.012,3.3343 -3.6727,19.14301 -16.6088,29.48361 -16.6088,29.48361 2.7781,-12.6642 -2.8968,-22.1744 -13.1188,-30.22481 -3.766,-2.9666 -11.2006,-8.5828 -19.519,-14.7372 0,0 4.8178,-4.7484 9.0903,-14.3012 3.0274,-6.7667 3.1581,-14.5106 -4.2725,-16.218196 -12.2777,-2.823496 -22.401,6.193396 -25.4205,15.819596 -2.3395,7.4572 -1.0917,12.9908 3.4914,18.739 0.3346,0.42 0.6972,0.8492 1.0718,1.2811 -2.7715,5.3419 -6.5788,12.5339 -9.8035,18.11121 -8.9503,15.485 -15.7116,27.7333 -20.8213,27.7333 -4.0846,0 -4.0299,-12.4352 -4.0299,-24.078 0,-10.03711 0.7412,-25.12721 1.3331,-40.75081 0.1959,-5.167 -2.3876,-8.1105 -6.7187,-10.7766 -2.6315,-1.6197 -8.2478,-4.8044 -11.5005,-4.8044 -4.8686,0 -18.915,0.6625 -32.1871,39.0538 -1.6726,4.8389 -4.9585,13.65601 -4.9585,13.65601 l 0.2828,-46.16711 c 0,-1.0824 -0.5765,-2.1289 -1.8965,-2.8448 -2.2365,-1.2144 -8.2099,-3.6979 -13.5214,-3.6979 -2.5307,0 -3.7936,1.1771 -3.7936,3.5233 l -0.4633,72.22881 c 0,5.488 0.1431,11.8903 0.6857,14.6905 0.5406,2.8037 1.4164,5.0845 2.5011,6.4415 1.0831,1.3544 2.336,2.3876 4.4017,2.814 1.9226,0.3958 12.4503,1.7477 12.9975,-2.2755 0.6556,-4.8215 0.6807,-10.0366 6.2088,-29.4864 8.6061,-30.28081 19.8269,-45.05531 25.1018,-50.30231 0.9223,-0.9171 1.9754,-0.9718 1.9247,0.5292 -0.2252,6.6388 -1.0171,23.2276 -1.5502,37.32091 -1.4289,37.7154 5.4322,44.706 15.2371,44.706 7.5012,0 18.0752,-7.4533 29.4103,-26.3202 7.0667,-11.7576 13.928,-23.2862 18.8577,-31.59531 3.4354,3.1802 7.2906,6.60301 11.1432,10.25951 8.9529,8.4973 11.8924,16.5715 9.9421,24.2313 -1.4917,5.8557 -7.1093,11.8904 -17.1074,6.0249 -2.9141,-1.7112 -4.1579,-3.0333 -7.088,-4.9625 -1.5743,-1.0364 -3.9779,-1.3462 -5.4189,-0.2605 -3.7433,2.8224 -5.8842,6.4123 -7.1066,10.8568 -1.1891,4.3247 3.142,6.6108 7.6318,8.6104 3.8659,1.721 12.175,3.2805 17.474,3.4581 20.6467,0.6905 37.1862,-9.9689 48.6999,-37.4648 2.061,23.7461 10.8326,37.1835 26.0724,37.1835 10.1887,0 20.404,-13.1698 24.8712,-26.1256 1.2824,5.2812 3.1807,9.8737 5.6322,13.7573 11.7431,18.6058 34.524,14.6012 45.9672,-1.1981 3.538,-4.8819 4.0765,-6.6362 4.0765,-6.6362 1.669,14.9184 13.6827,20.1308 20.5614,20.1308 7.7039,0 15.6583,-3.642 21.2332,-16.1929 0.6533,1.3621 1.3664,2.6629 2.145,3.896 11.743,18.6058 34.524,14.6012 45.9671,-1.1981 0.5399,-0.7411 1.0078,-1.4134 1.4171,-2.0168 l 0.3359,9.7991 c 0,0 -6.5281,5.9885 -10.5353,9.6622 -17.6366,16.1809 -31.0473,28.4572 -32.0338,42.7531 -1.2664,18.2285 13.5174,25.0032 24.7019,25.891 11.8777,0.9426 22.0491,-5.6187 28.3012,-14.8012 5.4989,-8.0823 9.0983,-25.4777 8.8343,-42.6584 -0.1053,-6.8799 -0.2786,-15.6277 -0.4146,-25.0045 6.1988,-7.1986 13.1828,-16.2969 19.6136,-26.9468 7.008,-11.6061 14.5185,-27.19211 18.3644,-39.32181 0,0 6.5255,0.056 13.4894,-0.3999 2.2276,-0.1453 2.8675,0.3092 2.4556,1.9423 -0.4973,1.9729 -8.7983,33.99081 -1.2225,55.32001 5.1857,14.6012 16.8755,19.2989 23.8061,19.2989 8.1131,0 15.8743,-6.1269 20.03348,-15.225 0.5012,1.0143 1.0251,1.9958 1.597,2.9019 11.7431,18.6058 34.4441,14.5772 45.9672,-1.1981 2.6008,-3.5592 4.0765,-6.6362 4.0765,-6.6362 2.4729,15.4397 14.4799,20.2094 21.3572,20.2094 7.164,0 13.9627,-2.9369 19.479,-15.9889 0.2306,5.7468 0.5932,10.4459 1.1664,11.9274 0.3493,0.906 2.3849,2.0434 3.8659,2.5927 6.5534,2.4302 13.2375,1.281 15.7103,0.7811 1.713,-0.3467 3.0488,-1.721 3.2314,-5.2698 0.4799,-9.3181 0.1853,-24.9739 3.0101,-36.609 4.7418,-19.52691 9.1649,-27.10141 11.2632,-30.85131 1.1744,-2.101 2.4995,-2.4476 2.5475,-0.224 0.099,4.4991 0.3226,17.7113 2.1596,35.46251 1.349,13.0554 3.1514,20.772 4.5364,23.2142 3.9526,6.984 8.8343,7.3147 12.8096,7.3147 2.5288,0 7.8171,-0.6988 7.3439,-5.1432 -0.2306,-2.1663 0.1733,-15.5544 4.8484,-34.792 3.0527,-12.56281 8.1424,-23.91411 9.9781,-28.06391 0.6772,-1.5304 0.9918,-0.324 0.9811,-0.089 -0.3866,8.6517 -1.2544,36.95031 2.2702,52.42731 4.7778,20.9666 18.5991,23.3128 23.4155,23.3128 10.282,0 18.6911,-7.8214 21.5239,-28.4012 0.6825,-4.9526 -0.328,-8.7768 -3.3554,-8.7768"></path>
            </svg>
        </a>
    </h1>
    <div class="posting-wrapper">
        <div class="posting">
            <a href="" id="post-link1" target="new" rel="noopener">
                <div class="posting1" id="posting1">
                    <div class="like-count-wrapper">
                        <div class="heart-icon">
                            <span class="heart-solid icon"></span>
                        </div>
                        <p class="like-count" id="like-count1"></p>
                    </div>
                    <div class="caption">
                        <p class="posting-text" id="posting1-text"></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="posting">
            <a href="" id="post-link2" target="new" rel="noopener">
                <div class="posting2" id="posting2">
                    <div class="like-count-wrapper">
                        <div class="heart-icon">
                            <span class="heart-solid icon"></span>
                        </div>
                        <p class="like-count" id="like-count2"></p>
                    </div>
                    <div class="caption">
                        <p class="posting-text" id="posting2-text"></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="posting">
            <a href="" id="post-link3" target="new" rel="noopener">
                <div class="posting3" id="posting3">
                    <div class="like-count-wrapper">
                        <div class="heart-icon">
                            <span class="heart-solid icon"></span>
                        </div>
                        <p class="like-count" id="like-count3"></p>
                    </div>
                    <div class="caption">
                        <p class="posting-text" id="posting3-text"></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="posting">
            <a href="" id="post-link4" target="new" rel="noopener">
                <div class="posting4" id="posting4">
                    <div class="like-count-wrapper">
                        <div class="heart-icon">
                            <span class="heart-solid icon"></span>
                        </div>
                        <p class="like-count" id="like-count4"></p>
                    </div>
                    <div class="caption">
                        <p class="posting-text" id="posting4-text"></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="posting">
            <a href="" id="post-link5" target="new" rel="noopener">
                <div class="posting5" id="posting5">
                    <div class="like-count-wrapper">
                        <div class="heart-icon">
                            <span class="heart-solid icon"></span>
                        </div>
                        <p class="like-count" id="like-count5"></p>
                    </div>
                    <div class="caption">
                        <p class="posting-text" id="posting5-text"></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="posting">
            <a href="" id="post-link6" target="new" rel="noopener">
                <div class="posting6" id="posting6">
                    <div class="like-count-wrapper">
                        <div class="heart-icon">
                            <span class="heart-solid icon"></span>
                        </div>
                        <p class="like-count" id="like-count6"></p>
                    </div>
                    <div class="caption">
                        <p class="posting-text" id="posting6-text"></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="posting">
            <a href="" id="post-link7" target="new" rel="noopener">
                <div class="posting7" id="posting7">
                    <div class="like-count-wrapper">
                        <div class="heart-icon">
                            <span class="heart-solid icon"></span>
                        </div>
                        <p class="like-count" id="like-count7"></p>
                    </div>
                    <div class="caption">
                        <p class="posting-text" id="posting7-text"></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="posting">
            <a href="" id="post-link8" target="new" rel="noopener">
                <div class="posting8" id="posting8">
                    <div class="like-count-wrapper">
                        <div class="heart-icon">
                            <span class="heart-solid icon"></span>
                        </div>
                        <p class="like-count" id="like-count8"></p>
                    </div>
                    <div class="caption">
                        <p class="posting-text" id="posting8-text"></p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
</main>
<footer>
<div class="footer-wrapper1">
    <div class="footer-wrapper1__nav">
        <ul class="list-header-nav">
            <li><a href="../index.html">HOME</a></li>
            <li><a href="./index.html">導入講習</a></li>
            <li><a href="../contact/form.php" class="last">お問い合わせ</a></li>
        </ul>
    </div>
</div>
<div class="footer-wrapper2">
    <div class="pageTop">
        <a href="#top"><img src="./kosyu_image/pageTop.png" alt=""></a>
        <div class="pageTop__text">
            <p>PAGE TOP</p>
        </div>
    </div>
    <div class="footer-wrapper2__logo">
        <h1 class="logo">
            <a href="../index.html"><img src="../logo-foot.png" alt="Total Esthetic SALON LUIRE" id="logoImage"></a>
        </h1>
    </div>
    <div class="footer-wrapper2__address">
        <p>美肌・脱毛サロン メディカルエステLecura</p>
        <p>〒323-0034 栃木県小山市西城南3-15-5 清風館店舗105</p>
        <p>050-3503-7195</p>
    </div>
    <div class="footer-wrapper2__copyright">
        <p>Copyright © SalonLuire All Right Reserved.</p>
    </div>
</div>
<nav class="hamburgermenu">
    <ul class="nav">
        <li class="menuText"><h2>-MENU-</h2></li>
        <li><a href="../index.html">HOME</a></li>
        <li><a href="./index.html">導入講習</a></li>
        <li><a href="../contact/form.php" class="last">お問い合わせ</a></li>
    </ul>
</nav>
</footer>
<!--jQuery(3.5.1)の読み込み-->
<script src="../jQuery/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../jQuery/kosyu_fadeIn.js"></script>
<script type="text/javascript" src="./jQuery/ajax_jquery.js"></script>
<script>
    /*アンカーリンクのアニメーション*/
    $(function () {
            $('a[href^="#"]').click(function () {
                var time = 500;
                var href = $(this).attr("href");
                var target = $(href == "#" || href == "" ? 'html' : href);
                var position = target.offset().top;
                $("html,body").animate({ scrollTop: position }, time, "swing");
                return false;
            });
        });
</script>
</body>
</html>