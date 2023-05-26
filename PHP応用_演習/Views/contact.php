<?php

  require_once(ROOT_PATH . 'Models/dbc.php');
  $contactsData = getAllContacts();

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

    <form class="contact_form" action='./confirm.php' method='post'>
      <label>氏名</label>
      <input type="text" name="name" class="input_text"/>
      <label>フリガナ</label>
      <input type="text" name="kana" class="input_text"/>
      <label>電話番号</label>
      <input type="tel" name="tel" class="input_text"/>
      <label>メールアドレス</label>
      <input type="email" name="email" class="input_text"/>
      <label>お問い合わせ内容</label>
      <textarea name="body"></textarea>
      <input type="submit" name="confirm" value="確認" class="submit_btn">
    </form>

    <table>
    <tr>
      <th>氏名</th>
      <th>フリガナ</th>
      <th>電話番号</th>
      <th>メールアドレス</th>
      <th>お問い合わせ内容</th>
    </tr>    
    <?php foreach($contactsData as $column): ?>
    <tr>      
      <td><?php echo $column['name'] ?></td>
      <td><?php echo $column['kana'] ?></td>
      <td><?php echo $column['tel'] ?></td>
      <td><?php echo $column['email'] ?></td>
      <td><?php echo $column['body'] ?></td>
    </tr>
    <?php endforeach; ?>
    </table>
</div>
</body>
</html>