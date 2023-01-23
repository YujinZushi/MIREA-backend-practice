<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: index.php');
	exit;
}
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Треклист</title>
</head>
<body>
	<div style="display: flex;
    justify-content: space-between;
	">
		<h1>Треклист</h1>
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
    <?php
		$result=$connect->query("SELECT * FROM tracks");
		while ($row = mysqli_fetch_assoc($result)) 
		   	{
		   		echo "<p>" . "<a>" . $row['name'] . ", " . "</a>" . $row['duration'] . " сек" . "</p>";
		   	}
		?>
</body>
</html>