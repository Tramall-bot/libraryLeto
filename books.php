<?php
  include "header.php";
  ?>
  <div class="content">
    <h1 class="head"><a href="books.php" class="noDer">Книги</a></h1>
    <?php
       switch($_SERVER["QUERY_STRING"]){
        case "fltr=titleD":
          $result = $conn->query("SELECT * FROM books ORDER BY title ASC");
          echo "<input type='hidden' id='flt' value=1>";
          break;
        case "fltr=titleA":
          $result = $conn->query("SELECT * FROM books ORDER BY title DESC");
          echo "<input type='hidden' id='flt' value=6>";
          break;

        case "fltr=authorD":
          $result = $conn->query("SELECT * FROM books ORDER BY author ASC");
          echo "<input type='hidden' id='flt' value=2>";
          break;
        case "fltr=authorA":
          $result = $conn->query("SELECT * FROM books ORDER BY author DESC");
          echo "<input type='hidden' id='flt' value=7>";
          break;

        case "fltr=pubD":
          $result = $conn->query("SELECT * FROM books ORDER BY publisherId ASC");
          echo "<input type='hidden' id='flt' value=3>";
          break;
        case "fltr=pubA":
          $result = $conn->query("SELECT * FROM books ORDER BY publisherId DESC");
          echo "<input type='hidden' id='flt' value=8>";
          break;
        
        case "fltr=pubYD":
          $result = $conn->query("SELECT * FROM books ORDER BY publishmentYear ASC");
          echo "<input type='hidden' id='flt' value=4>";
          break;
        case "fltr=pubYA":
          $result = $conn->query("SELECT * FROM books ORDER BY publishmentYear DESC");
          echo "<input type='hidden' id='flt' value=9>";
          break;

        case "fltr=genD":
          $result = $conn->query("SELECT * FROM books ORDER BY genreId ASC");
          echo "<input type='hidden' id='flt' value=5>";
          break;
        case "fltr=genA":
          $result = $conn->query("SELECT * FROM books ORDER BY genreId DESC");
          echo "<input type='hidden' id='flt' value=10>";
          break;
          
        default:
        $result = $conn->query("SELECT * FROM books");
        echo "<input type='hidden' id='flt' value=0>";
       }

    ?>
    <div class="list">
      <div class="listRowStatic">
        <div class="listCol"><a class="noDer" href="books.php?fltr=titleA">Наименование</a></div>
        <div class="listCol"><a class="noDer" href="books.php?fltr=authorA">Автор</a></div>
        <div class="listCol"><a class="noDer" href="books.php?fltr=pubA">Издатель</a></div>
        <div class="listCol"><a class="noDer" href="books.php?fltr=pubYA">Год издания</a></div>
        <div class="listCol"><a class="noDer" href="books.php?fltr=genA">Жанр</a></div>

        <div class="listCol"><a href="addEntry.php?book">Добавить</a></div>
      </div>

      <?php
        
        if($result){
          while($row = $result->fetch_assoc()){
            echo "<div class='listRow'>";
            echo "<div class='listCol'>".$row["title"]."</div>";
            echo "<div class='listCol'>".$row["author"]."</div>";
            $res = $conn->query("SELECT title as t FROM publishers WHERE id=".$row["publisherId"] );
            if($res){
              $pubTitle=$res->fetch_assoc();
              $pubTitle = $pubTitle["t"];
            }
            echo "<div class='listCol'>".$pubTitle."</div>";
            echo "<div class='listCol'>".$row["publishmentYear"]."</div>";
            echo "<div class='listCol'>".($conn->query("SELECT title FROM genres WHERE id=".$row["genreId"] ))->fetch_all()[0][0]."</div>";
            echo '<div class="listCol"><a href="details.php?book='.$row["id"].'">Подробнее</a> <a href="editEntry.php?book='.$row["id"].'">Изменить</a> <a href="delete.php?book='.$row['id'].'">Удалить</a></div>';
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