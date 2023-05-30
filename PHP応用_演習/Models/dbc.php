<?php

require_once('env.php');

function dbConnect() {
  $host   = DB_HOST;
  $dbname = DB_NAME;
  $user   = DB_USER;
  $pass   =  DB_PATH;
  $dsn    = "mysql:host=$host;dbname=$dbname;charset=utf8";

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
