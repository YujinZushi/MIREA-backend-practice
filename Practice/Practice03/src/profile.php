<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Профиль</title>
</head>
<body>
	<div style="display: flex;
    justify-content: space-between;
	">
		<h1>Профиль пользователя</h1>
		<div style="display: flex; width: 66%;
		justify-content: space-evenly;
		">
			<a href="content.html"><p>Главная</p></a>
			<a href="index.php"><p>Профиль</p></a>
			<a href="tracklist.php"><p>Треклист</p></a>
			<a href="about.html"><p>О нас</p></a>
			<a href="logout.php"><p>Выход</p></a>
		</div>
	</div>
	<p>Идентификатор: <?=$_SESSION['user']['id']?></p>    
    <p>Имя: <?=$_SESSION['user']['name']?></p>
	<p>Пароль: <?=$_SESSION['user']['pass']?></p>
</body>
</html>