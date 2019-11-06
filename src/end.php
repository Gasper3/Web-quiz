<?php
$suma=0;
$category=$_COOKIE["kategoria"];
require_once("database/connect.php");
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
require_once("database/connect.php");
$nazwa=$_SESSION['name'];
$que="UPDATE uzytkownicy set wynik_testu=$suma, ocena_testu=$ocena where nazwa like '$nazwa';";
$conn=new mysqli($server, $db_user, $db_password, $db);
$result=$conn->query($que);
$conn->close();
