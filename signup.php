<?php

require "db.php";
$data = $_POST;

if (isset ($data['do_sighup'])){	//если кнопка нажата
	//регистрируем
	$errors = array();		//массив ошибки в него помещает название ошибок
	if(''==trim($data['login'])){	//TRIM убирает все пробелы Если логин пустой
		$errors [] = 'поле логина не заполнено';
	}
	if(''==trim($data['kennel'])){	//TRIM убирает все пробелы Если питомник пустой
		$errors [] = 'название питомника не заполнено';
	}
	if(''==($data['password'])){	// Если Пароль пустой   ПАРОЛЬ НЕ ТРИМАЕМ
		$errors [] = 'поле  password не заполнено';
	}
	if($data['password2']!= $data['password']){	// Проверка на второй пароль.
		$errors [] = 'пароли не совпадают';
	}
	if(''==trim($data['email'])){	//TRIM убирает все пробелы Если почта пустая
		$errors [] = 'не введена почта';
	}
		//проверка есть ли такой же пользователь
	
	if(R::count('users', "login = ?", array($data['login']))>0){
		$errors [] = 'такой логин уже есть';
	}
	if(R::count('users', "email = ?", array($data['email']))>0){
		$errors [] = 'уже есть такая почта';
	}
	if(R::count('users', "kennel = ?", array($data['kennel']))>0){
		$errors [] = 'такой питомник уже есть';
	}
	if (empty($errors)){
		//все хорошо, регистрируем 
		/*  создаем базу через REdBeen*/
		echo "создаем базу";
		$user = R::dispense('users');
		$user->login = $data ['login'];
		$user->email = $data ['email'];
		$user->kennel = $data ['kennel'];
		$user->f_time = date("d.m.Y");

		$user->password = password_hash($data ['password'], PASSWORD_DEFAULT); //зашифровываем пароль
		R::store ($user);
		echo '<div style="color:green;">Добро пожаловать, все успешно!</div><hr>';
				
					

	} else{
		echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
	}
}
//require_once '/blank_prist.php';
