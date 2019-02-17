<?php 
require "db.php";
require "includes/functions.php";

?>
<meta http-equiv='Content-Type' content='text/html; charset=utf8'>
<link rel="stylesheet" href="/css/style.css" type="text/css" />
<link rel="stylesheet" href="/css/radio.css" type="text/css" />
<form action="rand_dog.php" method="POST">
<button type="submit" class="knopka" name="rand">назад</button>
 </form>
 <form action="index.php" method="POST">
    <button type="submit" class="knopka" name="singup">Войти</button>
    </form>

<?php


echo '<br>';
    echo $_SESSION['hr1'];
    echo '<br>';
    echo $_SESSION['ww1'];
    echo '<br>';
    echo $_SESSION['ff1'];
    echo '<br>';
    echo $_SESSION['bb1'];
    echo '<br>';
  
    echo $_SESSION['tt1'];
    echo '<br>';
    echo $_SESSION['mm1'];
    echo '<br>';

     
     echo $_SESSION['url1'];
     echo '<br>';


     echo $_SESSION['sex']=$sex=f_bdika_sex();  //дает рандомный пол
     
     ?>
    <img src = "<?php echo $_SESSION['url1']; ?>">
  
<?php
  echo '<hr>';
  echo '<br>';
    echo $_SESSION['hr2'];
    echo '<br>';
    echo $_SESSION['ww2'];
    echo '<br>';
    echo $_SESSION['ff2'];
    echo '<br>';
    echo $_SESSION['bb2'];
    echo '<br>';
  
    echo $_SESSION['tt2'];
    echo '<br>';
    echo $_SESSION['mm2'];
    echo '<br>';

     
     echo $_SESSION['url2'];
     echo '<br>';

  ('кобель' == $sex ? $sex2='сука' : $sex2='кобель');
 $_SESSION['$sex2']=$sex2;
  echo $_SESSION['$sex2'];
      


    ?>
<img src = "<?php echo $_SESSION['url2']; ?>">
 
<?php

$data = $_POST;
//debug($_POST);

if (isset ($data['do_sighup'])){  //если кнопка нажата
  //регистрируем
  $errors = array();    //массив ошибки в него помещает название ошибок
  if(''==trim($data['login'])){ //TRIM убирает все пробелы Если логин пустой
    $errors [] = 'поле логина не заполнено';
  }
  if(''==trim($data['kennel'])){  //TRIM убирает все пробелы Если питомник пустой
    $errors [] = 'название питомника не заполнено';
  }
  if(''==($data['password'])){  // Если Пароль пустой   ПАРОЛЬ НЕ ТРИМАЕМ
    $errors [] = 'поле  password не заполнено';
  }
  if($data['password2']!= $data['password']){ // Проверка на второй пароль.
    $errors [] = 'пароли не совпадают';
  }
  if(''==trim($data['email'])){ //TRIM убирает все пробелы Если почта пустая
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
    echo "<br>создаем пользователя";
    $user = R::dispense('users');
    $user->login = $data ['login'];
    $user->email = $data ['email'];
    $user->kennel = $data ['kennel'];
    $user->f_time = date('d.m.Y');
   


    $user->password = password_hash($data ['password'], PASSWORD_DEFAULT); //зашифровываем пароль
    R::store ($user);
    
        echo "<br>создаем питомник";         
        $ken = R::dispense('kennels');
        $ken->name_k = $data ['kennel'];
        $ken->owner_k = $data ['login'];
        $ken->date = date('d.m.Y');
        $ken->email = $data ['email'];
        $ken->dogs = '2';
          
         R::store ($ken);


          echo "<br>создаем собак";

         $name='Без имени';
         $race='КХС';
          $mydate=date('d.m.Y');
          $owner=$data['login'];
          $kennel=$data['kennel'];
          
          $url1_id=ret_id_from_url($_SESSION['url1']);
          $url2_id=ret_id_from_url($_SESSION['url2']);
          $id1=insert_2_new_dogs($name,$sex,$race,$owner,$kennel,$mydate,$url1_id);
          $id2=insert_2_new_dogs($name,$sex2,$race,$data['login'],$data['kennel'],$mydate,$url2_id);
    
       $aa1=f_rand_col('AA','Aa','aa');
       $aa2=f_rand_col('AA','Aa','aa');


       
        echo "<br>вносим генетический код";
        insert_new_dna($id1,$url1_id,$_SESSION['hr1'],$_SESSION['ww1'], $_SESSION['ff1'],$_SESSION['bb1'],$_SESSION['mm1'],$_SESSION['tt1'],$aa1);
        insert_new_dna($id2,$url2_id,$_SESSION['hr2'],$_SESSION['ww2'], $_SESSION['ff2'],$_SESSION['bb2'],$_SESSION['mm2'],$_SESSION['tt2'],$aa2);

        echo "<br>вносим новые статы";
        $speed_new=find_where('stats',1,'speed');
        $agility_new=find_where('stats',1,'agility');
        $teach_new=find_where('stats',1,'teach');
        $jump_new=find_where('stats',1,'jump');
        $scent_new=find_where('stats',1,'scent');
        $find_new=find_where('stats',1,'find');
        $total_new=find_where('stats',1,'total');
        $mutation=find_where('stats',1,'mutation');
        insert_new_stats($id1,$speed_new,$agility_new,$teach_new, $jump_new,$scent_new,$find_new,$total_new,$mutation);
        insert_new_stats($id2,$speed_new,$agility_new,$teach_new, $jump_new,$scent_new,$find_new,$total_new,$mutation);


    echo '<div style="color:green;">Добро пожаловать, все успешно!</div>';  
    $_SESSION['logged_user']->login=$data['login'];
   
  
 

  } else{
                         
      //echo '<div id="okno">' . array_shift($errors) . '<a href="#" class="close">Закрыть окно</a></div>';
                            echo array_shift($errors) ;
               
  }
}


