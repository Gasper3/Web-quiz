<?php
session_start();
// if((!isset($_POST['login'])) || (!isset($_POST['pass'])){
//   header("Location: index.php");
//   exit();
// }
require_once("connect.php");
$conn=new mysqli($server, $db_user, $db_password, $db);
$login=$_POST['login'];
$pass=$_POST['pass'];

//zakladamy ze login w bazie musi byc unikatowy
$que="SELECT nazwa, haslo from uzytkownicy where nazwa like '$login';";
$result=$conn->query($que);
if($result){
  $row=$result->fetch_assoc();
  if(password_verify($pass, $row["haslo"])){
    $_SESSION['logged']=true;
    $_SESSION['name']=$row['nazwa'];
    unset($_SESSION['error']);
    $result->close();
    header("Location: main.php");
  }
  else{
    $_SESSION['error']="Nieprawidłowe hasło!";
    header("Location: index.php");
  }
}
else{
  $_SESSION['error']="Nieprawidłowy login lub hasło!";
  header("Location: index.php");
}
$conn->close();



?>
