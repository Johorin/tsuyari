<?php
session_start();

$prefectures = [
    "都道府県", "北海道", "青森県", "岩手県", "宮城県", "秋田県", "山形県", "福島県",
    "茨城県", "栃木県", "群馬県", "埼玉県", "千葉県", "東京都", "神奈川県",
    "新潟県", "富山県", "石川県", "福井県", "山梨県", "長野県", "岐阜県",
    "静岡県", "愛知県", "三重県", "滋賀県", "京都府", "大阪府", "兵庫県",
    "奈良県", "和歌山県", "鳥取県", "島根県", "岡山県", "広島県", "山口県",
    "徳島県", "香川県", "愛媛県", "高知県", "福岡県", "佐賀県", "長崎県",
    "熊本県", "大分県", "宮崎県", "鹿児島県", "沖縄県"
];
// 入力画面からのアクセスでなければ、戻す
if (!isset($_SESSION['form'])) {
    header('Location: form.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //postされたトークンとサーバー上（セッション上）に保存したトークンが一致すれば次のページへ
    if ($_SESSION['token'] !== $_POST['token']) {
        $post = [];
        header('Location: form.php');
        exit();
    } else {
        // メールを送信する。※本番環境のサーバーからじゃないと送られない。
        //$to = 'info@tsuyari.luire.salon';
        $to = 'hhoyuak2145@gmail.com';
        $from = $post['mail-address'];
        $subject = 'お問い合わせが届きました';
        $body = <<<EOT
名前： {$post['name']}
メールアドレス： {$post['mail-address']}
内容：
{$post['contact-content']}
EOT;
        mb_language("ja");
        mb_internal_encoding("UTF-8");
        mb_send_mail($from, "お問い合わせありがとうございます。", $body, "From: {$from}");
        mb_send_mail($to, $subject, $body, "From: {$from}");

        // セッションを消してお礼画面へ
        unset($_SESSION['form']);
        header('Location: thanks.html');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--PC-->
    <link rel="stylesheet" href="./contact_css/contact-step2_pc.css" media="screen and (min-width:900px)">
    <!--スマホ-->
    <link rel="stylesheet" href="./contact_css/contact-step2_sp.css" media="screen and (min-width:320px) and (max-width:899px)">
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
                <a href="../index.html"><img src="../logo.png" alt="Total Esthetic SALON LUIRE" id="logoImage"></a>
            </h1>
        </div>
    </div>
    <div class="header-wrapper__nav">
        <ul class="list-header-nav">
            <li><a href="../index.html">HOME</a></li>
            <li><a href="../kosyu/index.html">導入講習</a></li>
            <li><a href="./form.php">お問い合わせ</a></li>
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
<form action="" method="post">
    <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>">
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
            <p>入力いただいた内容をもう一度ご確認ください。</p>
            <p>入力内容に誤りがありますと、お返事ができない場合がありますので必ずご確認ください。</p>
        </div>
        <div class="input-contents input-contents-text1">
            <table>
                <tr class="pattern1">
                    <th class="head1"><p>お名前</p></th>
                    <td class="data1"><?php echo htmlspecialchars($post['name']); ?></td>
                </tr>
                <tr class="pattern1">
                    <th class="head2"><p>メールアドレス</p></th>
                    <td class="data2">
                        <?php echo htmlspecialchars($post['mail-address']); ?>
                    </td>
                </tr>
                <tr class="pattern1">
                    <th class="head3"><p>電話番号</p></th>
                    <td class="data3">
                        <?php
                        if ($post['phone-number']) {
                            echo htmlspecialchars($post['phone-number']);
                        } else {
                            echo 'ご記入なし';
                        }
                        ?>
                    </td>
                </tr>
                <tr class="pattern2">
                    <th class="head4"><p>ご住所</p></th>
                    <td class="data4">
                        <!--<p>〒323-1102</p>-->
                        <p><?php
                        if ($post['zip']) {
                            echo '〒' . htmlspecialchars($post['zip']);
                        } else {
                            echo 'ご住所のご記入なし';
                        }
                        ?></p>
                        <p><?php
                        if ($post['pref']) {
                            echo $prefectures[$post['pref']];
                        }
                        ?></p>
                        <p><?php
                        if ($post['address']) {
                            echo htmlspecialchars($post['address']);
                        }
                        ?></p>
                    </td>
                </tr>
                <tr class="pattern3">
                    <th class="head5"><p>お問い合わせ内容</p></th>
                    <td class="data5"><?php echo htmlspecialchars($post['contact-content']); ?></td>
                </tr>
            </table>
        </div>
        <div class="input-contents input-contents-text2">
            <table>
                <tr class="pattern1">
                    <th class="head1">
                        <p class="itemText">-お名前-</p>
                        <p><?php echo htmlspecialchars($post['name']); ?></p>
                    </th>
                </tr>
                <tr class="pattern1">
                    <th class="head2">
                        <p class="itemText">-メールアドレス-</p>
                        <p><?php echo htmlspecialchars($post['mail-address']); ?></p>
                    </th>
                </tr>
                <tr class="pattern1">
                    <th class="head3">
                        <p class="itemText">-電話番号-</p>
                        <p><?php
                        if ($post['phone-number']) {
                            echo htmlspecialchars($post['phone-number']);
                        } else {
                            echo 'ご記入なし';
                        }
                        ?></p>
                    </th>
                </tr>
                <tr class="pattern2">
                    <th class="head4">
                        <p class="itemText">-ご住所-</p>
                        <p class="post-number">
                        <?php
                        if ($post['zip']) {
                            echo '〒' . htmlspecialchars($post['zip']);
                        } else {
                            echo 'ご住所のご記入なし';
                        }
                        ?>
                        </p>
                        <p><?php
                        if ($post['pref']) {
                            echo $prefectures[$post['pref']];
                        }
                        ?></p>
                        <p><?php
                        if ($post['address']) {
                            echo htmlspecialchars($post['address']);
                        }
                        ?></p>
                    </th>
                </tr>
                <tr class="pattern3">
                    <th class="head5">
                        <p class="itemText">-お問い合わせ内容-</p>
                        <p><?php echo htmlspecialchars($post['contact-content']); ?></p>
                    </th>
                </tr>
            </table>
        </div>
        <div class="textBox">
            <p>＞個人情報の取り扱いについて</p>
        </div>
        <div class="input-contents2 input-contents2-text1">
            <table>
                <tr>
                    <th class="head1"><p>規約への同意</p></th>
                    <td class="data1"><p>個人情報の取り扱いに同意する</p></td>
                </tr>
            </table>
        </div>
        <div class="input-contents2 input-contents2-text2">
            <table>
                <tr>
                    <th class="head1">
                        <p class="itemText">-規約への同意-</p>
                        <p>個人情報の取り扱いに同意する</p>
                    </th>
                </tr>
            </table>
        </div>
        <div class="textBox textBox-center">
            <p>記入した内容に間違いがなければ「この内容で送信する」ボタンを押してください。</p>
        </div>
        <div class="pageBack">
            <a href="form.php">＜＜入力内容を修正する</a>
        </div>
        <div class="submit-button-wrapper">
            <input class="button" type="submit" value="この内容で送信する">
        </div>
    </div>
</form>
</main>
<footer>
<div class="footer-wrapper1">
    <div class="footer-wrapper1__nav">
        <ul class="list-header-nav">
            <li><a href="../index.html">HOME</a></li>
            <li><a href="../kosyu/index.html">導入講習</a></li>
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
            <a href="../index.html"><img src="../logo-foot.png" alt="Total Esthetic Salon Luire"></a>
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
        <li><a href="../kosyu/index.html">導入講習</a></li>
        <li><a href="./form.php" class="last">お問い合わせ</a></li>
    </ul>
</nav>
</footer>
<!--jQuery(3.5.1)の読み込み-->
<script src="../jQuery/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../jQuery/contact-step1.js"></script>
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