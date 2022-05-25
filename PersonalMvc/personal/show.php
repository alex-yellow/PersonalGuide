<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Страница сотрудника</title>
</head>
<body>
    <?php 
    include_once "db.php";
    	$id = $_GET['id'];
        $queryshow = "SELECT personals.name, professions.name as profession_name, departments.name as department_name
FROM 
   personals 
LEFT JOIN professions ON professions.id=personals.profession_id
LEFT JOIN departments ON departments.id=personals.department_id WHERE personals.id=$id";
        $resultshow = mysqli_query($link, $queryshow) or die(mysqli_error($link));
        $user = mysqli_fetch_assoc($resultshow);
    ?>
<div>
		<h1>ФИО:</h1> <h2 class="name"><?=$user['name']?></h2>
</div>
	<div>
		<h1>Профессия:</h1> <h2 class="profession"><?=$user['profession_name']  ?></h2>
		<h1>Отдел:</h1> <h2 class="department"><?=$user['department_name'] ?></h2>
</div>
</div>
</body>
</html>