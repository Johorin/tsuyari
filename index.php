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
    <link rel="stylesheet" href="./css/home_pc.css" media="screen and (min-width:1340px)">
    <!--タブレット-->
    <link rel="stylesheet" href="./css/home_tablet.css" media="screen and (min-width:900px) and (max-width:1339px)">
    <!--(タブレット〜)スマホ-->
    <link rel="stylesheet" href="./css/home_sp.css" media="screen and (min-width:320px) and (max-width:899px)">
    <link rel="icon" sizes="32x32" href="./logo-icon/logo-icon-32×32.ico">
    <link rel="apple-touch-icon" type="image/png" sizes="152x152" href="./logo-icon/logo-icon-152×152.png">
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
                <a href="./index.php"><img src="../logo.png" alt="Total Esthetic SALON LUIRE" id="logoImage"></a>
            </h1>
        </div>
    </div>
    <div class="header-wrapper__nav">
        <ul class="list-header-nav">
            <li><a href="./index.php">HOME</a></li>
            <li><a href="./kosyu/index.php">導入講習</a></li>
            <li><a href="./contact/form.php">お問い合わせ</a></li>
        </ul>
    </div>
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
<!--ここからkosyu.htmlとの相違-->
<div class="topImages" id="top" name="top">
    <div class="topImage1 simple-fadeIn show1">
        <img class="pc" src="./home_image/topImage/topImage1.png" alt="スキンケアワックス脱毛商材">
        <img class="sp" src="./home_image/topImage/topImage1-sp.png" alt="スキンケアワックス脱毛商材">
    </div>
    <div class="topImage2 simple-fadeIn show1">
        <img class="pc" src="./home_image/topImage/topImage2.png" alt="ロイヤルコスメワックス誕生">
        <img class="sp" src="./home_image/topImage/topImage2-sp.png" alt="ロイヤルコスメワックス誕生">
    </div>
    <div class="topImage3 simple-fadeIn show1">
        <img class="pc" src="./home_image/topImage/topImage3.png" alt="国産100%の天然素材だから安心">
        <img class="sp" src="./home_image/topImage/topImage3-sp.png" alt="国産100%の天然素材だから安心">
    </div>
    <div class="topImage4 simple-fadeIn show1">
        <img class="pc" src="./home_image/topImage/topImage4.png" alt="素材へのこだわりが弾むような美しさへ導く">
        <img class="sp" src="./home_image/topImage/topImage4-sp.png" alt="素材へのこだわりが弾むような美しさへ導く">
    </div>
</div>
<div class="inner-wrapper">
    <div class="merchandisesList">
        <div class="merchandisesList__logo">
            <img src="./home_image/logo.png" alt="TSUYARI BRAND Made in Japan">
        </div>
        <div class="merchandisesList__titleText">
            <h2 class="titleText">艶人ブランド 商品一覧</h2>
            <div class="merchandisesList__titleText--underShape">
                <img src="./home_image/shape_under.png" alt="">
            </div>
        </div>
        <!--Copal紹介-->
        <div class="merchandisesList__merchandise slide-bottom show2">
            <!--商品イメージ画像-->
            <div class="merchandisesList__merchandise--image-Copal">
                <img class="Copal" src="./home_image/merchandises/Copal.png" alt="Copalの商品画像">
            </div>
            <!--商品詳細-->
            <div class="merchandisesList__merchandise--details">
                <!--商品名-->
                <div class="name-Copal">
                    <img class="Copal" src="./home_image/merchandises/Copal-text.png" alt="Copal-コーパル-">
                </div>
                <!--商品の種類名-->
                <div class="kindName kindName-Copal">
                    <h2>ロイヤルコスメワックス</h2>
                </div>
                <!--テキストボックス-->
                <div class="textBox-Copal-wrapper">
                    <div class="textBox-Copal">
                        <!--商品説明-->
                        <div class="textBox-Copal__description">
                            <p>国産素材100%にこだわり、着色料・香料無添加で天然成分配合の脱毛ワックス。やさしい素材を厳選して使用しているから、肌質を選ばず、敏感肌の方にも安心してお使いいただけます。脱毛材としてだけでなく、ホットパックとしても使用できる2WAYタイプなので、サービスの価値を更に引き上げていきます。</p>
                        </div>
                        <!--使用タイプ-->
                        <div class="textBox-Copal__usageType">
                            <div class="textBox-Copal__usageType--box">
                                <p>使用タイプ</p>
                            </div>
                            <p class="main-text">長くて太い毛、細い毛は勿論、産毛にも適しております。</p>
                        </div>
                        <!--商品の特徴-->
                        <div class="textBox-Copal__features">
                            <div class="textBox-Copal__features--box">
                                <p>特徴</p>
                            </div>
                            <ul class="main-text">
                                <li>・フェイシャル、デリケートな場所に適している</li>
                                <li>・肌に優しく負担がかかりにくい</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Umber紹介-->
        <div class="merchandisesList__merchandise slide-bottom show2">
            <!--商品イメージ画像-->
            <div class="merchandisesList__merchandise--image-Umber">
                <img class="Umber" src="./home_image/merchandises/Umber.png" alt="Umberの商品画像">
            </div>
            <!--商品詳細-->
            <div class="merchandisesList__merchandise--details">
                <!--商品名-->
                <div class="name-Umber">
                    <img class="Umber" src="./home_image/merchandises/Umber-text.png" alt="Umber-アンバー-">
                </div>
                <!--商品の種類名-->
                <div class="kindName kindName-Umber">
                    <h2>ロイヤルコスメワックス</h2>
                </div>
                <!--テキストボックス-->
                <div class="textBox-Umber-wrapper">
                    <div class="textBox-Umber">
                        <!--商品説明-->
                        <div class="textBox-Umber__description">
                            <p>
                                保湿成分も配合した、純国産素材の無添加脱毛ワックスです。<br>
                                お肌に優しい素材にこだわり、天然植物由来の成分を配合しているので、お肌の弱い方にもおすすめできます。脱毛材としてだけでなくホットパックとしても使用できるので、提供するサービスの質を上げていくことができます。
                            </p>
                        </div>
                        <!--使用タイプ-->
                        <div class="textBox-Umber__usageType">
                            <div class="textBox-Umber__usageType--box">
                                <p>使用タイプ</p>
                            </div>
                            <p class="main-text">長くて太い毛、硬い毛、短い毛に適しております。</p>
                        </div>
                        <!--商品の特徴-->
                        <div class="textBox-Umber__features">
                            <div class="textBox-Umber__features--box">
                                <p>特徴</p>
                            </div>
                            <ul class="main-text">
                                <li>・弾力性があり、WAXが割れにくい</li>
                                <li>・抜け感が強い分、保湿成分配合</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Skin Cleaner紹介-->
        <div class="merchandisesList__merchandise slide-bottom show2">
            <!--商品イメージ画像-->
            <div class="merchandisesList__merchandise--image-SkinCleaner">
                <img class="SkinCleaner" src="./home_image/merchandises/SkinCleaner.png" alt="SkinCleanerの商品画像">
            </div>
            <!--商品詳細-->
            <div class="merchandisesList__merchandise--details">
                <!--商品名-->
                <div class="name-SkinCleaner">
                    <img class="SkinCleaner" src="./home_image/merchandises/SkinCleaner-text.png" alt="Skin Cleaner">
                </div>
                <!--商品の種類名-->
                <div class="kindName kindName-SkinCleaner">
                    <h2>スキンクリーナー</h2>
                </div>
                <!--テキストボックス-->
                <div class="textBox-SkinCleaner-wrapper">
                    <div class="textBox-SkinCleaner">
                        <!--商品説明-->
                        <div class="textBox-SkinCleaner__description">
                            <p>
                                保湿効果が高く、殺菌しながらお肌に潤いを与えます。<br>
                                アルコールフリーなので、アルコールかぶれを起こす心配がなく、脱毛前に安心して使用できます。脱毛施術前だけでなく施術後にも使用することもできる安心素材を配合しています。
                            </p>
                        </div>
                        <!--用途-->
                        <div class="textBox-SkinCleaner__usefulness">
                            <div class="textBox-SkinCleaner__usefulness--box">
                                <p>用途</p>
                            </div>
                            <p class="main-text">プレケア／アルコールフリー消毒液</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Swelling Plus紹介-->
        <div class="merchandisesList__merchandise slide-bottom show2">
            <!--商品イメージ画像-->
            <div class="merchandisesList__merchandise--image-SwellingPlus">
                <img class="SwellingPlus" src="./home_image/merchandises/SwellingPlus.png" alt="Swelling Plusの商品画像">
            </div>
            <!--商品詳細-->
            <div class="merchandisesList__merchandise--details">
                <!--商品名-->
                <div class="name-SwellingPlus">
                    <img class="SwellingPlus" src="./home_image/merchandises/SwellingPlus-text.png" alt="Swelling Plus">
                </div>
                <!--商品の種類名-->
                <div class="kindName kindName-SwellingPlus">
                    <h2>スウェリングプラス</h2>
                </div>
                <!--テキストボックス-->
                <div class="textBox-SwellingPlus-wrapper">
                    <div class="textBox-SwellingPlus">
                        <!--商品説明-->
                        <div class="textBox-SwellingPlus__description">
                            <p>
                                角質柔軟効果に優れ、 アルカリ性の効果で毛穴を開かせるので、ワックス脱毛施術前に使用すると毛が切れにくく、スムーズ に脱毛が行えます。<br>
                                皮膚への刺激や痛みを緩和し、さまざまな痒みや痛みなどの鎮静効果が期待できます。
                            </p>
                        </div>
                        <!--用途-->
                        <div class="textBox-SwellingPlus__usefulness">
                            <div class="textBox-SwellingPlus__usefulness--box">
                                <p>用途</p>
                            </div>
                            <p class="main-text">プレケア／ローション</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Conditioning milk紹介-->
        <div class="merchandisesList__merchandise slide-bottom show2">
            <!--商品イメージ画像-->
            <div class="merchandisesList__merchandise--image-ConditioningMilk">
                <img class="ConditioningMilk" src="./home_image/merchandises/ConditioningMilk.png" alt="Conditioning milkの商品画像">
            </div>
            <!--商品詳細-->
            <div class="merchandisesList__merchandise--details">
                <!--商品名-->
                <div class="name-ConditioningMilk">
                    <img class="ConditioningMilk" src="./home_image/merchandises/ConditioningMilk-text.png" alt="Conditioning milk">
                </div>
                <!--商品の種類名-->
                <div class="kindName kindName-ConditioningMilk">
                    <h2>コンディショニングミルク</h2>
                </div>
                <!--テキストボックス-->
                <div class="textBox-ConditioningMilk-wrapper">
                    <div class="textBox-ConditioningMilk">
                        <!--商品説明-->
                        <div class="textBox-ConditioningMilk__description">
                            <p>
                                鈍痛、保湿、抗菌のアフターケア乳液。（顔、全身）<br>
                                赤みや炎症などの症状緩和して、脱毛後のお肌を健やかに保つことができます。ベタ付きが少なく、サラッとした使い心地で、全身にご使用頂けます。
                            </p>
                        </div>
                        <!--用途-->
                        <div class="textBox-ConditioningMilk__usefulness">
                            <div class="textBox-ConditioningMilk__usefulness--box">
                                <p>用途</p>
                            </div>
                            <p class="main-text">アフターケア／乳液</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Rescuem紹介-->
        <div class="merchandisesList__merchandise slide-bottom show2">
            <!--商品イメージ画像-->
            <div class="merchandisesList__merchandise--image-Rescuem">
                <img class="Rescuem" src="./home_image/merchandises/Rescuem.png" alt="Rescuemの商品画像">
            </div>
            <!--商品詳細-->
            <div class="merchandisesList__merchandise--details">
                <!--商品名-->
                <div class="name-Rescuem">
                    <img class="Rescuem" src="./home_image/merchandises/Rescuem-text.png" alt="Rescuem">
                </div>
                <!--商品の種類名-->
                <div class="kindName kindName-Rescume">
                    <h2>レスキューム</h2>
                </div>
                <!--テキストボックス-->
                <div class="textBox-Rescuem-wrapper">
                    <div class="textBox-Rescuem">
                        <!--商品説明-->
                        <div class="textBox-Rescuem__description">
                            <p>
                                合成香料・着色料・パラベン無添加で、お肌の炎症を抑える働きが期待できるクリームです。<br>
                                アレルギーやアトピーによる強烈な痒みを抑制し、改善に導きます。<br>
                                日常の基礎化粧品として使用することで、健康な肌の維持にもつながり、肌ストレスの予防にもつながります。
                            </p>
                        </div>
                        <!--用途-->
                        <div class="textBox-Rescuem__usefulness">
                            <div class="textBox-Rescuem__usefulness--box">
                                <p>用途</p>
                            </div>
                            <p class="main-text">アフターケア／クリーム</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Whity serum紹介-->
        <div class="merchandisesList__merchandise slide-bottom show2">
            <!--商品イメージ画像-->
            <div class="merchandisesList__merchandise--image-WhitySerum">
                <img class="WhitySerum" src="./home_image/merchandises/WhitySerum.png" alt="WhitySerumの商品画像">
            </div>
            <!--商品詳細-->
            <div class="merchandisesList__merchandise--details">
                <!--商品名-->
                <div class="name-WhitySerum">
                    <img class="WhitySerum" src="./home_image/merchandises/WhitySerum-text.png" alt="Whity serum">
                </div>
                <!--商品の種類名-->
                <div class="kindName kindName-WhitySerum">
                    <h2>ホワイティセラム</h2>
                </div>
                <!--テキストボックス-->
                <div class="textBox-WhitySerum-wrapper">
                    <div class="textBox-WhitySerum">
                        <!--商品説明-->
                        <div class="textBox-WhitySerum__description">
                            <p>
                                色素沈着改善効果を目的としたデリケートゾーンに使用できる低刺激性クリームワセリン。その中でも医療用のワセリンを更に精製した高級素材を使用しています。<br>
                                デリケートゾーンの色素沈着や黒ずみ、乾燥が気になる方のための専用クリーム。 下着などの摩擦による色素沈着を防ぎ、浅い傷など塗ると改善が期待できます。<br>
                                日焼けによるシミ・ソバカス、皮膚の乾燥防止や皮膚の炎症、肌荒れ防止、ニキビ予防 にも効果がある多機能クリーム。ベタつきを抑えたサッパリとした使用感で、全身ケアにもお使いいただけます。(乳首、ひじ、ひざ、お顔、体全体など)
                            </p>
                        </div>
                        <!--用途-->
                        <div class="textBox-WhitySerum__usefulness">
                            <div class="textBox-WhitySerum__usefulness--box">
                                <p>用途</p>
                            </div>
                            <p class="main-text">アフターケア／クリーム</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pearl essence紹介-->
        <div class="merchandisesList__merchandise slide-bottom show2">
            <!--商品イメージ画像-->
            <div class="merchandisesList__merchandise--image-PearlEssence">
                <img class="PearlEssence" src="./home_image/merchandises/PearlEssence.png" alt="PearlEssenceの商品画像">
            </div>
            <!--商品詳細-->
            <div class="merchandisesList__merchandise--details">
                <!--商品名-->
                <div class="name-PearlEssence">
                    <img class="PearlEssence" src="./home_image/merchandises/PearlEssence-text.png" alt="Pearl essence">
                </div>
                <!--商品の種類名-->
                <div class="kindName kindName-PearlEssence">
                    <h2>パールエッセンス</h2>
                </div>
                <!--テキストボックス-->
                <div class="textBox-PearlEssence-wrapper">
                    <div class="textBox-PearlEssence">
                        <!--商品説明-->
                        <div class="textBox-PearlEssence__description">
                            <p>シミ・シワ・ハリに特化した有効成分を7種類配合した集中ケア商材。ワックスパックの下地美容液として使用することで、お肌の深部まで浸透し、リフトアップ効果で美肌へと導きます。基礎化粧品として継続して使用することで、お肌の美白効果も得られる商材です。</p>
                        </div>
                        <!--用途-->
                        <div class="textBox-PearlEssence__usefulness">
                            <div class="textBox-PearlEssence__usefulness--box">
                                <p>用途</p>
                            </div>
                            <p class="main-text">下地美容液</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Delicate Wash紹介-->
        <div class="merchandisesList__merchandise slide-bottom show2">
            <!--商品イメージ画像-->
            <div class="merchandisesList__merchandise--image-DelicateWash">
                <img class="DelicateWash" src="./home_image/merchandises/DelicateWash.png" alt="DelicateWashの商品画像">
            </div>
            <!--商品詳細-->
            <div class="merchandisesList__merchandise--details">
                <!--商品名-->
                <div class="name-DelicateWash">
                    <img class="DelicateWash" src="./home_image/merchandises/DelicateWash-text.png" alt="Delicate Wash">
                </div>
                <!--商品の種類名-->
                <div class="kindName kindName-DelicateWash">
                    <h2>デリケートウォッシュ</h2>
                </div>
                <!--テキストボックス-->
                <div class="textBox-DelicateWash-wrapper">
                    <div class="textBox-DelicateWash">
                        <!--商品説明-->
                        <div class="textBox-DelicateWash__description">
                            <p>
                                合成香料、着色料無添加、合成界面活性剤不使用の、経皮吸収率が高いデリケートゾーンに安心な配合の商材。デリケートゾーンのかゆみや乾燥、ムレの不快感などの改善が期待できます。<br>
                                オーガニック由来の優しい泡でデリケートゾーンの不快感や臭い、肌荒れのお悩みにも効果が得られる商材です。
                            </p>
                        </div>
                        <!--用途-->
                        <div class="textBox-DelicateWash__usefulness">
                            <div class="textBox-DelicateWash__usefulness--box">
                                <p>用途</p>
                            </div>
                            <p class="main-text">デリケート専用ソープ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="merchandisesList__bottomInquiry">
            <div class="merchandisesList__bottomInquiry--ContactToMail">
                <a class="btn" href="./contact/form.php">
                    <span><img class="mailBox" src="./kosyu/kosyu_image/footImage/mailBox.png" alt="メール"></span>
                    <p>メールでのお問い合わせ</p>
                </a>
            </div>
            <div class="fundColor"></div>
            <div class="merchandisesList__bottomInquiry--ContactToPhone">
                <img src="./kosyu/kosyu_image/footImage/contactToPhone.png" alt="お電話でのお問い合わせはこちら 050-3503-7195">
            </div>
        </div>
    </div>
</div>
<div class="inner-wrapper2">
    <div class="about-donyuKosyu simple-fadeIn show1">
        <h2>安心の導入講習制度</h2>
        <h3>艶人ブランド独自のオリジナルコース</h3>
        <div class="about-donyuKosyu__textBox">
            <p>
                ワックス脱毛初心者の方には、理論と実践を基礎から学べます。<br>
                経験がある方には艶人ブランドの商材や技術を<br>
                学べるコースもご用意しています。
            </p>
        </div>
        <div class="about-donyuKosyu__btn">
            <a href="./kosyu/index.php">導入講習について</a>
        </div>
    </div>
    <div class="tsuyari-hope simple-fadeIn show1">
        <h2>艶人に込められた想い</h2>
        <div class="tsuyari-hope__textBox">
            <p>
                日本の女性がもっとキレイにもっと美しくなるためのサポートをして、豊かで健やかな毎日を送っていただきたい。そんな技術者たちの想いから『艶人』の商品開発はスタートしました。<br>
                女性のお肌はすごくデリケートなものです。刺激の強い成分が配合された脱毛剤では赤くはれたり、かぶれてしまうこともありますし、そういった商材を心からお客様にお勧めすることはできませんでした。<br>
                　<br>
                どんな繊細なお肌の方でも安心して使える、高品質な脱毛ワックスを作れないだろうか？<br>
                1人でも多くの方に喜んでいただけるような、安全で心からお勧めできる脱毛ワックスはないだろうか？<br>
                　<br>
                そんな想いから作られた脱毛ワックスは、使う素材にもとことんこだわり、純国産100%、植物由来の無添加成分を配合した、どなたでも安心して使っていただける商材となりました。<br>
                <br>
                1人でも多くの方に手に取っていただき、その素材の素晴らしさを実感して欲しいと願っています。<br>
                日本の女性たちがより美しくいられるように…
            </p>
        </div>
    </div>
</div>
<!--ここまでkosyu.htmlとの区別-->
<div class="footImage">
    <div class="footImage__title">
        <img src="./kosyu/kosyu_image/footImage/footImage-title.png" alt="脱毛ワックスNo.1ブランドを目指して">
    </div>
    <div class="footImage__merchandises">
        <img src="./kosyu/kosyu_image/footImage/merchandisesImage.png" alt="商品のイメージ">
    </div>
    <div class="footImage__contactToMail">
        <a class="footImage__contactToMail--btn" href="./contact/form.php">
            <span><img class="mailBox" src="./kosyu/kosyu_image/footImage/mailBox.png" alt="メール"></span>
            <p>メールでのお問い合わせ</p>
        </a>
    </div>
    <div class="fundColor"></div>
    <div class="footImage__contactToPhone">
        <img src="./kosyu/kosyu_image/footImage/contactToPhone.png" alt="お電話でのお問い合わせはこちら 050-3503-7195">
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
            <li><a href="./index.php">HOME</a></li>
            <li><a href="./kosyu/index.php">導入講習</a></li>
            <li><a href="./contact/form.php" class="last">お問い合わせ</a></li>
        </ul>
    </div>
</div>
<div class="footer-wrapper2">
    <div class="pageTop">
        <a href="#top"><img src="./kosyu/kosyu_image/pageTop.png" alt=""></a>
        <div class="pageTop__text">
            <p>PAGE TOP</p>
        </div>
    </div>
    <div class="footer-wrapper2__logo">
        <h1 class="logo">
            <a href="./index.php"><img src="./logo-foot.png" alt="Total Esthetic SALON LUIRE" id="logoImage"></a>
        </h1>
    </div>
    <div class="footer-wrapper2__address">
        <p>Salon Luire</p>
        <p>〒323-0034 栃木県小山市神鳥谷5-18-29 2F</p>
        <p>TEL.050-3503-7195</p>
        <p>E-mail　info@luiresalon</p>
    </div>
    <div class="footer-wrapper2__copyright">
        <p>Copyright © SalonLuire All Right Reserved.</p>
    </div>
</div>
<nav class="hamburgermenu">
    <ul class="nav">
        <li class="menuText"><h2>-MENU-</h2></li>
        <li><a href="./index.php">HOME</a></li>
        <li><a href="./kosyu/index.php">導入講習</a></li>
        <li><a href="./contact/form.php" class="last">お問い合わせ</a></li>
    </ul>
</nav>
</footer>
<!--jQuery(3.5.1)の読み込み-->
<script src="./jQuery/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="./jQuery/index_fadeIn.js"></script>
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