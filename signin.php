<?php
session_start(); 

require('signin_class.php');


$avt = new SignIn ($_POST['login'], $_POST['password']);
$avt -> check_error();
$avt -> search();


?>