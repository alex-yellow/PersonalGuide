<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Справочник персонала</title>
</head>

<body>
   <div class="main">
      <h1>Справочник персонала</h1>
   </div>
   <?php
   include_once "db.php";
   $query = "SELECT 
   personals.id, personals.name, professions.name as profession_name, departments.name as department_name
FROM 
   personals
LEFT JOIN professions ON professions.id=personals.profession_id
LEFT JOIN departments ON departments.id=personals.department_id";
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
         <th>Имя</th>
         <th>Профессия</th>
         <th>Отдел</th>
      </tr>
      <?php foreach ($data as $elem) : ?>
         <tr>
            <td><?= $elem['id'] ?></td>
            <td><?= $elem['name'] ?></td>
            <td><?= $elem['profession_name'] ?></td>
            <td><?= $elem['department_name'] ?></td>
            <td><?= "<a href='show.php?id=$elem[id]'>Просмотреть</a>" ?></td>
            <td><?= "<a href='edit.php?id=$elem[id]'>Редактировать</a>" ?></td>
            <td><?= "<a href='?del=$elem[id]'>Удалить</a>" ?></td>
         </tr>
      <?php endforeach; ?>
   </table>

   <div class="footer">
      <div class="newbtn">
         <a class="new new1" href="new.php">Добавить нового сотрудника</a><br><br><br><br><br>
         <a class="new new2" href="professions/index.php">Справочник профессий</a><br><br><br><br><br>
         <a class="new new3" href="departments/index.php">Справочник отделов</a>
     </div>
   </div>

   <?php
   $del = $_GET['del'];
   $querydel = "DELETE FROM personals WHERE id=$del";
   $resultdel = mysqli_query($link, $querydel) or die();
   ?>
</body>

</html>