<?php
  include "header.php";
  ?>
  <div class="content">
    <h1 class="head"><a href="positions.php" class="noDer">Должности</a></h1>
    <?php
        switch($_SERVER["QUERY_STRING"]){
          case "fltr=titleD":
            $result = $conn->query("SELECT * FROM positions ORDER BY title ASC");
            echo "<input type='hidden' id='flt' value=1>";
            break;
          case "fltr=titleA":
            $result = $conn->query("SELECT * FROM positions ORDER BY title DESC");
            echo "<input type='hidden' id='flt' value=5>";
            break;

          case "fltr=salaryD":
            $result = $conn->query("SELECT * FROM positions ORDER BY salary ASC");
            echo "<input type='hidden' id='flt' value=2>";
            break;
          case "fltr=salaryA":
            $result = $conn->query("SELECT * FROM positions ORDER BY salary DESC");
            echo "<input type='hidden' id='flt' value=6>";
            break;

          case "fltr=respD":
            $result = $conn->query("SELECT * FROM positions ORDER BY responsibilities ASC");
            echo "<input type='hidden' id='flt' value=3>";
            break;
          case "fltr=respA":
            $result = $conn->query("SELECT * FROM positions ORDER BY responsibilities DESC");
            echo "<input type='hidden' id='flt' value=7>";
            break;
          
          case "fltr=reqD":
            $result = $conn->query("SELECT * FROM positions ORDER BY requirements ASC");
            echo "<input type='hidden' id='flt' value=4>";
            break;
          case "fltr=reqA":
            $result = $conn->query("SELECT * FROM positions ORDER BY requirements DESC");
            echo "<input type='hidden' id='flt' value=8>";
            break;
          default:
          $result = $conn->query("SELECT * FROM positions");
          echo "<input type='hidden' id='flt' value=0>";
        }
        ?>
    <div class="list">
      <div class="listRowStatic">
        <div class="listCol"><a class="noDer" href="positions.php?fltr=titleA">Наименование должности</a></div>
        <div class="listCol"><a class="noDer" href="positions.php?fltr=salaryA">Оклад</a></div>
        <div class="listCol"><a class="noDer" href="positions.php?fltr=respA">Обязаности</a></div>
        <div class="listCol"><a class="noDer" href="positions.php?fltr=reqA">Требования</a></div>

        <div class="listCol"><a href="addEntry.php?position">Добавить</a></div>
      </div>
        <?php
        if($result){
          while($row = $result->fetch_assoc()){
            echo "<div class='listRow'>";
            echo "<div class='listCol'>".$row["title"]."</div>";
            echo "<div class='listCol'>".$row["salary"]."</div>";
            echo "<div class='listCol'>".$row["responsibilities"]."</div>";
            echo "<div class='listCol'>".$row["requirements"]."</div>";
            echo '<div class="listCol"><a href="details.php?position='.$row["id"].'">Подробнее</a> <a href="editEntry.php?position='.$row["id"].'">Изменить</a> <a href="delete.php?position='.$row['id'].'">Удалить</a></div>';
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