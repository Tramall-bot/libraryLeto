<?php
  include "header.php";
  ?>
  <div class="content">
    <h1 class="head">Читатели</h1>
    <div class="list">
      <div class="listRowStatic">
        <div class="listCol">Имя</div>
        <div class="listCol">Дата рождения</div>
        <div class="listCol">Пол</div>
        <div class="listCol">Адрес</div>
        <div class="listCol">Телефон</div>
        <div class="listCol">Пасспортные данные</div>

        <div class="listCol"><a href="addEntry.php?reader">Добавить</a></div>
      </div>

      <?php
        $result = $conn->query("SELECT * FROM readers");
        if($result){
          while($row = $result->fetch_assoc()){
            echo "<div class='listRow'>";
            echo "<div class='listCol'>".$row["name"]."</div>";
            echo "<div class='listCol'>".$row["birthYear"]."</div>";
            echo "<div class='listCol'>".$row["gender"]."</div>";
            echo "<div class='listCol'>".$row["address"]."</div>";
            echo "<div class='listCol'>".$row["telephone"]."</div>";
            echo "<div class='listCol'>".$row["passport"]."</div>";
            echo '<div class="listCol"><a href="details.php?reader='.$row["id"].'">Подробнее</a> <a href="editEntry.php?reader='.$row["id"].'">Изменить</a> <a href="delete.php?reader='.$row['id'].'">Удалить</a></div>';
            echo "</div>";
          }
        }
      ?>
    </div>
  </div>
  <?php
  include "footer.php";
?>