<?php
  include "header.php";
  ?>
  <div class="content">
  <?php
  if($_SERVER["QUERY_STRING"]){
    echo "<h1 class='head'> Подробности ";
    switch(explode("=",$_SERVER["QUERY_STRING"])[0]){
      case "book":
        echo "Книги</h1 ><br>";
        $row = ($conn->query("SELECT * FROM books WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1]))->fetch_assoc();
        if($row){
          echo "<div class='details'>";
          echo '
          <div class="label">ID</div>
          <div class="data">'.$row["id"].'</div>
          <div class="label">Название</div>
          <div class="data">'.$row["title"].'</div>
          <div class="label">Автор</div>
          <div class="data">'.$row["author"].'</div>
          <div class="label">Код издателя</div>
          <div class="data">'.$row["publisherId"].'</div>
          <div class="label">Издатель</div>
          <div class="data">'.($conn->query("SELECT title FROM publishers WHERE id=".$row["publisherId"]))->fetch_all()[0][0].'</div>
          <div class="label">Год издания</div>
          <div class="data">'.$row["publishmentYear"].'</div>
          <div class="label">Код жанра</div>
          <div class="data">'.$row["genreId"].'</div>
          <div class="label">Жанр</div>
          <div class="data">'.($conn->query("SELECT title FROM genres WHERE id=".$row["genreId"]))->fetch_all()[0][0].'</div>';
        }
        break;
        
      case "employee":
        echo "Сотрудника</h1 ><br>";
        $row = ($conn->query("SELECT * FROM employees WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1]))->fetch_assoc();
        if($row){
          echo "<div class='details'>";
          echo '
          <div class="label">ID</div>
          <div class="data">'.$row["id"].'</div>
          <div class="label">Имя</div>
          <div class="data">'.$row["name"].'</div>
          <div class="label">Возвраст</div>
          <div class="data">'.$row["age"].'</div>
          <div class="label">Пол</div>
          <div class="data">'.$row["gender"].'</div>
          <div class="label">Адресс</div>
          <div class="data">'.$row["address"].'</div>
          <div class="label">Телефон</div>
          <div class="data">'.$row["telephone"].'</div>
          <div class="label">Пасспортные данные</div>
          <div class="data">'.$row["passport"].'</div>
          <div class="label">Код Должности</div>
          <div class="data">'.$row["positionId"].'</div>
          <div class="label">Должность</div>
          <div class="data">'.($conn->query("SELECT title FROM positions WHERE id=".$row["positionId"]))->fetch_all()[0][0].'</div>';
        }
        break;
  
      case "genre":
        echo "Жанра</h1 ><br>";
        $row = ($conn->query("SELECT * FROM genres WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1]))->fetch_assoc();
        if($row){
          echo "<div class='details'>";
          echo '
          <div class="label">ID</div>
          <div class="data">'.$row["id"].'</div>
          <div class="label">Наименование</div>
          <div class="data">'.$row["title"].'</div>
          <div class="label">Описание</div>
          <div class="data">'.$row["description"].'</div>';
        }
        break;
  
      case "position":
        echo "Должности</h1 ><br>";
        $row = ($conn->query("SELECT * FROM positions WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1]))->fetch_assoc();
        if($row){
          echo "<div class='details'>";
          echo '
          <div class="label">ID</div>
          <div class="data">'.$row["id"].'</div>
          <div class="label">Наименование</div>
          <div class="data">'.$row["title"].'</div>
          <div class="label">Отклад</div>
          <div class="data">'.$row["salary"].'</div>
          <div class="label">Обязаности</div>
          <div class="data">'.$row["responsibilities"].'</div>
          <div class="label">Требования</div>
          <div class="data">'.$row["requirements"].'</div>';
        }
        break;
  
      case "publisher":
        echo "Издателя</h1 ><br>";
        $row = ($conn->query("SELECT * FROM publishers WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1]))->fetch_assoc();
        if($row){
          echo "<div class='details'>";
          echo '
          <div class="label">ID</div>
          <div class="data">'.$row["id"].'</div>
          <div class="label">Наименование</div>
          <div class="data">'.$row["title"].'</div>
          <div class="label">Город</div>
          <div class="data">'.$row["city"].'</div>
          <div class="label">Адрес</div>
          <div class="data">'.$row["address"].'</div>';
        }
        break;
  
    }
    echo "<button class='doneBtn'onclick='history.back()'>Назад</button>";
    echo "</div>";
  }else{
    echo "<script>history.back()</script>";
  }
  ?>
  </div>
  <?php
  include "footer.php";
?>
