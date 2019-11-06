<?php
  require_once 'database/connect.php';
  $conn=new mysqli($server, $db_user, $db_password, $db);
  $que="SELECT wynik_testu, ocena_testu from uzytkownicy where nazwa like '$_SESSION[name]';";
  $result=$conn->query($que);
  if($result){
    $row=$result->fetch_array(MYSQLI_NUM);
    echo "Twój poprzedni wynik z testu to $row[0]. Ocena to $row[1].";
  }
$conn->close();
