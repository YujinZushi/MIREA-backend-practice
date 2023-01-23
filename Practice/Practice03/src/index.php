<?php
    session_start();
    require_once 'connect.php';

    if(isset($_POST["login-btn"])) {
        if (isset($_SESSION['user'])) {
            header('Location: profile.php');
        }
        if (empty($_POST['name']) || empty($_POST['paswd'])) {
            echo '<script>alert("Неверные данные!")</script>';
        } else {
            if ($query = $connect->prepare('SELECT user_id, name, password FROM users WHERE name = ? AND password = ?')) {
                $query->bind_param('ss', $_POST['name'], $_POST['paswd']);
                $query->execute();
                $query->store_result();
                if ($query->num_rows > 0) {
                    session_regenerate_id();
                    $query->bind_result($id, $name, $password);
                    $query->fetch();
                    $_SESSION['user'] = [
                        "id" => $id,
                        "name" => $name,
                        "pass" => $password
                    ];
                    header('Location: profile.php');
                } else {
                    echo '<script>alert("Неверный логин или пароль")</script>';
                }
                $query->close();
            }
        }                     
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
</head>
<body>
<div style="display: flex;
    justify-content: space-between;
	">
		<h1>Авторизация</h1>
		<div style="display: flex; width: 66%;
		justify-content: space-evenly;
		">
			<a href="content.html"><p>Главная</p></a>
			<a href="about.html"><p>О нас</p></a>
		</div>
	</div>
    <form method = "post">
        <input type="text" name="name" placeholder="Логин"/>	
        <input type="password" name="paswd" placeholder="Пароль"/>
        <input type="submit" value="Войти" class="btn-login" name ="login-btn"/>
    </form>
</body>
</html>