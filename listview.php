<html>
	<link href="css/style.css" rel="stylesheet" type="text/css">
		<head>
			<title>Темы</title>
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
				<h2>Темы</h2>
				</font>
			<hr/>
	<?php 
	foreach ($topics as $topic) { ?>
		<table>
		<tr>
		<td  class="ref">
			<font color="2C3B48">
				№<?=$id=$topic['id']?>
			</font>
			<a href=topic.php?topic_id=<?=$id?>><?=$topic['title']?> -

			Автор: <?=$topic['author']?></a>

		</td>
		</tr>
		
		<tr>
		<td>
			<font color="2C3B48">
			<?=$topic['content']?>
			</font>
		</td>
		</tr>
		</table>
		<br/>
		<hr/>
<?php 
}
 ?>
	
	<form action="list.php" method="get">
		<input type="text" value=<?=$id?> name="id" hidden="true">
		<input type="submit" value="Назад" name="back">
		<input type="submit" value="Дальше" name="next">
	</form>

	<form action="list.php" method="post">
		<font color="2C3B48">
		<b>Создать обсуждение</b>
		</font>
		</br>
		<textarea rows="2"  name="title" placeholder="Название"></textarea></br>
		<textarea rows="5"  name="text" placeholder="Текст"></textarea></br>
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