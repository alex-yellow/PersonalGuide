<?php
    include_once "db.php";
	$id = $_GET['id'];
	$name = $_POST['name'];
	$profession_name = $_POST['profession_name'];
	$department_name = $_POST['department_name'];
    $queryup = "UPDATE personals, professions, departments SET
		personals.name='$name', professions.name='$profession_name', departments.name='$department_name'
	WHERE personals.id=$id";
    $resultup=mysqli_query($link, $queryup) or die(mysqli_error($link));
    echo 'юзер успешно изменен!';
    echo '<script>location.href="index.php";</script>';
?>