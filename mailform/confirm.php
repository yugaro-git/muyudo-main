<?php
session_start();

if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
    die('不正なリクエストです。');
}

$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

if ($email === false) {
    die('メールアドレスが正しくありません。');
}

// メール送信
$to = getenv('EMAIL_ADDRESS'); // サーバ設定ファイルからメールアドレスを取得
$subject = 'お問い合わせフォームからのメッセージ';
$headers = "From: $email\r\n" .
           "Reply-To: $email\r\n" .
           'X-Mailer: PHP/' . phpversion();
$body = "名前: $name\nメール: $email\nメッセージ:\n$message";

$isMailSent = @mail($to, $subject, $body, $headers);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ確認</title>
    <link rel="stylesheet" href="css/mailstyle.min.css?0720">
    <script>
      (function (d) {
        var config = {
            kitId: "emc4drg",
            scriptTimeout: 3000,
            async: true,
          },
          h = d.documentElement,
          t = setTimeout(function () {
            h.className =
              h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
          }, config.scriptTimeout),
          tk = d.createElement("script"),
          f = false,
          s = d.getElementsByTagName("script")[0],
          a;
        h.className += " wf-loading";
        tk.src = "https://use.typekit.net/" + config.kitId + ".js";
        tk.async = true;
        tk.onload = tk.onreadystatechange = function () {
          a = this.readyState;
          if (f || (a && a != "complete" && a != "loaded")) return;
          f = true;
          clearTimeout(t);
          try {
            Typekit.load(config);
          } catch (e) {}
        };
        s.parentNode.insertBefore(tk, s);
      })(document);
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <div class="confirmContainer">
        <h1>お問い合わせ確認</h1>
        <?php if ($isMailSent): ?>
            <div class="confirmMessage">
                お問い合わせを受け付けました。 <br>ありがとうございます。
            </div>
        <?php else: ?>
            <div class="confirmMessage">
                メールの送信に失敗しました。<br>後ほど再度お試しください。
            </div>
        <?php endif; ?>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function (){
        function pageChange(){
            window.location.assign("https://muyudo.com");
        };
        setTimeout(pageChange,8000);
    });
</script>
</html>
