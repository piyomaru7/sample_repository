<?php
session_start();
require_once(ROOT_PATH . 'Controllers/ContactController.php');
$contact = new ContactController();
$contactsData = $contact->temp();
$validate = $contact->validate();


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

    <p>入力画面</p>
    <div class="form">
      <form class="contact_form" action='./contact.php' method='post'>
        <div class="input_text">
          <label>氏名<br>
            <input type="text" name="name" value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}?>"/>
          </label>
        </div>
        <div class="input_text">
          <label>フリガナ<br>
            <input type="text" name="kana" value="<?php if(isset($_SESSION['kana'])){echo $_SESSION['kana'];}?>"/>
          </label>
        </div>
        <div class="input_text">
          <label>電話番号<br>
            <input type="tel" name="tel" value="<?php if(isset($_SESSION['tel'])){echo $_SESSION['tel'];}?>"/>
          </label>
        </div>
        <div class="input_text">
          <label>メールアドレス<br>
            <input type="email" name="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>"/>
          </label>
        </div>
        <div class="input_text">
          <label>お問い合わせ内容<br>
            <textarea name="body" ><?php if(isset($_SESSION['body'])){echo $_SESSION['body'];}?></textarea>
          </label>
        </div>
        <input type="submit" name="submit" value="確認" class="submit_btn">
      </form>
    </div>

    <table>
      <tr>
        <th>氏名</th>
        <th>フリガナ</th>
        <th>電話番号</th>
        <th>メールアドレス</th>
        <th>お問い合わせ内容</th>
      </tr>
      <?php foreach ($contactsData as $column) : ?>
        <tr>
          <td><?php echo $column['name'] ?></td>
          <td><?php echo $column['kana'] ?></td>
          <td><?php echo $column['tel'] ?></td>
          <td><?php echo $column['email'] ?></td>
          <td><?php echo $column['body'] ?></td>
          <td><a href="/edit.php?id=<?php echo $column['id'] ?>">編集</a></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</body>

</html>