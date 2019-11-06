<?php
$category=$_POST['list'];
setcookie("kategoria", $category, time()+3600);
require_once("database/connect.php");
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
