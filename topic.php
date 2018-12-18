<?php
require_once("topicmodel.php");

	if (isset($_REQUEST['text'])) {
		if (isset($_COOKIE['user'], $_COOKIE['pass'])) {
			
			$check = setComment($_REQUEST['topic_id'], $_COOKIE['user'], 
			$_COOKIE['pass'], $_REQUEST['text']);
		
			if (!$check) {
				echo "<h3>Ошибка cookie, попробуйте войти заново: </h3>";
				echo "<a href='index.html'>Вход<a>";
			}
		} else {
			echo "<h4 style='color:red;'>Чтобы оставить комментарий, войдите:</h4>";
			echo "<a href='index.html'>Вход<a>";
		}
	}

$res = getTopic($_REQUEST['topic_id']);
$inf = $res->fetch();

	if (isset($_REQUEST['next'])) {
		$comments = getComments($_REQUEST['topic_id'], $_REQUEST['id']);
	} else { 
		if (isset($_REQUEST['back'])) {
			$comments = getComments($_REQUEST['topic_id'], $_REQUEST['id']+10);
		} else {
			$comments = getComments($_REQUEST['topic_id']);	
		}
	}

include("topicview.php");

?>