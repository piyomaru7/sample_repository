<?php

function dbConnect() {
  $dsn = 'mysql:host=localhost;dbname=casteria;charset=utf8';
  $user = 'contacts_user';
  $pass = 'Mzcin_1998';

  try {
    $dbh = new PDO($dsn, $user, $pass,[
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
  } catch(PDOException $e) {
    echo '接続失敗' . $e->getMessage();
    exit();
  }

  return $dbh;
}
