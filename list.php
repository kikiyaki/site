<?php
require_once("listmodel.php");

	if (isset($_REQUEST['text'])) {
		if (isset($_COOKIE['user'], $_COOKIE['pass'])) {
			$check = createTopic($_COOKIE['user'], 
			$_COOKIE['pass'], $_REQUEST['title'], $_REQUEST['text']);
		
				if (!$check) {
					echo "<h3>Ошибка cookie, попробуйте войти заново: </h3>";
					echo "<a href='index.html'>Вход<a>";
				}
		} else {
			echo "<h4 style='color:red;'>Чтобы создать тему, войдите:</h4>";
			echo "<a href='index.html'>Вход<a>";
		}
	}

	if (isset($_REQUEST['next'])) {
		$topics = getTopics($_REQUEST['id']);
	} else { 
		if (isset($_REQUEST['back'])) {
			$topics = getTopics($_REQUEST['id']+10);
		} else {
			$topics = getTopics();	
		}
	}

include("listview.php");

?>