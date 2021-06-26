<?php
 $host = "localhost";
 if(!isset($_SESSION["user"])){
     $user = "view";
     $password = "view";
     $_SESSION["user"] = $user;
     $_SESSION["password"] = $password;
 }else{
    $user = $_SESSION["user"];
    $password = $_SESSION["password"];
 }
 $db = "library2";
 $conn = new mysqli($host, $user, $password, $db);
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }


?>