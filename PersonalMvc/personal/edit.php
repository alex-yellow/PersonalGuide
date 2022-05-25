<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование персонала</title>
</head>
<body>
<?php include_once "db.php"; 
	$id = $_GET['id'];
    $queryedit = "SELECT 
    personals.id, personals.name, professions.name as profession_name, departments.name as department_name
 FROM 
    personals
 LEFT JOIN professions ON professions.id=personals.profession_id
 LEFT JOIN departments ON departments.id=personals.department_id WHERE personals.id=$id";
    $resultedit = mysqli_query($link, $queryedit) or die(mysqli_error($link));
	$user = mysqli_fetch_assoc($resultedit);
?>
<form action="save.php?id=<?= $_GET['id'] ?>" method="POST">
    <h3>ФИО</h3>
	<input name="name" value="<?=$user['name']?>">
    <h3>Профессия</h3>
	<input name="profession_name" value="<?=$user['profession_name']?>">
    <h3>Отдел</h3>
	<input name="department_name" value="<?=$user['department_name'] ?>"><br><br>
	<input type="submit">
</form>
</body>
</html>