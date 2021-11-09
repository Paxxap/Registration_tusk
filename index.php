<?php
 session_start(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="main.css">
    <link rel="shortcut icon" href="#">
</head>
<body>
	 <!-- Форма авторизации -->
    <form>
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit" class="login-btn">Войти</button>
        <p>
        	У вас нет аккаунта? - <a href="register.php"> Регистрация </a>
        </p>
            <p class="msg none"> </p>
    </form>


<script src="/js/jquery-3.4.1.min.js"> </script> 
<script src="/js/main.js"> </script> 

</body>
</html>