<?php
//logout.php
	require "db.php";
	 R::exec( 'UPDATE users SET online=:value WHERE login = :id ', array(':value'=> '0', ':id' => $_SESSION['logged_user']->login));
	unset($_SESSION['logged_user']);
	header ('Location: / ');
?>

