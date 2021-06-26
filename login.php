<?php
  session_start(); 
  include "dbconnect.php";
  
  $user = $_POST["log"];
  $pass = $_POST["pass"];
  if($conn->change_user($user, $pass, null)){
    $_SESSION["user"] = $user;
    $_SESSION["password"] = $pass;
    header('Location: index.php');
  }else
  header('Location: loginForm.php?err');
?>
