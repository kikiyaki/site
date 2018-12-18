<?php

$name = $_REQUEST['name'];
$pass = $_REQUEST['pass'];

try {
	$pdo = new PDO('mysql:host=localhost;dbname=dbforum', 'root', 'root');
	$pdo->query("set names 'utf8'");
} catch (PDOException $e) {
	echo "Не удается установить соединение с базой данных";
}

$query = "INSERT INTO users (name, pass) VALUES ('$name', '$pass');";
$pdo->query($query);

setcookie("user", $name, time()+25000000);
setcookie("pass", $pass, time()+25000000);

header('Location:list.php');
exit();
?>