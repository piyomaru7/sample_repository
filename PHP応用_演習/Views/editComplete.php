<?php
  if(empty($_SERVER["HTTP_REFERER"])){
    header('Location: index.php');
    exit;
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

        編集が完了しました。
        <a href="contact.php">トップへ</a>

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




