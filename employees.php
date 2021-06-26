<?php
  include "header.php";
  ?>
  <div class="content">
    <h1 class="head"><a href="employees.php" class="noDer">Сотрудники</a></h1>
    <?php
        switch($_SERVER["QUERY_STRING"]){
          case "fltr=nameD":
            $result = $conn->query("SELECT * FROM employees ORDER BY name ASC");
            echo "<input type='hidden' id='flt' value=1>";
            break;
          case "fltr=nameA":
            $result = $conn->query("SELECT * FROM employees ORDER BY name DESC");
            echo "<input type='hidden' id='flt' value=8>";
            break;

          case "fltr=ageD":
            $result = $conn->query("SELECT * FROM employees ORDER BY age ASC");
            echo "<input type='hidden' id='flt' value=2>";
            break;
          case "fltr=ageA":
            $result = $conn->query("SELECT * FROM employees ORDER BY age DESC");
            echo "<input type='hidden' id='flt' value=9>";
            break;

          case "fltr=genderD":
            $result = $conn->query("SELECT * FROM employees ORDER BY gender ASC");
            echo "<input type='hidden' id='flt' value=3>";
            break;
          case "fltr=genderA":
            $result = $conn->query("SELECT * FROM employees ORDER BY gender DESC");
            echo "<input type='hidden' id='flt' value=10>";
            break;

          case "fltr=addressD":
            $result = $conn->query("SELECT * FROM employees ORDER BY address ASC");
            echo "<input type='hidden' id='flt' value=4>";
            break;
          case "fltr=addressA":
            $result = $conn->query("SELECT * FROM employees ORDER BY address DESC");
            echo "<input type='hidden' id='flt' value=11>";
            break;

          case "fltr=telD":
            $result = $conn->query("SELECT * FROM employees ORDER BY telephone ASC");
            echo "<input type='hidden' id='flt' value=5>";
            break;
          case "fltr=telA":
            $result = $conn->query("SELECT * FROM employees ORDER BY telephone DESC");
            echo "<input type='hidden' id='flt' value=12>";
            break;

          case "fltr=passportD":
            $result = $conn->query("SELECT * FROM employees ORDER BY passport ASC");
            echo "<input type='hidden' id='flt' value=6>";
            break;
          case "fltr=passportA":
            $result = $conn->query("SELECT * FROM employees ORDER BY passport DESC");
            echo "<input type='hidden' id='flt' value=13>";
            break;

          case "fltr=positionD":
            $result = $conn->query("SELECT * FROM employees ORDER BY positionId ASC");
            echo "<input type='hidden' id='flt' value=7>";
            break;
          case "fltr=positionA":
            $result = $conn->query("SELECT * FROM employees ORDER BY positionId DESC");
            echo "<input type='hidden' id='flt' value=14>";
            break;
          default:
          $result = $conn->query("SELECT * FROM employees");
          echo "<input type='hidden' id='flt' value=0>";
        }
          ?>
    <div class="list">
      <div class="listRowStatic">
        <div class="listCol"><a class="noDer" href="employees.php?fltr=nameA">Имя</a></div>
          <div class="listCol"><a class="noDer" href="employees.php?fltr=ageA">Возвраст</a></div>
          <div class="listCol"><a class="noDer" href="employees.php?fltr=genderA">Пол</a></div>
          <div class="listCol"><a class="noDer" href="employees.php?fltr=addressA">Адрес</a></div>
          <div class="listCol"><a class="noDer" href="employees.php?fltr=telA">Телефон</a></div>
          <div class="listCol"><a class="noDer" href="employees.php?fltr=passportA">Пасспортные данные</a></div>
          <div class="listCol"><a class="noDer" href="employees.php?fltr=positionA">Должность</a></div>
        <div class="listCol"><a href="addEntry.php?employee">Добавить</a></div>
      </div>
      <?php
        if($result){
          while($row = $result->fetch_assoc()){
            echo "<div class='listRow'>";
            echo "<div class='listCol'>".$row["name"]."</div>";
            echo "<div class='listCol'>".$row["age"]."</div>";
            echo "<div class='listCol'>".$row["gender"]."</div>";
            echo "<div class='listCol'>".$row["address"]."</div>";
            echo "<div class='listCol'>".$row["telephone"]."</div>";
            echo "<div class='listCol'>".$row["passport"]."</div>";
            echo "<div class='listCol'>".($conn->query("SELECT title FROM positions WHERE id=".$row["positionId"] ))->fetch_all()[0][0]."</div>";
            echo '<div class="listCol"><a href="details.php?employee='.$row["id"].'">Подробнее</a> <a href="editEntry.php?employee='.$row["id"].'">Изменить</a> <a href="delete.php?employee='.$row['id'].'">Удалить</a></div>';
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