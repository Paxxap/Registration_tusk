<?php 
class SignUp {

	private $login;
	private $password;
	private $password_confirm;
	private $name;
	private $email;

 function __construct ($login, $password, $password_confirm, $name, $email)
    {
		$this->login = $login;
		$this->password = $password;
		$this->password_confirm = $password_confirm;
		$this->name = $name;
		$this->email = $email;
	}
function uniqe_info()
 	{
 		$flag = 0;
 		$content = file_get_contents('bd.json');
 		$data = json_decode($content, true);
 		foreach ($data as $value)
		{
			foreach ($value as $variable)
			{
				if ($variable == $this->login) { $flag++;}
				if ($variable == $this->email) { $flag++;}
			}
		}
		return $flag;
 	}
 	function validate()
 	{
 		$error_fields = [];

		if ($this->login === '' || mb_strlen($this->login) < 6)
		{
			$error_fields[] = 'login';
		}
		if ($this->password === '' ||  mb_strlen($this->password) < 6 || !preg_match('/[A-zА-я0-9]+/', $this->password))
		{
			$error_fields[] = 'password';
		}
		if ($this->password_confirm === '')
		{
			$error_fields[] = 'password_confirm';
		}
		if ($this->email === '' || !filter_var($this->email, FILTER_VALIDATE_EMAIL))
		{
			$error_fields[] = 'email';
		}
		if ($this->name === '' ||  mb_strlen($this->name) > 2 || !preg_match('/[A-zА-я]/', $this->name))
		{
			$error_fields[] = 'name';
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
		if ($this->uniqe_info() != 0)
		{
			$result = [
				"status" => false,
				"message" => "Введены не уникальные данные",
				];
			echo json_encode($result);
			die();
		}
 	}
 	function signup ()
 	{
		 if ($this->password == $this->password_confirm)
		{
			$this->password = md5 ($this->password."kakfoaf3gdrgopdk4543gwgmdmvv2mpss211pe1wgw");
			$result = array(
			name => $this->name,
			login => $this->login,
			email => $this->email,
			password => $this->password
			);
			$json_data = json_encode($result);
			$fp = fopen ('bd.json', 'r+');
			fseek($fp, 0, SEEK_END);
			if(ftell($fp)>0)
			{
				fseek($fp,-1,SEEK_END);
				fwrite($fp, ',', 1);
				fwrite($fp, $json_data.']');
			}
			$fclose;
			$result = [
			"status" => true,
			"message" => "Регистрация успешно выполнена",
			];
			echo json_encode($result);
		}else 
			{
				$result = [
				"status" => false,
				"message" => "Пароли не совпадают",
				];
				echo json_encode($result);
				die();
			}
 	}
}


?>