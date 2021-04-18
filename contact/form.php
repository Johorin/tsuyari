<?php
//セッション機能を使うときはまず宣言しておく。
session_start();
//空のerror配列を宣言しておく。
$error = [];

$prefectures = [
    "都道府県", "北海道", "青森県", "岩手県", "宮城県", "秋田県", "山形県", "福島県",
    "茨城県", "栃木県", "群馬県", "埼玉県", "千葉県", "東京都", "神奈川県",
    "新潟県", "富山県", "石川県", "福井県", "山梨県", "長野県", "岐阜県",
    "静岡県", "愛知県", "三重県", "滋賀県", "京都府", "大阪府", "兵庫県",
    "奈良県", "和歌山県", "鳥取県", "島根県", "岡山県", "広島県", "山口県",
    "徳島県", "香川県", "愛媛県", "高知県", "福岡県", "佐賀県", "長崎県",
    "熊本県", "大分県", "宮崎県", "鹿児島県", "沖縄県"
];

//postが起こったら（submitボタンが送信されたら）true。
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //安全なデータだということを確認してからpost変数に格納。
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    //送信された必須項目が空欄であれば定義しておいたerror配列の該当キーに'blank'データを格納。
    //nameはお名前。５０文字以上入力されてもエラーに。
    if ($post['name'] === '') {
        $error['name'] = 'blank';
    } elseif (mb_strlen($post['name'] > 50)) {
        $error['name'] = 'long';
    }
    //mail-addressはメールアドレス。入力されたメールアドレスのフォーマットもチェック
    if ($post['mail-address'] === '') {
        $error['mail-address'] = 'blank';
    } elseif (!filter_var($post['mail-address'], FILTER_VALIDATE_EMAIL)) {
        $error['mail-address'] = 'email';
    }
    //contact-contentはお問い合わせ内容
    if ($post['contact-content'] === '') {
        $error['contact-content'] = 'blank';
    }
    //checkBoxはチェックボックス
    if (!isset($post['checkBox']) || !$post['checkBox']) {
        $error['checkBox'] = 'blank';
    }

    //error配列の成分数を数え、0であればerrorなしとみなせる。
    if (count($error) === 0) {
        //セキュリティ向上のためのトークンを生成
        $token = bin2hex(random_bytes(32));   // php7以降
        $_SESSION['token']  = $token;
        // エラーがないので確認画面に移動
        //セッションにpost変数の内容を保存しておく。
        $_SESSION['form'] = $post;
        //このように記述することで指定した画面に画面遷移させる。
        header('Location: confirm.php');
        exit();
    }
} else {    //送信ボタンが押されていない時実行。
    //confirm.phpから戻ってきた時は以下を実行。
    if (isset($_SESSION['form'])) {
        //保存しておいたセッションの内容をpost変数に戻す。
        $post = $_SESSION['form'];
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--PC & タブレット-->
    <link rel="stylesheet" href="./contact_css/contact-step1_pc.css" media="screen and (min-width:900px)">
    <!--(タブレット〜)スマホ-->
    <link rel="stylesheet" href="./contact_css/contact-step1_sp.css" media="screen and (min-width:320px) and (max-width:899px)">
    <link rel="icon" sizes="32x32" href="../logo-icon/logo-icon-32×32.ico">
    <link rel="apple-touch-icon" type="image/png" sizes="152x152" href="../logo-icon/logo-icon-152×152.png">
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
                <a href="../index.php"><img src="../logo.png" alt="Total Esthetic SALON LUIRE" id="logoImage"></a>
            </h1>
        </div>
    </div>
    <div class="header-wrapper__nav">
        <ul class="list-header-nav">
            <li><a href="../index.php">HOME</a></li>
            <li><a href="../kosyu/index.php">導入講習</a></li>
            <li><a href="./form.php">お問い合わせ</a></li>
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
<div class="contact-wrapper">
    <div class="title">
        <h2>お問い合わせフォーム</h2>
    </div>
    <div class="step-wrapper">
        <div class="step1">
            <p>STEP①</p>
            <h3>情報入力</h3>
        </div>
        <div class="step2">
            <p>STEP②</p>
            <h3>入力内容確認</h3>
        </div>
        <div class="step3">
            <p>STEP③</p>
            <h3>送信完了</h3>
        </div>
    </div>
    <div class="textBox">
        <p>商品や導入に関するご質問・ご相談はこちらのお問い合わせフォームにて受け付けております。</p>
        <p>必要事項をご記入のうえ送信してください。対応に数日かかる場合もございますのでご了承ください。</p>
        <p>万が一、お問合せをいただいたにも関わらず、返信がない場合は、大変お手数ですが、ご連絡下さいますようお願いいたします。</p>
        <p>　</p>
        <p>＞お電話の場合　050-3503-7195</p>
    </div>
    <form class="pc" action="" method="post" novalidate><!--novalidateはhtmlで用意されている既存のバリデーションを無効にする-->
        <table>
            <tr class="pattern1">
                <th class="head1">
                    <div class="head-wrapper">
                        <p class="head">お名前</p>
                        <div class="required-box">
                            <p>必須</p>
                        </div>
                    </div>
                </th>
                <td class="data1">
                    <!--valueの中身はconfirm.phpから戻ってきた時（post変数に情報が格納されている時）postからname="name"を受け取り、受け取る文字列が安全かどうかチェックしてからデフォルトで入力済みの内容を入れておく記述をしている。requiredは必須項目であることを示している。-->
                    <input type="text" name="name" class="name" size="43" placeholder="お名前を記入してください。" value="<?php echo htmlspecialchars($post['name']); ?>" required>
                    <!--error配列に'blank'というデータが格納されていればendifまでのhtmlを表示させる。-->
                    <?php if ($error['name'] === 'blank') : ?>
                    <p class="error_msg" id="error_msg">※お名前をご記入下さい</p>
                    <?php endif; ?>
                    <?php if ($error['name'] === 'long') : ?>
                    <p class="error_msg" id="error_msg">※お名前が長すぎます</p>
                    <?php endif; ?>
                </td>
            </tr>
            <tr class="pattern1">
                <th class="head2">
                    <div class="head-wrapper">
                        <p class="head">メールアドレス</p>
                        <div class="required-box">
                            <p>必須</p>
                        </div>
                    </div>
                </th>
                <td class="data2">
                    <input type="text" name="mail-address" size="43" placeholder="例)aaa@example.com" value="<?php echo htmlspecialchars($post['mail-address']); ?>" required>
                    <?php if ($error['mail-address'] === 'blank') : ?>
                    <p class="error_msg" id="error_msg">※メールアドレスをご記入下さい</p>
                    <?php endif; ?>
                    <?php if ($error['mail-address'] === 'email') : ?>
                    <p class="error_msg" id="error_msg">※メールアドレスのフォーマットが正しくありません</p>
                    <?php endif; ?>
                </td>
            </tr>
            <tr class="pattern1">
                <th class="head3">
                    <div class="head-wrapper">
                        <p class="head">電話番号</p>
                        <div class="optional-box">
                            <p>任意</p>
                        </div>
                    </div>
                </th>
                <td class="data3">
                    <input type="text" name="phone-number" size="43" placeholder="例)12345678910" value="<?php echo htmlspecialchars($post['phone-number']) ?>">
                </td>
            </tr>
            <tr class="pattern2">
                <th class="head4">
                    <div class="head-wrapper">
                        <p class="head">郵便番号</p>
                        <div class="optional-box">
                            <p>任意</p>
                        </div>
                    </div>
                    <div class="head-wrapper">
                        <p class="head">都道府県</p>
                        <div class="optional-box">
                            <p>任意</p>
                        </div>
                    </div>
                    <div class="head-wrapper head-wrapper-address">
                        <p class="head">ご住所</p>
                        <div class="optional-box">
                            <p>任意</p>
                        </div>
                    </div>
                </th>
                <td class="data4">
                    <div class="post-number">
                        <div class="post-number__form">
                            <input type="text" class="zip" name="zip" placeholder="例)000000" value="<?php echo htmlspecialchars($post['zip']) ?>">
                        </div>
                        <div class="post-number__button">
                            <input class="searchAddress ajaxzip3" type="button" value="住所検索">
                        </div>
                    </div>
                    <div class="prefecture">
                        <!--<select name="pref_name" class="prefectureSelect pref" name="pref_name pref">
                            <option value="" selected>都道府県</option>
                            <option value="北海道">北海道</option>
                            <option value="青森県">青森県</option>
                            <option value="岩手県">岩手県</option>
                            <option value="宮城県">宮城県</option>
                            <option value="秋田県">秋田県</option>
                            <option value="山形県">山形県</option>
                            <option value="福島県">福島県</option>
                            <option value="茨城県">茨城県</option>
                            <option value="栃木県">栃木県</option>
                            <option value="群馬県">群馬県</option>
                            <option value="埼玉県">埼玉県</option>
                            <option value="千葉県">千葉県</option>
                            <option value="東京都">東京都</option>
                            <option value="神奈川県">神奈川県</option>
                            <option value="新潟県">新潟県</option>
                            <option value="富山県">富山県</option>
                            <option value="石川県">石川県</option>
                            <option value="福井県">福井県</option>
                            <option value="山梨県">山梨県</option>
                            <option value="長野県">長野県</option>
                            <option value="岐阜県">岐阜県</option>
                            <option value="静岡県">静岡県</option>
                            <option value="愛知県">愛知県</option>
                            <option value="三重県">三重県</option>
                            <option value="滋賀県">滋賀県</option>
                            <option value="京都府">京都府</option>
                            <option value="大阪府">大阪府</option>
                            <option value="兵庫県">兵庫県</option>
                            <option value="奈良県">奈良県</option>
                            <option value="和歌山県">和歌山県</option>
                            <option value="鳥取県">鳥取県</option>
                            <option value="島根県">島根県</option>
                            <option value="岡山県">岡山県</option>
                            <option value="広島県">広島県</option>
                            <option value="山口県">山口県</option>
                            <option value="徳島県">徳島県</option>
                            <option value="香川県">香川県</option>
                            <option value="愛媛県">愛媛県</option>
                            <option value="高知県">高知県</option>
                            <option value="福岡県">福岡県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="大分県">大分県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                            <option value="沖縄県">沖縄県</option>
                        </select>-->
                        <select name="pref" class="prefectureSelect pref">
                            <?php foreach ($prefectures as $index => $value) : ?>
                                <?php if ($post['pref'] == $index) : ?>
                                    <option value="<?php echo $index ?>" selected><?php echo $value ?></option>
                                <?php else : ?>
                                    <option value="<?php echo $index ?>"><?php echo $value ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="address-form">
                        <input type="text" name="address" value="<?php echo htmlspecialchars($post['address']) ?>">
                    </div>
                </td>
            </tr>
            <tr class="pattern3">
                <th class="head5">
                    <div class="head-wrapper">
                        <p class="head">お問い合わせ内容</p>
                        <div class="required-box">
                            <p>必須</p>
                        </div>
                    </div>
                </th>
                <td class="data5">
                    <textarea name="contact-content" id="" placeholder="お問い合わせの内容を記入してください。" required><?php echo htmlspecialchars($post['contact-content']) ?></textarea>
                    <?php if ($error['contact-content'] === 'blank') : ?>
                    <p class="error_msg" id="error_msg">※お問い合わせ内容をご記入下さい</p>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        <div class="textBox">
            <p>＞個人情報の取り扱いについて</p>
            <p>下記事項をご確認の上同意していただける場合は[同意する]にチェックを入れてください。</p>
        </div>
        <div class="personalInfomation-form">
            <textarea name="privacy" rows="10" cols="80" readonly="readonly">ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。ここに個人情報保護方針が入ります。</textarea>
        </div>
        <div class="agree-box-form">
            <div class="agree-box-form__wrapper">
                <div class="required-box">
                    <p>必須</p>
                </div>
                <div class="checkBox-wrapper">
                    <input class="checkBox" name="checkBox" type="checkbox" value="同意する" required <?php if ($post['checkBox']) { echo 'checked'; } ?>>
                    <p class="text">個人情報の取り扱いに同意する</p>
                </div>
            </div>
            <?php if ($error['checkBox'] === 'blank') : ?>
            <p class="error_msg" id="error_msg">※個人情報保護方針をお読み頂いた上で同意してください</p>
            <?php endif; ?>
        </div>
        <div class="textBox textBox-center">
            <p>「入力内容の確認画面へ」ボタンをクリックして入力内容のご確認をお願いします。</p>
            <p>ご入力、誠にありがとうございました。</p>
        </div>
        <div class="confirm-button-wrapper">
            <input class="button" type="submit" value="入力内容を確認する">
        </div>
    </form>
    <form class="sp" action="" method="post" novalidate>
        <table>
            <tr class="pattern1">
                <th class="head1">
                    <div class="head-wrapper">
                        <div class="required-box">
                            <p>必須</p>
                        </div>
                        <p class="head">お名前</p>
                    </div>
                    <!--valueの中身はconfirm.phpから戻ってきた時（post変数に情報が格納されている時）postからname="name"を受け取り、受け取る文字列が安全かどうかチェックしてからデフォルトで入力済みの内容を入れておく記述をしている。requiredは必須項目であることを示している。-->
                    <input type="text" name="name" class="name" size="43" placeholder="お名前を記入してください。" value="<?php echo htmlspecialchars($post['name']); ?>" required>
                    <!--error配列に'blank'というデータが格納されていればendifまでのhtmlを表示させる。-->
                    <?php if ($error['name'] === 'blank') : ?>
                    <p class="error_msg" id="error_msg">※お名前をご記入下さい</p>
                    <?php endif; ?>
                    <?php if ($error['name'] === 'long') : ?>
                    <p class="error_msg" id="error_msg">※お名前が長すぎます</p>
                    <?php endif; ?>
                </th>
            </tr>
            <tr class="pattern1">
                <th class="head2">
                    <div class="head-wrapper">
                        <div class="required-box">
                            <p>必須</p>
                        </div>
                        <p class="head">メールアドレス</p>
                    </div>
                    <input type="text" name="mail-address" size="43" placeholder="例)aaa@example.com" value="<?php echo htmlspecialchars($post['mail-address']); ?>" required>
                    <?php if ($error['mail-address'] === 'blank') : ?>
                    <p class="error_msg" id="error_msg">※メールアドレスをご記入下さい</p>
                    <?php endif; ?>
                    <?php if ($error['mail-address'] === 'email') : ?>
                    <p class="error_msg" id="error_msg">※メールアドレスのフォーマットが正しくありません</p>
                    <?php endif; ?>
                </th>
            </tr>
            <tr class="pattern1">
                <th class="head3">
                    <div class="head-wrapper">
                        <div class="optional-box">
                            <p>任意</p>
                        </div>
                        <p class="head">電話番号</p>
                    </div>
                    <input type="text" name="phone-number" size="43" placeholder="例)12345678910" value="<?php echo htmlspecialchars($post['phone-number']) ?>">
                </th>
            </tr>
            <tr class="pattern2">
                <th class="head4">
                    <div class="post-number-wrapper">
                        <div class="head-wrapper">
                            <div class="optional-box">
                                <p>任意</p>
                            </div>
                            <p class="head">郵便番号</p>
                        </div>
                        <div class="post-number">
                            <div class="post-number__form">
                                <input type="text" name="zip" class="zip" placeholder="例)000000" value="<?php echo htmlspecialchars($post['zip']) ?>">
                            </div>
                            <div class="post-number__button">
                                <input class="searchAddress ajaxzip3" type="button" value="住所検索">
                            </div>
                        </div>
                    </div>
                    <div class="prefecture-wrapper">
                        <div class="head-wrapper">
                            <div class="optional-box">
                                <p>任意</p>
                            </div>
                            <p class="head">都道府県</p>
                        </div>
                        <div class="prefecture">
                            <!--<select class="prefectureSelect pref" name="pref_name pref">
                                <option value="" selected>都道府県</option>
                                <option value="北海道">北海道</option>
                                <option value="青森県">青森県</option>
                                <option value="岩手県">岩手県</option>
                                <option value="宮城県">宮城県</option>
                                <option value="秋田県">秋田県</option>
                                <option value="山形県">山形県</option>
                                <option value="福島県">福島県</option>
                                <option value="茨城県">茨城県</option>
                                <option value="栃木県">栃木県</option>
                                <option value="群馬県">群馬県</option>
                                <option value="埼玉県">埼玉県</option>
                                <option value="千葉県">千葉県</option>
                                <option value="東京都">東京都</option>
                                <option value="神奈川県">神奈川県</option>
                                <option value="新潟県">新潟県</option>
                                <option value="富山県">富山県</option>
                                <option value="石川県">石川県</option>
                                <option value="福井県">福井県</option>
                                <option value="山梨県">山梨県</option>
                                <option value="長野県">長野県</option>
                                <option value="岐阜県">岐阜県</option>
                                <option value="静岡県">静岡県</option>
                                <option value="愛知県">愛知県</option>
                                <option value="三重県">三重県</option>
                                <option value="滋賀県">滋賀県</option>
                                <option value="京都府">京都府</option>
                                <option value="大阪府">大阪府</option>
                                <option value="兵庫県">兵庫県</option>
                                <option value="奈良県">奈良県</option>
                                <option value="和歌山県">和歌山県</option>
                                <option value="鳥取県">鳥取県</option>
                                <option value="島根県">島根県</option>
                                <option value="岡山県">岡山県</option>
                                <option value="広島県">広島県</option>
                                <option value="山口県">山口県</option>
                                <option value="徳島県">徳島県</option>
                                <option value="香川県">香川県</option>
                                <option value="愛媛県">愛媛県</option>
                                <option value="高知県">高知県</option>
                                <option value="福岡県">福岡県</option>
                                <option value="佐賀県">佐賀県</option>
                                <option value="長崎県">長崎県</option>
                                <option value="熊本県">熊本県</option>
                                <option value="大分県">大分県</option>
                                <option value="宮崎県">宮崎県</option>
                                <option value="鹿児島県">鹿児島県</option>
                                <option value="沖縄県">沖縄県</option>
                            </select>-->
                            <select name="pref" class="prefectureSelect pref">
                                <?php foreach ($prefectures as $index => $value) : ?>
                                    <?php if ($post['pref'] == $index) : ?>
                                        <option value="<?php echo $index ?>" selected><?php echo $value ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $index ?>"><?php echo $value ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="address-wrapper">
                        <div class="head-wrapper head-wrapper-address">
                            <div class="optional-box">
                                <p>任意</p>
                            </div>
                            <p class="head">ご住所</p>
                        </div>
                        <div class="address-form">
                            <input type="text" name="address" value="<?php echo htmlspecialchars($post['address']) ?>">
                        </div>
                    </div>
                </th>
            </tr>
            <tr class="pattern3">
                <th class="head5">
                    <div class="head-wrapper">
                        <div class="required-box">
                            <p>必須</p>
                        </div>
                        <p class="head">お問い合わせ内容</p>
                    </div>
                    <textarea name="contact-content" id="" placeholder="お問い合わせの内容を記入してください。" required><?php echo htmlspecialchars($post['contact-content']) ?></textarea>
                    <?php if ($error['contact-content'] === 'blank') : ?>
                    <p class="error_msg" id="error_msg">※お問い合わせ内容をご記入下さい</p>
                    <?php endif; ?>
                </th>
            </tr>
        </table>
        <div class="textBox">
            <p>＞個人情報の取り扱いについて</p>
            <p>下記事項をご確認の上同意していただける場合は[同意する]にチェックを入れてください。</p>
        </div>
        <div class="personalInfomation-form">
            <textarea name="privacy" rows="10" cols="80" readonly="readonly">
                個人情報保護について

                Luire（以下「当方」）は、以下のとおり個人情報保護方針を定め、個人情報保護の仕組みを構築し、全従業員に個人情報保護の重要性の認識と取組みを徹底させることにより、個人情報の保護を推進致します。

                個人情報の管理

                当方は、お客さまの個人情報を正確かつ最新の状態に保ち、個人情報への不正アクセス・紛失・破損・改ざん・漏洩などを防止するため、セキュリティシステムの維持・管理体制の整備・社員教育の徹底等の必要な措置を講じ、安全対策を実施し個人情報の厳重な管理を行ないます。

                個人情報の利用目的

                預かりした個人情報は、当方からのご連絡や業務のご案内やご質問に対する回答として、電子メールや資料のご送付に利用いたします。

                個人情報の第三者への開示・提供の禁止

                当社は、お客さまよりお預かりした個人情報を適切に管理し、次のいずれかに該当する場合を除き、個人情報を第三者に開示いたしません。
                
                ・お客さまの同意がある場合
                ・お客さまが希望されるサービスを行なうために当社が業務を委託する業者に対して開示する場合
                ・法令に基づき開示することが必要である場合

                個人情報の安全対策

                当方は、個人情報の正確性及び安全性確保のために、セキュリティに万全の対策を講じます。
                
                ご本人の照会
                
                お客さまがご本人の個人情報の照会・修正・削除などをご希望される場合には、ご本人であることを確認の上、対応させていただきます。
                
                法令、規範の遵守と見直し
                
                当方は、保有する個人情報に関して適用される日本の法令、その他規範を遵守するとともに、本ポリシーの内容を適宜見直し、その改善に努めます。
                
                お問い合せ
                
                当社の個人情報の取扱に関するお問い合せは下記までご連絡ください。
                
                Salon Luire
                〒323-0034 栃木県小山市神鳥谷5-18-29 2F
                TEL.050-3503-7195
                E-mail　info@luiresalon
            </textarea>
        </div>
        <div class="agree-box-form">
            <div class="agree-box-form__wrapper">
                <div class="required-box">
                    <p>必須</p>
                </div>
                <div class="checkBox-wrapper">
                    <input name="checkBox" class="checkBox" type="checkbox" value="同意する" required>
                    <p class="text">個人情報の取り扱いに同意する</p>
                </div>
            </div>
            <?php if ($error['checkBox'] === 'blank') : ?>
            <p class="error_msg" id="error_msg">※個人情報保護方針をお読み頂いた上で同意してください</p>
            <?php endif; ?>
        </div>
        <div class="textBox textBox-center">
            <p>「入力内容の確認画面へ」ボタンをクリックして入力内容のご確認をお願いします。</p>
            <p>ご入力、誠にありがとうございました。</p>
        </div>
        <div class="confirm-button-wrapper">
            <input class="button" type="submit" value="入力内容を確認する">
        </div>
    </form>
</div>
</main>
<footer>
<div class="footer-wrapper1">
    <div class="footer-wrapper1__nav">
        <ul class="list-header-nav">
            <li><a href="../index.php">HOME</a></li>
            <li><a href="../kosyu/index.php">導入講習</a></li>
            <li><a href="./form.php" class="last">お問い合わせ</a></li>
        </ul>
    </div>
</div>
<div class="footer-wrapper2">
    <div class="pageTop">
        <a href="#top"><img src="../kosyu/kosyu_image/pageTop.png" alt=""></a>
        <div class="pageTop__text">
            <p>PAGE TOP</p>
        </div>
    </div>
    <div class="footer-wrapper2__logo">
        <h1 class="logo">
            <a href="../index.php"><img src="../logo-foot.png" alt="Total Esthetic Salon Luire"></a>
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
        <li><a href="../index.php">HOME</a></li>
        <li><a href="../kosyu/index.php">導入講習</a></li>
        <li><a href="./form.php" class="last">お問い合わせ</a></li>
    </ul>
</nav>
</footer>
<!--jQuery(3.5.1)の読み込み-->
<script src="../jQuery/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../jQuery/contact-step1.js"></script>
<!--ajaxzip3の読み込み（住所自動取得）-->
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<script type="text/javascript" src="../jQuery/auto_search.js"></script>
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