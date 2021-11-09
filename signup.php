<?php
require ('signup_class.php');


$reg = new SignUp ($_POST['login'], $_POST['password'], $_POST['password_confirm'], $_POST['name'], $_POST['email']);
$reg->uniqe_info();
$reg->validate();
$reg->signup();


?>