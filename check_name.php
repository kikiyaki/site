<?php   
	$user_name=$_POST['name'];

	try {
		$pdo = new PDO('mysql:host=localhost;dbname=dbforum', 'root', 'root');
		$pdo->query("set names 'utf8'");
	} catch (PDOException $e) {
		echo "Ошибка: ".$e->getMessage();
	}
    
	$query = "SELECT pass FROM users WHERE name='$user_name';";
	$res = $pdo->query($query);
	$count = $res->rowCount();
	echo $count;
?>