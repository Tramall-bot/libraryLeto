<?php
  include "header.php";
?>
  <div class="content">
  <?php 
  if($_SERVER["QUERY_STRING"]){
    echo "<h1 class='head'>Добавление ";
    switch( $_SERVER["QUERY_STRING"]){
      case "book":
        echo "Книги</h1><br>";
        echo '<form class="addForm" action="add.php?'. $_SERVER["QUERY_STRING"].'" method="post" >';
        echo '<label for="title">Название</label><br>
        <input required type="text" name="title" id="title"><br>
        <label for="author">Автор</label><br>
        <input required type="text" name="author" id="author"><br>
        <label for="publisher">Издатель</label><br>
        <select name="publisher" id="publisher">';
        $result = $conn->query("SELECT * FROM publishers");
        if($result){
          while($row = $result->fetch_assoc()) {
              echo "<option value='".$row['id']."'>".$row['title']."</option>";
          }
          $result->close();
        }
        echo ' </select><br>
        <label for="pubDate">Год выпуска</label><br>
        <input required type="date" name="pubDate" id="pubDate"><br>
        <label for="genre">Жанр</label><br>
        <select name="genre" id="genre">';
        $result = $conn->query("SELECT * FROM genres ORDER BY title ASC ");
        if($result){
          while($row = $result->fetch_assoc()) {
              echo "<option value='".$row['id']."'>".$row['title']."</option>";
          }
          $result->close();
        }
        echo '</select>';
        break;
        
      case "employee":
        echo "Сотрудника</h1><br>";
        echo '<form class="addForm" action="add.php?'. $_SERVER["QUERY_STRING"].'" method="post">';
        echo '<label for="name">Имя</label><br>
        <input required type="text" name="name" id="name" maxlength="100"><br>
        <label for="">Пол</label><br>
        <label for="male">Мужской</label>
        <input required type="radio" name="gender" id="male" value="Мужской"><br>
        <label for="female">Женский</label>
        <input required type="radio" name="gender" id="female" value="Женский"><br>
        <label for="address">Адрес</label><br>
        <input required type="text" name="address" id="address"><br>
        <label for="phone">Номер телефона</label><br>
        <input required type="tel" name="phone" id="phone" maxlength="18"><br>
        <label for="passport">Пасспортные данные</label><br>
        <input required type="text" name="passport" id="passport" maxlength="12"><br>
        <label for="position">Должность</label><br>
        <select name="position" id="position">';
        $result = $conn->query("SELECT * FROM positions");
        if($result){
          while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['id']."'>".$row['title']."</option>";
          }
          $result->close();
        }
        echo '</select><br>
        <label for="age">Возвраст</label><br>
        <input required type="number" name="age" id="age">';
        break;
  
      case "genre":
        echo "Жанра</h1><br>";
        echo '<form class="addForm" action="add.php?'. $_SERVER["QUERY_STRING"].'" method="post">';
        echo '<label for="title">Название</label><br>
        <input required type="text" name="title" id="title"><br>
        <label for="desc">Описание</label><br>
        <input required type="text" name="desc" id="desc">';
        break;
  
      case "position":
        echo "Должности</h1><br>";
        echo '<form class="addForm" action="add.php?'. $_SERVER["QUERY_STRING"].'" method="post">';
        echo ' <label for="title">Название</label><br>
        <input required type="text" name="title" id="title"><br>
        <label for="salary">Оклад</label><br>
        <input required type="number" name="salary" id="salary"><br>
        <label for="resp">Обязаности</label><br>
        <input required type="text" name="resp" id="resp"><br>
        <label for="req">Требования</label><br>
        <input required type="text" name="req" id="req">';
        break;
  
      case "publisher":
        echo "Издателя</h1><br>";
        echo '<form class="addForm" action="add.php?'. $_SERVER["QUERY_STRING"].'" method="post">';
        echo '<label for="title">Название</label><br>
        <input required type="text" name="title" id="title"><br>
        <label for="city">Город</label><br>
        <input required type="text" name="city" id="city"><br>
        <label for="address">Адрес</label><br>
        <input required type="text" name="address" id="address">';
        break;
  
    }
    if($_SERVER["QUERY_STRING"]){
      echo '<button class="doneBtn" type="submit">Готово</button></form>';
    }
  }
  else{
    echo "<script>histrory.back()</script>";
  }
  ?>
  </div>
<?php
  include "footer.php";
?>
