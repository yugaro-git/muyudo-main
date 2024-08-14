<?php
session_start();
$token = bin2hex(random_bytes(32));
$_SESSION['token'] = $token;
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>お問い合わせ</title>
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
    <header>
      <h1>お問い合わせ</h1>
    </header>
    <main>
      <a href="../index.html" class="backButton">&#8592;メインページへ</a>
      <div class="formContainer">
        <img src="../img/frame/flame2.png" alt="">
        <form action="confirm.php" method="post">
        <input type="hidden" name="token" value="<?php echo $token; ?>" />
      
        <label for="name">お名前:</label>
        <input type="text" id="name" name="name" required />
        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required />
        <label for="message">お問い合わせ内容:</label>
        <textarea id="message" name="message" required></textarea>
        <input type="submit" value="送信"  class="soushin"/>
      </form>
      <img src="../img/frame/flame2.png" alt="">
      </div>
      
    </main>
    <footer>
      <p><small>&copy;夢遊堂</small></p>
    </footer>
  </body>
</html>
