<?php
  session_start();
  require_once(ROOT_PATH . 'Controllers/ContactController.php');
  
  $contact = new ContactController();
  $contactsData = $contact->edit();  
  
  if(empty($_SERVER["HTTP_REFERER"])){
    header('Location: index.php');
    exit;
  }


  if(isset($_POST['confirm'])){  
    $id = $_POST['id'];
    $contact = new ContactController();
    $contact->getPostDelete($id);
    header('Location: deleteComplete.php');
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
    
        <p>削除確認画面</p>
        <script>
          function confirm_test() {
              var select = confirm("削除しますか？\n「OK」で送信\n「キャンセル」で送信中止");
              return select;
          }
        </script>
        <div class="form">
          <form class="contact_form" action='./deleteConfirm.php' method='post' onsubmit="return confirm_test()">
          <input type="hidden" name="id" value="<?php echo $contactsData['id']?>"/>

            <div class="input_text">
              <p>
                氏名<br>
                <?php echo $contactsData['name']?>
              </p>
            </div>
            <div class="input_text">
              <p>
                フリガナ<br>
                <?php echo $contactsData['kana'];?>          
              </p>
            </div>
            <div class="input_text">
              <p>
                電話番号<br>
                <?php echo $contactsData['tel'];?>          
                </p>
            </div>
            <div class="input_text">
              <p>
                メールアドレス<br>
                <?php echo $contactsData['email'];?>         
              </p>
            </div>
            <div class="input_text">
              <p>
                お問い合わせ内容<br>
                <?php echo nl2br($contactsData['body']);?>         
              </p>
            </div>
            <button type="button" onclick="history.back(-1)" class="submit_btn">戻る</button>
            <input type="submit" name="confirm" value="削除" class="submit_btn">
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