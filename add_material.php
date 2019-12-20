<?php
session_start();
ob_start();
if($_SESSION['login'] == NULL){
	exit('нет прав');
}
include ("bd.php");

if(($_POST['name'] == NULL) || ($_POST['item'] == NULL) || ($_POST['description'] == NULL) || ($_FILES['pdf']['size'] == 0)){
	$_SESSION['warning'] = "Не все данные введены.";
    header('Location: '. 'add.php');
    ob_end_flush();
    exit();
}

$name = $_POST['name'];
$item = $_POST['item'];
$description = $_POST['description'];
$sql = mysqli_query($db, "INSERT INTO `files`(`name`, `item`, `description`, `author`) VALUES ('{$name}','{$item}','{$description}', '{$_SESSION['login']}')");
$sql = mysqli_query($db, "SELECT * FROM `files` ORDER BY id DESC LIMIT 1");
move_uploaded_file($_FILES["pdf"]["tmp_name"], "fales/" . (mysqli_fetch_array($sql)['id']) . ".pdf");


$sql = mysqli_query($db, "SELECT * FROM `files` ORDER BY id DESC LIMIT 1");
    header('Location: '. 'item.php?id=' . mysqli_fetch_array($sql)['id']);
    ob_end_flush();
    exit();
exit('Успех');
?>