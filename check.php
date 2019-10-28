<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header ('Location: index.html');
  }
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    
    require_once('function.php');
    require_once('dbconnect.php');

    // $stmt = $dbh -> prepare('INSERT INTO surveys(nickname,email,content) VALUES(?,?,?)');
    // $stmt -> execute([$nickname, $email, $content]);
    $stmt = $dbh->prepare('INSERT INTO survey (nickname, email, content) VALUES (?, ?, ?)');
    $stmt->execute([$nickname, $email, $content]);//?を変数に置き換えてSQLを実行

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Send ok</title>
    <meta charset="utf-8">
</head>
<body>
    <div class="container mt-5 text-center">
    <h1 class="text-primary">Send completely</h1>
    <h4>✓Let's continue every day</h4>
    <p><?php echo $nickname; ?></p>
    <p><?php echo $email; ?></p>
    <p><?php echo $content; ?></p>
    </div>
    <form action="search.php" method="GET" class="text-center">
    <input type="button" onclick="location.href='search.php'" value="search" class="btn btn-outline-primary">
    </form>
  </body>
  </html>