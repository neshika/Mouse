<?php
require "db.php";
require "includes/functions.php";
//include_once "a.php"; 
//функция, вызывающая шапку сайта
include_once "html/header.html";
//функция, вызывающая навигацию по сайту
include_once "html/nav.html";

//функция, вызывающая меню слева по сайту + начало мейна
include_once "html/aside.html";

function f_main(){
  echo 'контент';
}

test();

f_main();

include_once "html/aside_r.html";


 		
   
 
   	