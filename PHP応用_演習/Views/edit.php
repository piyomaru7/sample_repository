<?php
session_start();
require_once(ROOT_PATH . 'Controllers/ContactController.php');
$contact = new ContactController();
$contactsData = $contact->edit();
$validate = $contact->editValidate();


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

    <p>編集画面</p>
    <div class="form">
      <form class="contact_form" action='./edit.php' method='post'>
        <input type="hidden" name="id" value="<?php echo $contactsData['id']?>"/>
        <div class="input_text">
          <label>氏名<br>
            <input type="text" name="name" value="<?php echo $contactsData['name']?>"/>
          </label>
        </div>
        <div class="input_text">
          <label>フリガナ<br>
            <input type="text" name="kana" value="<?php echo $contactsData['kana'];?>"/>
          </label>
        </div>
        <div class="input_text">
          <label>電話番号<br>
            <input type="tel" name="tel" value="<?php echo $contactsData['tel']?>"/>
          </label>
        </div>
        <div class="input_text">
          <label>メールアドレス<br>
            <input type="email" name="email" value="<?php echo $contactsData['email']?>"/>
          </label>
        </div>
        <div class="input_text">
          <label>お問い合わせ内容<br>
            <textarea name="body" ><?php echo $contactsData['body']?></textarea>
          </label>
        </div>
        <button type="button" onclick="history.back(-1)">戻る</button>
        <input type="submit" name="submit" value="確認" class="submit_btn">
      </form>
    </div>

    
  </div>
</body>

</html>