<?php 
require "db.php";
require "includes/functions.php";

$data = $_POST;
//debug($_POST);

// if (isset ($data['do_sighup'])){	//если кнопка нажата
// 	//регистрируем
// 	$errors = array();		//массив ошибки в него помещает название ошибок
// 	if(''==trim($data['login'])){	//TRIM убирает все пробелы Если логин пустой
// 		$errors [] = 'поле логина не заполнено';
// 	}
// 	if(''==trim($data['kennel'])){	//TRIM убирает все пробелы Если питомник пустой
// 		$errors [] = 'название питомника не заполнено';
// 	}
// 	if(''==($data['password'])){	// Если Пароль пустой   ПАРОЛЬ НЕ ТРИМАЕМ
// 		$errors [] = 'поле  password не заполнено';
// 	}
// 	if($data['password2']!= $data['password']){	// Проверка на второй пароль.
// 		$errors [] = 'пароли не совпадают';
// 	}
// 	if(''==trim($data['email'])){	//TRIM убирает все пробелы Если почта пустая
// 		$errors [] = 'не введена почта';
// 	}
// 		//проверка есть ли такой же пользователь
	
// 	if(R::count('users', "login = ?", array($data['login']))>0){
// 		$errors [] = 'такой логин уже есть';
// 	}
// 	if(R::count('users', "email = ?", array($data['email']))>0){
// 		$errors [] = 'уже есть такая почта';
// 	}
// 	if(R::count('users', "kennel = ?", array($data['kennel']))>0){
// 		$errors [] = 'такой питомник уже есть';
// 	}
// 	if (empty($errors)){
// 		//все хорошо, регистрируем 
// 		/*  создаем базу через REdBeen*/
// 		echo "создаем базу";
// 		$user = R::dispense('users');
// 		$user->login = $data ['login'];
// 		$user->email = $data ['email'];
// 		$user->kennel = $data ['kennel'];
// 		$user->f_time = date('d.m.Y', time() - 86400);


// 		$user->password = password_hash($data ['password'], PASSWORD_DEFAULT); //зашифровываем пароль
// 		R::store ($user);
		
                
//         $ken = R::dispense('kennels');
//         $ken->name_k = $data ['kennel'];
//         $ken->owner_k = $data ['login'];
//         $ken->date = date('d.m.Y', time() - 86400);
//         $ken->email = $data ['email'];
//         $ken->dogs = '2';
//             //if (1==$data['list']){       //$data['list']  - C;
//               // $ken->suf = '1';
//                //$ken->name_suff = 'c';
//             //}
                
//             // if (2==$data['list'])
//             //                //$data['list']  - CO;
//             // {
//             //     $ken->suf = '1';
//             //    $ken->name_suff = 'со';
//             // }
//             //     if (3==$data['list'])
//             //             //$data['list']  - ИЗ;
//             //     {
//             //         $ken->suf = '1';
//             //    $ken->name_suff = 'из';
//             //     }
//             //  if (4==$data['list'])
//             //              //$data['list']  - ОТ;
//              //{
//                //  $ken->suf = '1';
//                //$ken->name_suff = 'от';
//              //}
                 
//          R::store ($ken);
                                         
// 		echo '<div style="color:green;">Добро пожаловать, все успешно!</div>';	
                                                        		

// 	} else{
                         
//    		//echo '<div id="okno">' . array_shift($errors) . '<a href="#" class="close">Закрыть окно</a></div>';
//                             echo array_shift($errors) ;
               
// 	}
// }
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<title>Cимулятор заводчика</title>
</head>
<body>
<style>
      body { background-color: #FFCCFF; } /* общий фон */
      
      div {
        width: 600px;   /* ширина */
        height: 800px; /* высота */
        padding: 30px 20px 30px 50px; /* внутренние отступы - верх, право, низ, лево */
        margin: 50px auto;  /* выравнивание по центру */ 
        box-shadow: 10px 10px 20px black; /* небольшая тень для объемности */
        background-color: #F2F2F2 ;  /* цвет фона в блоке */
        font-family:  "Times New Roman"; /* нужный шрифт */

      }
         img {
            width: 15%;
            /*background: white;*/
          
       }
#zatemnenie {
        background: rgba(102, 102, 102, 0.5);
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        display: none;
      }
      #okno {
        width: 300px;
        height: 50px;
        text-align: center;
        padding: 15px;
        border: 3px solid #0000cc;
        border-radius: 10px;
        color: #0000cc;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        margin: auto;
        background: #fff;
      }
      #zatemnenie:target {display: block;}
      .close {
        display: inline-block;
        border: 1px solid #0000cc;
        color: #0000cc;
        padding: 0 12px;
        margin: 10px;
        text-decoration: none;
        background: #f2f2f2;
        font-size: 14pt;
        cursor:pointer;
      }
      .close:hover {background: #e6e6ff;}
      
    </style>
    <form action="/blank_prist2.php" method = "POST"> 
    <div><h1 align="center"> <img src = "/pic/logo_mini.png" alt = "logo">Витруальное кинологическое объединение<br>
            ЗАЯВКА НА РЕГИСТРАЦИЮ ЗАВОДСКОЙ ПРИСТАВКИ <br></h1>
       <p> <input type="radio" name="ken" >Питомник    
	<input type="radio" name="ken" >Заводская приставка
        </p><hr>
        
        <p> Имя заводчика*: <input type="text" name="login" value="<?php echo @$data['login']; ?>"><br>
	        Электронный адрес*: <input type="email" name="email" ><br>
            Пароль*:<input type="password" name="password" value="<?php echo @$data['password']; ?>">
            Еще раз пароль*:<input type="password" name="password2" value="<?php echo @$data['password2']; ?>">
         </p><hr>
		
        <p> Название питомника/заводской приставки*: <input type="test" name="kennel"  maxlength="20"><br><br>
           <!-- Префикс: <input type="radio" name="pref" value="Nosuf">   
            Суффикс:  <input type="radio" name="pref" value ="suf" onclick="document.getElementById('qw').style.display=(this.checked)?'block':'none';" >
                 <p id="qw" style="display:none;" >
                     <select  name="list">
                        <option value="1">с</option>
                        <option value="2">со</option>
                        <option value="3">из</option>
                        <option value="4">от</option>
                    </select>
           -->        
                 </p><hr>
        </p>
		
        
		
                  <input id="button" name="do_sighup" type="submit" value="Регистрация" class = "knopka">
	<a class="buttons" href="/index.php" >На главную</a>		


	</form>
	<p></p>
</div>

</body>
</html>
