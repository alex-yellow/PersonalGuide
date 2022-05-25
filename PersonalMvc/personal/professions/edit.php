<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование профессии</title>
</head>
<body>
<?php include_once "db.php"; 
	$id = $_GET['id'];
    $queryedit = "SELECT * FROM professions WHERE id=$id";
    $resultedit = mysqli_query($link, $queryedit) or die(mysqli_error($link));
	$profession = mysqli_fetch_assoc($resultedit);
?>
<form action="save.php?id=<?= $_GET['id'] ?>" method="POST">
    <h3>Профессия</h3>
	<input name="name" value="<?=$profession['name']?>">
	<input type="submit">
</form>
</body>
</html>