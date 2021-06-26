<?php
  session_start(); 
  include "dbconnect.php";

  switch(explode("=",$_SERVER["QUERY_STRING"])[0]){
    case "book":
      if(!$conn->query("DELETE FROM books WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1])){
         if(explode(" ",$conn->error)[0] == "DELETE" & explode(" ",$conn->error)[1] == "command")
         $_SESSION["err"] = 1;
         if(explode(" ",$conn->error)[0] == "Cannot" & explode(" ",$conn->error)[1] == "delete")
         $_SESSION["err"] = 4;
        echo $conn->error;
      }
      break;
      
    case "employee":
      if(!$conn->query("DELETE FROM employees WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1])){

        if(explode(" ",$conn->error)[0] == "DELETE" & explode(" ",$conn->error)[1] == "command")
         $_SESSION["err"] = 1;
         if(explode(" ",$conn->error)[0] == "Cannot" & explode(" ",$conn->error)[1] == "delete")
         $_SESSION["err"] = 4;
        echo $conn->error;
      }
      break;

    case "genre":
      if(!$conn->query("DELETE FROM genres WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1])){
        if(explode(" ",$conn->error)[0] == "DELETE" & explode(" ",$conn->error)[1] == "command")
         $_SESSION["err"] = 1;
         if(explode(" ",$conn->error)[0] == "Cannot" & explode(" ",$conn->error)[1] == "delete")
         $_SESSION["err"] = 4;
        echo $conn->error;
      }
      break;

    case "position":
      if(!$conn->query("DELETE FROM positions WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1])){
         if(explode(" ",$conn->error)[0] == "DELETE" & explode(" ",$conn->error)[1] == "command")
         $_SESSION["err"] = 1;
         if(explode(" ",$conn->error)[0] == "Cannot" & explode(" ",$conn->error)[1] == "delete")
         $_SESSION["err"] = 4;
        echo $conn->error;
      }
      break;

    case "publisher":
      if(!$conn->query("DELETE FROM publishers WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1])){

         if(explode(" ",$conn->error)[0] == "DELETE" & explode(" ",$conn->error)[1] == "command")
         $_SESSION["err"] = 1;
         if(explode(" ",$conn->error)[0] == "Cannot" & explode(" ",$conn->error)[1] == "delete")
         $_SESSION["err"] = 4;
        echo $conn->error;
      }
      break;

  }
  echo "<script>history.back()</script>";
?>