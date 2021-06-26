<?php
  session_start(); 
  include "dbconnect.php";
  if($_SERVER["QUERY_STRING"]){
    switch($_SERVER["QUERY_STRING"]){
      case "book":
        $result = $conn->query("INSERT INTO books (title, author, publisherId, publishmentYear, genreId) VALUES('".$_POST["title"]."', '".$_POST["author"]."','".$_POST["publisher"]."','".$_POST["pubDate"]."','".$_POST["genre"]."')");
        if($result){
        }
        else{
          $_SESSION["err"] = 3;
            echo $conn->error;
        }
        break;
        
      case "employee":
        $result = $conn->query("INSERT INTO employees (name, gender, address, telephone, passport, positionId, age) VALUES('".$_POST["name"]."', '".$_POST["gender"]."','".$_POST["address"]."','".$_POST["phone"]."','".$_POST["passport"]."','".$_POST["position"]."','".$_POST["age"]."')");
        if($result){
        }
        else{
          $_SESSION["err"] = 3;
            echo $conn->error;
        }
        break;

      case "genre":
        $result = $conn->query("INSERT INTO genres (title, description, count) VALUES('".$_POST["title"]."', '".$_POST["desc"]."', 0)");
        if($result){
        }
        else{
          $_SESSION["err"] = 3;
            echo $conn->error;
        }
        break;

      case "position":
        $result = $conn->query("INSERT INTO positions (title, salary, responsibilities, requirements) VALUES('".$_POST["title"]."', '".$_POST["salary"]."','".$_POST["resp"]."','".$_POST["req"]."')");
        if($result){
        }
        else{
          $_SESSION["err"] = 3;
            echo $conn->error;
        }
        break;

      case "publisher":
        $result = $conn->query("INSERT INTO publishers (title, city, address) VALUES('".$_POST["title"]."', '".$_POST["city"]."','".$_POST["address"]."')");
        if($result){
        }
        else{
          $_SESSION["err"] = 3;
            echo $conn->error;
        }
        break;

    }
    echo "<script>history.go(-2)</script>";
  }
  else{
    echo "<script>history.go(-1)</script>";
  }
?>