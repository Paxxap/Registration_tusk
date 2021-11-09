<?php 
session_start();
class SignIn 
{

private $login;
private $password;

function __construct ($login, $password)
    {
		$this->login = $login;
		$this->password = $password;
	}

function check_error ()
	{
		$error_fields = [];

		if ($this->login === '')
		{
			$error_fields[] = 'login';
		}
		if ($this->password === '')
		{
			$error_fields[] = 'password';
		}

		if (!empty($error_fields))
		{
			$result = [
				"status" => false,
				"type" => 1,
				"message" => "Проверьте правилность полей",
				"fields" => $error_fields
			];
			echo json_encode($result);
			die();
		}
	}
function search()
	{
		$Json = file_get_contents('bd.json');
		$data = json_decode($Json, true);
		$flag = 0;
		foreach ($data as $value)
		{
			foreach ($value as $variable)
			{
			if ($variable == $this->login) { $flag++; $_SESSION['login'] = $variable;}
			if ($variable == md5($this->password."kakfoaf3gdrgopdk4543gwgmdmvv2mpss211pe1wgw")) { $flag++;}
			}
		}
		if ($flag == 2)
		{
			$result = [
				"status" => true
			];
			echo json_encode($result);
		}else {	
			$result = [
				"status" => false,
				"message" => "Неверный логин или пароль"
			];
			echo json_encode($result);
		}
	}
}
?>