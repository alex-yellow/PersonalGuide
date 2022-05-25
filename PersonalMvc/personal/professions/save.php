<?php
    include_once "db.php";
	$id = $_GET['id'];
	$name = $_POST['name'];
    $queryup = "UPDATE professions SET
		name='$name' WHERE id=$id";
    $resultup=mysqli_query($link, $queryup) or die(mysqli_error($link));
    echo 'Профессия успешно изменена!';
    echo '<script>location.href="index.php";</script>';
?>