<?php
	require_once("indexmodel.php");

	if (isset($_COOKIE['user'], $_COOKIE['pass'])) {
		$check = checkPass($_COOKIE['user'], $_COOKIE['pass']);
		
		if (!$check) {
			echo "Ошибка cookie, попробуйте войти заново";
		} else {
			header('Location:list.php');
			exit();
		}
		
	} else {
		header('Location:enter.html');
		exit();
	}
?>
