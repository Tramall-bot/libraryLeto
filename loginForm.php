<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Библиотека</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="content">
    <h1 class="head" style="margin-top:3%">Вход</h1>
    <h2><a class="head" onclick='history.back()'>Назад</a></h2>
    <?php
      if($_SERVER["QUERY_STRING"] == "err"){
        echo "<h2 style='color:red' class='head'>Ошибка при вводе</h2>";
      }
    ?>
    <form action="login.php" method="post" class="loginForm">
      <label for="log">Логин</label><br>
      <input type="text" name="log" id="log" required><br>
      <label for="pass">Пароль</label><br>
      <input type="password" name="pass" id="pass" required><br>
      <button class="doneBtn" type="submit">Готово</button>
    </form>
  </div>  
</body>
</html>
