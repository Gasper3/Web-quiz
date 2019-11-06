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
      if(isset($_POST['sprawdz'])){
        require_once("connect.php");
        $conn=new mysqli($server, $db_user, $db_password, $db);
        $que="SELECT wynik_testu, ocena_testu from uzytkownicy where nazwa like '$_SESSION[name]';";
        $result=$conn->query($que);
        if($result){
          $row=$result->fetch_array(MYSQLI_NUM);
          echo "Twój poprzedni wynik z testu to $row[0]. Ocena to $row[1].";
        }
      $conn->close();
      }

      if(isset($_POST['go'])){
        $category=$_POST['list'];
        setcookie("kategoria", $category, time()+3600);
        require_once("connect.php");
        $conn=new mysqli($server, $db_user, $db_password, $db);
        $conn->set_charset("utf8");
        $que="SELECT tresc, a, b, c, d FROM pytania inner join kategoria_pytan on kategoria_pytan.id=pytania.kategoria where kategoria_pytan.kategoria like '$category';";
        $result=$conn->query($que);
        $i=1;
        $ile=0;
        echo "<form method='post'>";
        for($k=1;$k<=4;$k++){
          do{
            $liczba=mt_rand(1,4);
            $ok=true;
            for($l=1;$l<=$ile;$l++){
              if($liczba==$losowane[$l]) $ok=false;
            }
            if($ok==true){
              $ile++;
              $losowane[$ile]=$liczba;
            }
          }
          while($ok!=true);
        }
        while($row=$result->fetch_array(MYSQLI_NUM)){
          $tresc=$row[0];

          $ile=0;


          echo "<h2>$tresc</h2>";
          echo "<h4>";
          for($j=1;$j<=4;$j++){
            $o=$row[$losowane[$j]];
            echo "<label><input type=radio name='$i' value='$o'>$o</label><br>";
          }
          echo "</h4>";
          $i++;
        }
        echo "<input type=submit name='end' value='Zakończ'>";
        echo "</form>";
      }

      if(isset($_POST['end'])){
        $suma=0;
        $category=$_COOKIE["kategoria"];
        require_once("connect.php");
        $conn=new mysqli($server, $db_user, $db_password, $db);
        $conn->set_charset("utf8");
        $que="SELECT poprawna FROM pytania inner join kategoria_pytan on kategoria_pytan.id=pytania.kategoria where kategoria_pytan.kategoria like '$category';";
        $result=$conn->query($que);
        $ilosc_pytan=$result->num_rows;
        $i=1;
        while($row=$result->fetch_array(MYSQLI_NUM)){
          $odp=$_POST["".$i];
          if($odp==$row[0]) $suma+=1;
          $i++;
        }

        $cent=$suma*100/$ilosc_pytan;
        if($cent<=100 && $cent>=95) $ocena=6;
        else if($cent<=94 && $cent>=80) $ocena=5;
        else if($cent<=79 && $cent>=70) $ocena=4;
        else if($cent<=69 && $cent>=50) $ocena=3;
        else if($cent<=49 && $cent>=32) $ocena=2;
        else if($cent<=31 && $cent>=0) $ocena=1;
        echo "Twój wynik to: $suma/$ilosc_pytan. Ocena: $ocena";
        require_once("connect.php");
        $nazwa=$_SESSION['name'];
        $que="UPDATE uzytkownicy set wynik_testu=$suma, ocena_testu=$ocena where nazwa like '$nazwa';";
        $conn=new mysqli($server, $db_user, $db_password, $db);
        $result=$conn->query($que);
        $conn->close();
      }
    ?>

  </div>



</body>
</html>
