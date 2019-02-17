<?php
//подключение библиотеки redBeanphp
require(__DIR__ . 'db.php');

//подключение файла с функциями
require(__DIR__ . 'includes/functions.php');
//для распечатки собак в нужном размере
//require "get_image.php"; //возвращает $_POST['url']
//включение отчета по ошибкам
//ini_set('display_errors',1);
//error_reporting(E_ALL);

/*//функция, вызывающая шапку сайта
include_once "html/header.html";

//функция, вызывающая навигацию по сайту
include_once "html/nav.html";

//функция, вызывающая меню слева по сайту + начало мейна
include_once "html/aside.html";
*/
//require(__DIR__ . '/html/header.html');
require "/html/header.html";
require "/html/nav.html";
require "/html/aside.html";



?><div class="content">