<?php

try {
	$pdo = new PDO('mysql:host=localhost;dbname=dbforum', 'root', 'root');
	$pdo->query("set names 'utf8'");
} catch (PDOException $e) {
	echo "Ошибка: ".$e->getMessage();
}

function checkPass($user, $pass) {
	global $pdo;
	
	$query = "SELECT pass FROM users WHERE name='$user';";
	$res = $pdo->query($query);
	$row = $res->fetch();
	
	if ($row['pass']==$pass) {
		return true;
	} else {
		return false;
	}
}
?>