<?php


try {
	$pdo = new PDO('mysql:host=localhost;dbname=dbforum', 'root', 'root');
	$pdo->query("set names 'utf8'");
} catch (PDOException $e) {
	echo "Ошибка: ".$e->getMessage();
}

function getTopics ($number=-10) {
	global $pdo;
	
		if ($number==-10) {
			$query = "SELECT id, title, author, content FROM topics 
			ORDER BY id DESC LIMIT 5;";
		} else {
			if ($number < 6) {
				$number = 6;
			}	
			$query = "SELECT id, title, author, content FROM topics WHERE id<".$number." 
			ORDER BY id DESC LIMIT 5;";
		}
	
	$res = $pdo->query($query);
		
	return $res;
}

function createTopic($user, $pass, $title, $text) {
	global $pdo;
	
	$query1 = "SELECT pass FROM users WHERE name='$user';";
	$res = $pdo->query($query1);
	$row = $res->fetch();
	
		if ($row['pass']==$pass) {
	
			$query2 = "INSERT INTO topics (title, author, content) 
			VALUES ('$title', '$user', '$text')";
			$query3 = "SELECT MAX(id) as 'id' FROM topics;";
			$res = $pdo->query($query2);
			$res = $pdo->query($query3);
			$row = $res->fetch();
			$id = $row['id'];
			$query4 = "CREATE TABLE comments".$id."(id int auto_increment primary key,
											author varchar(20),
											time_create datetime,
											content text);";
			$pdo->query($query4);
			$query5 = "INSERT INTO comments".$id." (author, time_create, content)
				VALUES ('$user', current_timestamp(), '$title');";
			$pdo->query($query5);
			
			return true;
		} else {
			return false;
		}
}

?>














