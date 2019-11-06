<?php
session_start();
if(!isset($_SESSION['logged'])){
  header("Location: index.php");
  exit();
}
?>

<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/main_style.css">
  <title>QUIZ</title>
</head>
<body>
  <div id=left>
    <h1>QUIZ</h1>
    <form method="post">
      <p>Zobacz swoje poprzednie wyniki</p>
      <input type=submit value="Sprawdź" name="sprawdz">
      <p>Wybierz kategorię</p>
      <select name=list>
        <option value=css>CSS</option>
        <option value=php>PHP</option>
        <option value=sql>SQL</option>
      </select>
      <p><input type=submit name="go" value="Rozpocznij test"></p>
    </form>
    <a href="logout.php">Wyloguj się</a>
  </div>
  <div id=main>
    <?php
      if((!isset($_POST['sprawdz'])) && (!isset($_POST['go']))){
        if(!isset($_SESSION["welcome"])){
          echo "Witaj ".$_SESSION["name"].". Rozczpocznij quiz lub sprawdź swoje poprzednie wyniki :)";
          $_SESSION['welcome']=true;
        }
      }

      if(isset($_POST['sprawdz']))
      {
        require_once 'src/latest-mark.php';
      }

      if(isset($_POST['go'])){
        require_once 'src/questions.php';
      }

      if(isset($_POST['end'])){
        require_once 'src/end.php';
      }
    ?>
  </div>
</body>
</html>
