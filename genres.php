<?php
  include "header.php";
  ?>
  <div class="content">
    <h1 class="head"><a href="genres.php" class="noDer">Жанры</a></h1>
    <?php
        switch($_SERVER["QUERY_STRING"]){
          case "fltr=titleD":
            $result = $conn->query("SELECT * FROM genres ORDER BY title ASC");
            echo "<input type='hidden' id='flt' value=1>";
            break;
          case "fltr=titleA":
            $result = $conn->query("SELECT * FROM genres ORDER BY title DESC");
            echo "<input type='hidden' id='flt' value=4>";
            break;

          case "fltr=descD":
            $result = $conn->query("SELECT * FROM genres ORDER BY description ASC");
            echo "<input type='hidden' id='flt' value=2>";
            break;
          case "fltr=descA":
            $result = $conn->query("SELECT * FROM genres ORDER BY description DESC");
            echo "<input type='hidden' id='flt' value=5>";
            break;

          case "fltr=countD":
            $result = $conn->query("SELECT * FROM genres ORDER BY count ASC");
            echo "<input type='hidden' id='flt' value=3>";
            break;
          case "fltr=countA":
            $result = $conn->query("SELECT * FROM genres ORDER BY count DESC");
            echo "<input type='hidden' id='flt' value=6>";
            break;

          default:
          $result = $conn->query("SELECT * FROM genres");
          echo "<input type='hidden' id='flt' value=0>";
        }
        ?>
    <div class="list">
      <div class="listRowStatic">
        
        
        <div class="listCol"><a class="noDer" href="genres.php?fltr=titleA">Наименование </a></div>
        <div class="listCol"><a class="noDer" href="genres.php?fltr=descA">Описание</a></div>
        <div class="listCol"><a class="noDer" href="genres.php?fltr=countA">Количество книг жанра</a></div>
        <div class="listCol"><a href="addEntry.php?genre">Добавить</a></div>
      </div>

      <?php
        
        if($result){
          while($row = $result->fetch_assoc()){
            echo "<div class='listRow'>";
            echo "<div class='listCol'>".$row["title"]."</div>";
            echo "<div class='listCol'>".$row["description"]."</div>";
            echo "<div class='listCol'>".$row["count"]."</div>";
            echo '<div class="listCol"><a href="details.php?genre='.$row["id"].'">Подробнее</a> <a href="editEntry.php?genre='.$row["id"].'">Изменить</a> <a href="delete.php?genre='.$row['id'].'">Удалить</a></div>';
            echo "</div>";
          }
        }
      ?>
    </div>
  </div>
  <script src="filtr.js"></script>
<?php
  include "footer.php";
?>