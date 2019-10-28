<?php

// DBに接続
$host = "localhost"; //MySQLがインストールされてるコンピュータ
$dbname = "idea"; //使用するDB
$charset = "utf8mb4";//文字コード
$user = 'root'; //MySQLにログインするユーザー名
$password = ''; //ユーザーのパスワード
$options = [
   //SQLでエラーが表示された場合、画面にエラーが出力される
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  //DBから取得したデータを連想配列の形式で取得する
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  //SQLインジェクション対策。データが壊されたり盗まれたりしないようにするやつ
  PDO::ATTR_EMULATE_PREPARES   => false,
];

//DBへの接続設定
$dsn="mysql:host=$host;dbname=$dbname;charset=$charset";
try {
  //DBへ接続
  $dbh = new PDO($dsn, $user, $password, $options);
} catch (\PDOException $e){
  throw new \PDOException($e -> getMessage(),(int)$e -> getCode());
}