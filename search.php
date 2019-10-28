<?php
    require_once('function.php');
    require_once('dbconnect.php');

    $nickname = '';
    if (isset($_GET['nickname'])){
      // var_dump($_GET['nickname']);
      $nickname = $_GET['nickname'];
    }

    $stmt = $dbh->prepare('SELECT * FROM survey WHERE nickname like ?');
    $stmt->execute(["%$nickname%"]);
    $results = $stmt->fetchAll();
    // var_dump($results);
    ?>

    <!DOCTYPE html>
    <html lang="ja">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Memo list</title>
      <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:300&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/custom.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container mt-5 text-center">
      <h1 class="text-primary">Memo list</h1>
      </div>
      <form action="" method="GET" class="text-center mt-3">
      <input type="text" name="nickname">
      <input type="submit" value="search" class="btn btn-outline-primary">
      <form action="search.php" method="GET" class="text-center">
    <input type="button" onclick="location.href='index.html'" value="top" class="btn btn-outline-primary">
    </form>
      <!-- <button type="submit">検索</button> -->
      <!-- type="button"で勝手に送信されなくなる。なかったら検索と送信一緒になっちゃう -->
      </form>
      <?php foreach ($results as $result): ?>
      <div class="container">
      <div class="row mt-3">
        <ul class="col">
        <li><?php echo h($result['nickname']); ?></li>
      </ul>
        <div class="col">
        <p><?php echo h($result['email']); ?></p>
        </div>
        <div class="col-8">
        <p><?php echo h($result['content']); ?></p>
        </div>
      </div>
      </div>
      <?php endforeach; ?>
    </body>
    </html>