<?php

  require_once(ROOT_PATH . 'Models/dbc.php');

  $contact = $_POST;

  if (empty($contact['name'])) {
    echo '名前を入力してください';
  }

  if (empty($contact['kana'])) {
    echo 'フリガナを入力してください';
  }

  if (!preg_match("/\d/", $contact['tel'])) {
    echo '数字入力してください';
  }

  if (empty($contact['email'])) {
    echo 'Eメールアドレスを入力してください';
  }

  if (empty($contact['body'])) {
    echo 'お問い合わせ内容を入力してください';
  }

  $sql = 'INSERT INTO 
            contacts (name, kana, tel, email, body)
          VALUES
          (:name, :kana, :tel, :email, :body)';

  $dbh = dbConnect();

  try {
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $contact['name'], PDO::PARAM_STR);
    $stmt->bindValue(':kana', $contact['kana'], PDO::PARAM_STR);
    $stmt->bindValue(':tel', $contact['tel'], PDO::PARAM_INT);
    $stmt->bindValue(':email', $contact['email'], PDO::PARAM_STR);
    $stmt->bindValue(':body', $contact['body'], PDO::PARAM_STR);
    $stmt->execute();
  } catch(PDOException $e) {
    echo '投稿失敗' . $e->getMessage();
    exit();
  }
?>
