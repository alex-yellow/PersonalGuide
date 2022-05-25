<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Справочник профессий</title>
</head>

<body>
   <div class="main">
      <h1>Справочник профессий</h1>
   </div>
   <?php
   include_once "db.php";
   $query = "SELECT * FROM professions";
   $result = mysqli_query($link, $query) or die(mysqli_error($link));
   for (
      $data = [];
      $row = mysqli_fetch_assoc($result);
      $data[] = $row
   );
   ?>
   <table class="personals">
      <tr>
         <th>id</th>
         <th>Профессия</th>
      </tr>
      <?php foreach ($data as $elem) : ?>
         <tr>
            <td><?= $elem['id'] ?></td>
            <td><?= $elem['name'] ?></td>
            <td><?= "<a href='show.php?id=$elem[id]'>Просмотреть</a>"?></td>
            <td><?= "<a href='edit.php?id=$elem[id]'>Редактировать</a>"?></td>
            <td><?= "<a href='?del=$elem[id]'>Удалить</a>"?></td>
         </tr>
      <?php endforeach; ?>
   </table>

   <div class="footer">
      <div class="newbtn">
               <a class="new" href="new.php">Добавить</a>
      
      </div>
      </div>  

   <?php 
   $del = $_GET['del'];
   $querydel = "DELETE FROM professions WHERE id=$del";
	$resultdel = mysqli_query($link, $querydel) or die();
?> 
</body>

</html>