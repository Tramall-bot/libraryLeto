<?php
session_start();  
    include "checkLogin.php";
    include "dbconnect.php";
    if(!isset($_SESSION["err"]))
    $_SESSION["err"] = "";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Библиотека</title>
    <link rel="stylesheet" href="styles.css" >
</head>
<body>
    <?php
        switch($_SESSION["user"]){
            case "admin":
                $mode = "Администрирование";
                break;
            case "manager":
                $mode = "Управление";
                break;
            case "view":
                $mode = "Просмотр";
        }
        echo "<div  class='mode'>Режим: $mode</div>"
    ?>
<div  class="mode"><a href="loginForm.php">Изменить режим </a><a href="logout.php">Выйти </a></div>
<div class="nav">
   <a href="index.php"><div class="navItem">Главная</div></a>
   <a href="employees.php"><div class="navItem">Сотрудники</div></a>
   <a href="positions.php"><div class="navItem">Должности</div></a>
   <a href="publishers.php"><div class="navItem">Издательства</div></a>
   <a href="genres.php"><div class="navItem">Жанры</div></a>
   <a href="books.php"><div class="navItem">Книги</div></a>
</div>
<?php
    if($_SESSION["err"]){
        switch($_SESSION["err"]){
            case 1:
                 echo '<h1 class="head" style="color:red">У вас нет прав удалять записи</h1>';
                 break;
             case 2:
                 echo '<h1 class="head" style="color:red">У вас нет прав редактировать записи</h1>';
                 break;
             case 3:
                 echo '<h1 class="head" style="color:red">У вас нет прав добавлять записи</h1>';
                 break;
            case 4:
                echo '<h1 class="head" style="color:red">На данную запись сущетсвуют ссылки</h1>';
                break;
        }
        $_SESSION["err"] = "";
    }
    
?>
