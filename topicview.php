<html>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<head>
	<title>Тема</title>
	</head>
<body>
	<div id="container">
		<div id="header">
			<img align="left" src="log.png"/>
		</div>
	
		<div id="navigation">
		<table>
		<tr>
		<td class="ref" align="center" width="33%">
			<a href="inf.html">О форуме</a>
		</td>
	
		<td class="ref" align="center" width="33%">
			<a href="list.php">Темы</a>
		</td>
		
		<td class="ref" align="center"  width="34%">
			<a href="enter.html">Вход/Регистрация</a>
		</td>
		</tr>
		</table>
		</div>
	
		<div id="content">
			<font color="2C3B48">
				<h2><?=$inf['title']?></h2>
				<a><?=$inf['author']?></a><br/>
				<a><?=$inf['content']?></a><br/>
			</font>
			<hr/>
			<hr/>
<?php 
foreach ($comments as $comment) { 
	$id = $comment['id'];
?>
<table>
	<tr>
	<td>
		<table>
		<tr>
			<font color="2C3B48">
				<?=$comment['author']?>
			</font>
			<br/>
		</tr>
		
		<tr>
			<font color="2C3B48">
				<?=$comment['time_create']?>
			</font>
			<br/>
		</tr>
		</table>
	</td>

	<td align="left">
		<font color="2C3B48">
			<?=$comment['content']?>
		</font>
		<br/>
	</td>
	</tr>
</table>
<hr/>
<?php 
}
 ?>

	<form action="topic.php" method="get">
		<input type="text" value=<?=$inf['id']?> name="topic_id" hidden="true">
		<input type="text" value=<?=$id?> name="id" hidden="true">
		<input type="submit" value="Назад" name="back">
		<input type="submit" value="Дальше" name="next">
	</form>

	<form action="topic.php" method="post">
		<input type="text" value=<?=$inf['id']?> name="topic_id" hidden="true">
		<font color="2C3B48">
			<b>Оставить комментарий</b>
		</font>
		</br>
	<textarea rows="5" cols="80" name="text">
	</textarea>
	</br>
	<input type="submit" value="Отправить">
	</form> 

		</div>
		
		<div id="footer" align="center">
			<font color="2C3B48">
			2018, Kirill Yakovlev
			</font>
		</div>
	</div>
</body>
</html>












