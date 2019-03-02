<?php
require "db.php";
		//подключение файлов
require(__DIR__ . '/html/header.html');
require(__DIR__ . '/html/aside.html');
require "includes/functions.php";		

?><div class="content2">
    <h3>Добро пожаловать, Путник! <br>Сегодня: <?php echo date('d.m.Y');?><br><br></h3>
       
    <h1><li>Последние новости</li>
        <li>Важные события: </li></h1>
    <br> -  <strong>28 февраля </strong>был привезен мальчик <strong>Бон</strong> из Питомника <a href="https://vk.com/club92571519">City Mouse;</a>
            <?php mouse_pic_size(35,'100');?>
    <br> -  <strong>6 февраля </strong> ссажены Линда и Грег, ждем ...   <br>
         <?php mouse_pic_size(2,'100');?>  <?php mouse_pic_size(3,'100');?>
       
    
<?php                    
require_once(__DIR__ . '//libs/down.php');
