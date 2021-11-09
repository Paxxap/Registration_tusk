<?php 
class CRUD
{
	private $login;
	private $password;
	private $password_confirm;
	private $name;
	private $email;
	private $jsonArray;


function __construct()
{

}
// Чтение из файла
function read ()
{
	if (file_exists('bd.json'))
	{
		$json = file_get_contents('bd.json');
		$this->jsonArray = json_decode($json,true);
	}
}
// Запись в файл
function writing()
{
	$this->jsonArray = [
		"name" => $this->name,
		"login" => $this->login,
		"email" => $this->email,
		"password" => $this->password
	];
	file_put_contents('bd.json', json_encode($this->jsonArray));
}
// Содержимое бд
function show()
{
	$this->read();
	echo '<pre>';
	print_r($this->jsonArray);
	echo '</pre>';
}
//Редактирование по введенному параметру 
function update()
{
		$update_key = $_POST['update_key'];
		foreach ($this->jsonArray as &$value)
		{
			foreach ($value as &$variable)
			{
				if ($variable == $_POST['update_info']) 
				{
					$variable = $_POST['new_update_info'];
				}
			}
		}
		file_put_contents('bd.json', json_encode($this->jsonArray));
}
//Удаление
function delete()
{
		foreach ($this->jsonArray as &$value)
		{
			foreach ($value as &$variable)
			{
				if ($variable == $_POST['del_info']) 
				{
					$variable=''; 
				}
			}
		}
		file_put_contents('bd.json', json_encode($this->jsonArray));
}
}

if (isset($_POST['show']))
{
	$bd = new CRUD();
	$bd->show();
}

if (isset($_POST['update']))
{
	$bd = new CRUD();
	$bd->read();
	$bd->update();
}

if (isset($_POST['del']))
{
	$bd = new CRUD();
	$bd->read();
	$bd->delete();
}
?>