<?php
  include "header.php";
  ?>
  <div class="content">
    <h1 class="head"><a href="publishers.php" class="noDer">Издательства</a></h1>
    <?php
        switch($_SERVER["QUERY_STRING"]){
          case "fltr=titleD":
            $result = $conn->query("SELECT * FROM publishers ORDER BY title ASC");
            echo "<input type='hidden' id='flt' value=1>";
            break;
          case "fltr=titleA":
            $result = $conn->query("SELECT * FROM publishers ORDER BY title DESC");
            echo "<input type='hidden' id='flt' value=4>";
            break;

          case "fltr=cityD":
            $result = $conn->query("SELECT * FROM publishers ORDER BY city ASC");
            echo "<input type='hidden' id='flt' value=2>";
            break;
          case "fltr=cityA":
            $result = $conn->query("SELECT * FROM publishers ORDER BY city DESC");
            echo "<input type='hidden' id='flt' value=5>";
            break;

          case "fltr=addressD":
            $result = $conn->query("SELECT * FROM publishers ORDER BY address ASC");
            echo "<input type='hidden' id='flt' value=3>";
            break;
          case "fltr=addressA":
            $result = $conn->query("SELECT * FROM publishers ORDER BY address DESC");
            echo "<input type='hidden' id='flt' value=6>";
            break;
          default:
           $result = $conn->query("SELECT * FROM publishers");

      }
    ?>
    <div class="list">
      <div class="listRowStatic">
        <div class="listCol"><a class="noDer" href="publishers.php?fltr=titleA">Наименование</a></div>
        <div class="listCol"><a class="noDer" href="publishers.php?fltr=cityA">Город</a></div>
        <div class="listCol"><a class="noDer" href="publishers.php?fltr=addressA">Адрес</a></div>


        <div class="listCol"><a href="addEntry.php?publisher">Добавить</a></div>
      </div>

      <?php
        if($result){
          while($row = $result->fetch_assoc()){
            echo "<div class='listRow'>";
            echo "<div class='listCol'>".$row["title"]."</div>";
            echo "<div class='listCol'>".$row["city"]."</div>";
            echo "<div class='listCol'>".$row["address"]."</div>";
            echo '<div class="listCol"><a href="details.php?publisher='.$row["id"].'">Подробнее</a> <a href="editEntry.php?publisher='.$row["id"].'">Изменить</a> <a href="delete.php?publisher='.$row['id'].'">Удалить</a></div>';
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