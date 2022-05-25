<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление сотрудника</title>
</head>
<body>
    <?php include_once "db.php"; 
    $querypro = "SELECT * FROM professions";
    $resultpro = mysqli_query($link, $querypro) or die(mysqli_error($link));
    for ($data1 = []; $row1 = mysqli_fetch_assoc($resultpro); $data1[] = 
		$row1); 
    ?>
    <?php 
    $querydep = "SELECT * FROM departments";
    $resultdep = mysqli_query($link, $querydep) or die(mysqli_error($link));
    for ($data2 = []; $row2 = mysqli_fetch_assoc($resultdep); $data2[] = 
		$row2); 
    ?>
<form action="" method="POST">
    <h3>ФИО</h3>
	<input name="name">
    <h3>Профессия</h3>
	<select name="profession_id" id="">
    <?php foreach ($data1 as $elem): ?>  
    <option value="<?= $elem['id'] ?>"><?= $elem['name'] ?>
        </option>
        <?php endforeach; ?>
    </select>
    <h3>Отдел</h3>
	<select name="department_id" id="">
    <?php foreach ($data2 as $elem): ?>  
    <option value="<?= $elem['id'] ?>"><?= $elem['name'] ?>
        </option>
        <?php endforeach; ?>
    </select><br><br>
	<input type="submit">
</form>
<?php
	if (!empty($_POST)) {
	$name = $_POST['name'];
	$profession_id= $_POST['profession_id'];
	$department_id = $_POST['department_id'];
	
    $querynew = "INSERT INTO personals SET 
    name='$name', profession_id='$profession_id', department_id='$department_id'"; 
    $resultnew = mysqli_query($link, $querynew) or die(mysqli_error($link));
    echo '<script>location.href="index.php";</script>';
    }
?>
</body>
</html>