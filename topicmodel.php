<?php

try {
	$pdo = new PDO('mysql:host=localhost;dbname=dbforum', 'root', 'root');
	 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$pdo->query("set names 'utf8'");
} catch (PDOException $e) {
	echo "Ошибка: ".$e->getMessage();
}

function getTopic($id) {
	global $pdo;
	
	$query = "SELECT * FROM topics WHERE id=".$id.";";
	
	$res = $pdo->query($query);
		
	return $res;
}

function getComments($topic_id, $number=-10) {
	global $pdo;
		if ($number==-10) {
			$query = "SELECT * FROM comments".$topic_id." 
			ORDER BY id DESC LIMIT 5;";
		} else {
			if ($number < 6) {
				$number = 6;
			}	
		
		$query = "SELECT * FROM comments".$topic_id." 
		WHERE id<".$number." ORDER BY id DESC LIMIT 5;";
		}
		$res = $pdo->query($query);
		
		return $res;
}

function setComment($topic_id, $user, $pass, $text) {
	global $pdo;
	
	$query1 = "SELECT pass FROM users WHERE name='$user';";
	$res = $pdo->query($query1);
	$row = $res->fetch();
		if ($row['pass']==$pass) {
	
			$query2 = "INSERT INTO comments".$topic_id." 
			(author, time_create, content) 
			VALUES ('$user', current_timestamp(), '$text')";
			$res = $pdo->query($query2);
			
			return true;
		} else {
			return false;
		}
}
?>







