<?php
  session_start();
  require_once(ROOT_PATH . 'Controllers/ContactController.php');
  
  if(empty($_SERVER["HTTP_REFERER"])){
    header('Location: index.php');
    exit;
  }


  if(isset($_POST['back'])){
    session_start();
    // session_destroy();
    header("Location: /edit.php?id=" . $_SESSION['id']);
  }

  if(isset($_POST['confirm'])){
    $contact = new ContactController();
    $contact->getUpdate();
    header('Location: editComplete.php');
    session_destroy();
  }

  


?>
<!DOCTYPE HTML>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問い合わせ</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/contact.css">
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script defer src="../js/index.js"></script>
</head>

<body>
<div class="main">
  <div class="container-fruid" >
      <?php include("header.php") ?>
      
      <div class="contact_main">
    
        <p>編集確認画面</p>
        <script>
          function confirm_test() {
              var select = confirm("更新しますか？\n「OK」で送信\n「キャンセル」で送信中止");
              return select;
          }
        </script>
        <div class="form">
          <form class="contact_form" action='./editConfirm.php' method='post' >
          <!-- <form class="contact_form" action='./editConfirm.php' method='post' onsubmit="return confirm_test()"> -->
            <div class="input_text">
              <p>氏名<br>
              <?php echo $_SESSION['name'] ?>
              </p>
            </div>
            <div class="input_text">
              <p>フリガナ<br>
              <?php echo $_SESSION['kana'] ?>
              </p>
            </div>
            <div class="input_text">
              <p>電話番号<br>
              <?php echo $_SESSION['tel'] ?>
              </p>
            </div>
            <div class="input_text">
              <p>メールアドレス<br>
              <?php echo $_SESSION['email'] ?>
              </p>
            </div>
            <div class="input_text">
              <p>お問い合わせ内容<br>
              <?php echo nl2br($_SESSION['body']) ?>
              </p>
            </div>
            <input type="submit" value="戻る" name="back" class="submit_btn">
            <!-- <button type="button" onclick="history.back(-1)" class="submit_btn">戻る</button> -->
            <input type="submit" name="confirm" value="確認" class="submit_btn" onclick="return confirm_test()">
          </form>
        </div>
      </div>

      
      <div class="row restaurants scroll-block fade-block1">
          <div class="col-md-12 col-xs-12">
              <h3 class="index_level3" style="text-align:center;">店舗一覧</h3>
              <div class="address-boxes">
                  <div class="address-box">
                      <div class="image-box">
                          <img class="restaurant-image" src="../img/restaurant2.jpg" />
                      </div>
                      <p><i class="fas fa-map-marker-alt"></i>東京都渋谷区xxxxxx xxxxx</p>
                  </div>
                  <div class="address-box">
                      <div class="image-box">
                          <img class="restaurant-image" src="../img/restaurant3.jpg" />
                      </div>
                      <p><i class="fas fa-map-marker-alt"></i>千葉県松戸市xxxxx xxxxx</p>
                  </div>
                  <div class="address-box">
                      <div class="image-box">
                          <img class="restaurant-image" src="../img/restaurant4.jpg" />
                      </div>
                      <p><i class="fas fa-map-marker-alt"></i>神奈川県横浜市xxxxx xxxx</p>
                  </div>
                  <div class="address-box">
                      <div class="image-box">
                          <img class="restaurant-image" src="../img/restaurant5.jpg" />
                      </div>
                      <p><i class="fas fa-map-marker-alt"></i>埼玉県川越市xxxxx xxxx</p>
                  </div>
              </div>
          </div>
      </div>
      <?php include("footer.php") ?>
  </div>
</div>  
</body>
</html>



