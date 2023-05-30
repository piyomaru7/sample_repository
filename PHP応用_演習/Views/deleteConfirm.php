<?php
  session_start();
  require_once(ROOT_PATH . 'Controllers/ContactController.php');
  
  $contact = new ContactController();
  $contactsData = $contact->edit();

  if(isset($_POST['confirm'])){  
    $id = $_POST['id'];
    $contact = new Contact();
    $contactData = $contact->postDelete($id);
    header('Location: deleteComplete.php');
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
    
    <p>削除しますか？</p>
    <div class="form">
      <form class="contact_form" action='./deleteConfirm.php' method='post'>
      <input type="hidden" name="id" value="<?php echo $contactsData['id']?>"/>

        <div class="input_text">
          <p>氏名<br>
          <?php echo $contactsData['name']?>
          </p>
        </div>
        <div class="input_text">
          <p>フリガナ<br>
          <?php echo $contactsData['kana'];?>          </p>
        </div>
        <div class="input_text">
           <p>電話番号<br>
           <?php echo $contactsData['tel'];?>          </p>
        </div>
        <div class="input_text">
           <p>メールアドレス<br>
           <?php echo $contactsData['email'];?>          </p>
        </div>
        <div class="input_text">
          <p>お問い合わせ内容<br>
          <?php echo $contactsData['body'];?>          </p>
        </div>
        <button type="button" onclick="history.back(-1)">戻る</button>
        <input type="submit" name="confirm" value="削除" class="submit_btn">
      </form>
    </div>
    
</div>
</body>
</html>