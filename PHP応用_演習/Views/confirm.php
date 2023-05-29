<?php
  session_start();
  require_once(ROOT_PATH . 'Controllers/ContactController.php');
  

  if(isset($_POST['confirm'])){    
    $contact = new Contact();
    $contactData = $contact->insert($_SESSION);
  }


?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>お問い合わせ</title>
  <link rel="stylesheet" type="text/css" href="../css/contact.css">
  <link rel="stylesheet" type="text/css" href="../css/table.css">
</head>
<body>
<div class="contact_main">
    
    <p>確認画面</p>
    <div class="form">
      <form class="contact_form" action='./confirm.php' method='post'>
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
          <?php echo $_SESSION['body'] ?>
          </p>
        </div>
        <button type="button" onclick="history.back(-1)">戻る</button>
        <input type="submit" name="confirm" value="確認" class="submit_btn">
      </form>
    </div>
    
</div>
</body>
</html>