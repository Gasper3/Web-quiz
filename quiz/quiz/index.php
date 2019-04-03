<?php
session_start();
if(isset($_SESSION['logged'])){
  header("Location: main.php");
  exit();
}
?>

<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/style.css">
  <title>QUIZ</title>
</head>
<body>
  <div id=log-in>
    <h1>QUIZ</h1>
  <form method="post" action="login.php">
    <h2 class=lh>Podaj nazwę</h2>
    <input type=text name=login placeholder="Podaj nazwę">
    <h2 class=lh>Podaj hasło</h2>
    <input type=password name=pass placeholder="Podaj hasło"><br/>
    <?php
      if(isset($_SESSION['error'])) echo $_SESSION['error'];
    ?>
    <p><input type=submit value="Zaloguj"></p>

  </form>
  </div>
</body>
</html>
