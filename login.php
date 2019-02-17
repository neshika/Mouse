<?php

// login.php
require "db.php";

$data = $_POST;

if( isset($data['do_login']) ){
	$errors= array();
	$user = R::findOne ('users','login = ?', array($data['login']));

	if ($user){  //если Юзер найден
		//если логин существует, то проверяем пароль
		if ( password_verify($data['password'], $user->password)){

			//true
			//логиним пользователя
			$_SESSION['logged_user'] = $user;
			/*Добро пожаловать, все успешно!*/
				
			//внесение даты посещения в таблицу USERS
         R::exec( 'UPDATE users SET l_time=:value WHERE login = :id ', array(':value'=> date("Y-m-d"), ':id' => $_SESSION['logged_user']->login));
         R::exec( 'UPDATE users SET online=:value WHERE login = :id ', array(':value'=> '1', ':id' => $_SESSION['logged_user']->login));

    		//Проверка, если авторизовался админ переход в админку.
        			if('admin'==$_POST['login']){
        				header ('Location: admin/admin.php');
						exit;
					}
			//Для пользователя переход в офис учетки
				header ('Location:/office.php');
				exit;

		}else{
			$errors [] = 'пароль введен не верно' ;
		}

	}else{
		$errors [] = 'Пользоватеь не найден ' ;

	}	




	if (!empty($errors)){
		echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
	}

}
//вызываем шапку и форму для заполнения данных  для того, чтобы залогиниться.
//include_once '/html/login.html';
//require_once('/html/login.html');
require_once(__DIR__ . '/html/login.html');
