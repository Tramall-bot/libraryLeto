<?php
  include "header.php";
?>
  <div class="content">
  <?php 
  if($_SERVER["QUERY_STRING"]){
    echo "<h1 class='head'>Изменение ";
    switch(explode("=",$_SERVER["QUERY_STRING"])[0]){
      case "book":
        echo "Книги</h1><br>";
        $bRow = ($conn->query("SELECT * FROM books WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1]))->fetch_assoc();
        if($bRow){
          echo '<form class="editForm" action="edit.php?'. $_SERVER["QUERY_STRING"].'" method="post">';
          echo '<label for="title">Название</label><br>
          <input type="text" name="title" id="title" value="'.$bRow["title"].'"><br>
          <label for="author">Автор</label><br>
          <input type="text" name="author" id="author"  value="'.$bRow["author"].'"><br>
          <label for="publisher">Издатель</label><br>
          <select name="publisher" id="publisher">';
          $result = $conn->query("SELECT * FROM publishers");
          if($result){
            while($row = $result->fetch_assoc()) {
              if($bRow["publisherId"] == $row["id"]){
                echo "<option value='".$row['id']."' selected>".$row['title']."</option>";
              }else
                echo "<option value='".$row['id']."'>".$row['title']."</option>";
            }
            $result->close();
          }
          echo ' </select><br>
          <label for="pubDate">Год выпуска</label><br>
          <input type="text" name="pubDate" id="pubDate"  value="'.$bRow["publishmentYear"].'" onfocus=(this.type="date") onblur=(this.type="text") ><br>
          <label for="genre">Жанр</label><br>
          <select name="genre" id="genre">';
          $result = $conn->query("SELECT * FROM genres");
          if($result){
            while($row = $result->fetch_assoc()) {
              if($bRow["genreId"] == $row["id"]){
                echo "<option value='".$row['id']."' selected>".$row['title']."</option>";
              }else
                echo "<option value='".$row['id']."'>".$row['title']."</option>";
            }
            $result->close();
          }
          echo '</select>';
        }
        break;
        
      case "employee":
        echo "Сотрудника</h1><br>";
        $eRow = ($conn->query("SELECT * FROM employees WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1]))->fetch_assoc();
        if($eRow){
          echo '<form class="editForm" action="edit.php?'. $_SERVER["QUERY_STRING"].'" method="post">';
          echo '<label for="name">Имя</label><br>
          <input type="text" name="name" id="name"  value="'.$eRow["name"].'"><br>
          <label for="">Пол</label><br>';
          if($eRow["gender"] =="Мужской"){
            echo  '<label for="male">Мужской</label>
            <input type="radio" name="gender" id="male" value="Мужской" checked><br>
            <label for="female">Женский</label>
            <input type="radio" name="gender" id="female" value="Женский"><br>';
          }
          else{
            echo  '<label for="male">Мужской</label>
            <input type="radio" name="gender" id="male" value="Мужской"><br>
            <label for="female">Женский</label>
            <input type="radio" name="gender" id="female" value="Женский" checked><br>';
          }
          echo '<label for="address">Адрес</label><br>
          <input type="text" name="address" id="address"  value="'.$eRow["address"].'"><br>
          <label for="phone">Номер телефона</label><br>
          <input type="tel" name="phone" id="phone"  value="'.$eRow["telephone"].'"><br>
          <label for="passport">Пасспортные данные</label><br>
          <input type="text" name="passport" id="passport"  value="'.$eRow["passport"].'"><br>
          <label for="position">Должность</label><br>
          <select name="position" id="position">';
          $result = $conn->query("SELECT * FROM positions");
          if($result){
            while($row = $result->fetch_assoc()) {
              if($eRow["positionId"] == $row["id"]){
                echo "<option value='".$row['id']."' selected>".$row['title']."</option>";
              }else
              echo "<option value='".$row['id']."'>".$row['title']."</option>";
            }
            $result->close();
          }
          echo '</select><br>
          <label for="age">Возвраст</label><br>
          <input type="number" name="age" id="age"  value="'.$eRow["age"].'"">';
        }
        break;
  
      case "genre":
        echo "Жанра</h1><br>";
        $gRow = ($conn->query("SELECT * FROM genres WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1]))->fetch_assoc();
        if($gRow){
          echo '<form class="editForm" action="edit.php?'. $_SERVER["QUERY_STRING"].'" method="post">';
          echo '<label for="title">Название</label><br>
          <input type="text" name="title" id="title"   value="'.$gRow["title"].'"><br>
          <label for="desc">Описание</label><br>
          <input type="text" name="desc" id="desc"  value="'.$gRow["description"].'">';
        }
        break;
  
      case "position":
        echo "Должности</h1><br>";
        $pRow = ($conn->query("SELECT * FROM positions WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1]))->fetch_assoc();
        if($pRow){
          echo '<form class="editForm" action="edit.php?'. $_SERVER["QUERY_STRING"].'" method="post">';
          echo ' <label for="title">Название</label><br>
          <input type="text" name="title" id="title"  value="'.$pRow["title"].'"><br>
          <label for="salary">Оклад</label><br>
          <input type="number" name="salary" id="salary"  value="'.$pRow["salary"].'"><br>
          <label for="resp">Обязаности</label><br>
          <input type="text" name="resp" id="resp"  value="'.$pRow["responsibilities"].'"><br>
          <label for="req">Требования</label><br>
          <input type="text" name="req" id="req"  value="'.$pRow["requirements"].'">';
        }
        break;
  
      case "publisher":
        echo "Издателя</h1><br>";
        $pubRow = ($conn->query("SELECT * FROM publishers WHERE id=".explode("=",$_SERVER["QUERY_STRING"])[1]))->fetch_assoc();
        if($pubRow){
          echo '<form class="editForm" action="edit.php?'. $_SERVER["QUERY_STRING"].'" method="post">';
          echo '<label for="title">Название</label><br>
          <input type="text" name="title" id="title"   value="'.$pubRow["title"].'"><br>
          <label for="city">Город</label><br>
          <input type="text" name="city" id="city"  value="'.$pubRow["city"].'"><br>
          <label for="address">Адрес</label><br>
          <input type="text" name="address" id="address"  value="'.$pubRow["address"].'">';
        }
        break;
  
    }
    if($_SERVER["QUERY_STRING"]){
      echo '<button class="doneBtn" type="submit">Готово</button>
      </form>';
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