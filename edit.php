<?php
  session_start(); 
  include "dbconnect.php";
  if($_SERVER["QUERY_STRING"]){
    switch(explode("=",$_SERVER["QUERY_STRING"])[0]){
      case "book":
        $title = $_POST["title"];
        $author = $_POST["author"];
        $publisher = $_POST["publisher"];
        $pubYear = $_POST["pubDate"];
        $genre = $_POST["genre"];
        $result = $conn->query("UPDATE books SET title='$title', author='$author', publisherId='$publisher', publishmentYear='$pubYear', genreId='$genre' WHERE id='".explode("=",$_SERVER["QUERY_STRING"])[1]."'");
        if($result){
        }
        else{
          $_SESSION["err"] = 2;
            echo $conn->error;
        }
        break;
        
        case "employee":
          $name = $_POST["name"];
          $gender = $_POST["gender"];
          $telephone = $_POST["phone"];
          $passport = $_POST["passport"];
          $positionId = $_POST["position"];
          $age = $_POST["age"];
          $address = $_POST["address"];
          $result = $conn->query("UPDATE employees SET name='$name', gender='$gender',address='$address', telephone='$telephone', passport='$passport', positionId='$positionId', age='$age' WHERE id='".explode("=",$_SERVER["QUERY_STRING"])[1]."'");
          if($result){
          }
          else{
            $_SESSION["err"] = 2;
            echo $conn->error;
          }
          break;
  
        case "genre":
          $title = $_POST["title"];
          $description = $_POST["desc"];
          $result = $conn->query("UPDATE genres SET title='$title', description='$description' WHERE id='".explode("=",$_SERVER["QUERY_STRING"])[1]."'");
          if($result){
          }
          else{
            $_SESSION["err"] = 2;
            echo $conn->error;
          }
          break;
  
        case "position":
          $title = $_POST["title"];
          $salary = $_POST["salary"];
          $responsibilities = $_POST["resp"];
          $requirements = $_POST["req"];
          $result = $conn->query("UPDATE positions SET title='$title', salary='$salary', responsibilities='$responsibilities', requirements='$requirements' WHERE id='".explode("=",$_SERVER["QUERY_STRING"])[1]."'");
          if($result){
          }
          else{
            $_SESSION["err"] = 2;
            echo $conn->error;
          }
          break;
  
        case "publisher":
          $title = $_POST["title"];
          $city = $_POST["city"];
          $address = $_POST["address"];
          $result = $conn->query("UPDATE publishers SET title='$title', city='$city', address='$address' WHERE id='".explode("=",$_SERVER["QUERY_STRING"])[1]."'");
          if($result){
          }
          else{
            $_SESSION["err"] = 2;
            echo $conn->error;
          }
          break;
  
    }
    if($_SERVER["QUERY_STRING"]){
      echo "<script>history.go(-2)</script>";
    }
  }
  else{
    echo "<script>histrory.back()</script>";
  }
?>