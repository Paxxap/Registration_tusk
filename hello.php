<?php session_start();
require ('bd.php');
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form action="index.php" method ="post">
        Привет <?echo $_SESSION['login'];?>
        <button type="submit" class="login-btn" >Назад</button>
    </form>
        <? if ($_SESSION['login'] = 'admin1'): ?>
        <form action="" method ="post">
        	<p> </p>
        	<label>Информация в базе данных</label>
        	<button type="submit" name="show">Вывести</button>
        	<p> </p>
        	<label>Введите информацию из базы данных, чтобы ее изменить</label>
        	<input type="text" name="update_info" placeholder="Введите данные, которые хотите изменить">
        	<input type="text" name="new_update_info" placeholder="Введите новые данные">
        	<input type="text" name="update_key" placeholder="Введите ключ данных, которые хотите изменить">
        	<button type="submit" name="update">Изменить</button>
        	<p> </p>
        	<label>Введите информацию из базы данных для удаления </label>
        	<input type="text" name="del_info" placeholder="Введите данные">
        	<button type="submit" name="del">Удалить</button>
        </form>
       <? endif;?> 
</body>
</html>