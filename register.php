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
	 <!-- Форма регистрации -->

    <form>
        <label>Имя</label>
        <input type="text" name="name" placeholder="Введите имя">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите логин">
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите почту">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit" class="register-btn">Зарегистрироваться</button>
        <p>
            У вас есть аккаунт? - <a href="index.php"> Авторизация </a>
        </p>
        <p class="msg none"> </p>
        
    </form>
    <script src="/js/jquery-3.4.1.min.js"> </script> 
    <script src="/js/main.js"> </script> 
</body>
</html>