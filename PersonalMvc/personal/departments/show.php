<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Страница отдела</title>
</head>
<body>
    <?php 
    include_once "db.php";
    	$id = $_GET['id'];
        $queryshow = "SELECT * FROM departments WHERE id=$id";
        $resultshow = mysqli_query($link, $queryshow) or die(mysqli_error($link));
        $department = mysqli_fetch_assoc($resultshow);
    ?>
<div>
		<h1>Отдел:</h1> <h2 class="name"><?=$department['name']?></h2>
</div>
</div>
</body>
</html>