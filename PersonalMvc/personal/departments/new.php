<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление отдела</title>
</head>
<body>
    <?php include_once "db.php"; ?>
<form action="" method="POST">
    <h3>Отдел</h3>
	<input name="name">
    <input type="submit">
</form>
<?php
	if (!empty($_POST)) {
	$name = $_POST['name'];
   
    $querynew = "INSERT INTO departments SET 
    name='$name'"; 
    $resultnew = mysqli_query($link, $querynew) or die(mysqli_error($link));
    echo '<script>location.href="index.php";</script>';
}
?>
</body>
</html>