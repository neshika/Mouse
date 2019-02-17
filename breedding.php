<?php
require "db.php";
require "includes/functions.php";
 //R::fancyDebug( TRUE );
ini_set('display_errors',1);
error_reporting(E_ALL);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<title>Cимулятор заводчика</title>
</head>
<body>

  <style>
      body,html {
          width: 100%;
          height: 100%;
      }
      .wrapper{
            margin-left: 15%; /* Отступ слева */
            width: 1250px; /* Ширина слоя */
            height: auto;
            background: #D0D0D0; /* Цвет фона */
            border: 1px groove #9868CE;
            padding: 10px; /* Поля вокруг текста */
          
      }
  
   TD {
    vertical-align: top; /* Выравнивание по верхнему краю ячейки */
   }
   #col1 {
   width: 350px;
    background: #F5F5DC; /* Цвет фона первой колонки */
   }
   #col2 {
   
    background: #FFEBCD; /* Цвет фона второй колонки */
   }
   #col3 {
     width: 350px;
    background: #F5F5DC; /* Цвет фона третьей колонки */
   }
     
  </style>
 <?php
 $temp=(int)$_SESSION['para'];
$temp2=(int)$_POST['ONONA'];

 $_SESSION['owner']= ret_Cell('owner', $temp,'animals');
 
  if ('0' === ret_sex($temp)){
            $id_m = $temp;
            $id_d = $temp2;
                   
      }
  if ('1' === ret_sex($temp)){
           $id_m = $temp2;
            $id_d = $temp; 
      } 
 
// ******************** вывод картинки мамы и папы по id  из базы *****************-->  
?>  
    <div class="wrapper"><h1 align="center"> Вяжем двух собак</h1>
        
        <table width="100%" cellpadding="5" cellspacing="0">
  <tr>
  
 
         <td id="col1"><h3 align="center">Мама: </h3>
      
           <?php echo $id_m;
           dog_pic($id_m);
           print_lit_pup($id_m);
           detalis($id_m);
           f_tree($id_m);    ?>

       </td>
        <td id="col2"><h3 align="center">Особенности: </h3>
                 
                <?php
                    $_SESSION['id_m']=$id_m;
                    $_SESSION['id_d']=$id_d;
                   
                    echo ' самка: ' . bdika_for_breed($id_m);
                    echo ' <br>самец: ' . bdika_for_breed($id_d);
                        
                    if(bdika_mutation($id_m,$id_d)){  //если вернулся 1, то есть мутация
                      ?><h3 style="color:red" align="center"><?php echo '<br>При вязки близкородственных партнеров возможны ухудшения качеств и получение мутаций! Будьте осторожнее!';?></h3><?php
                    }
                    if(bdika_balance($_SESSION['owner'],5000)){ //проверка остатка средств на вязку. если хватает активна кнопка "ВЯЗКА" ?>
                          
                      <form method="POST" action="/NewDog.php">
                                <input type="submit" name="nazvanie_knopki" value="Вяжем" class="knopka"/>
                      </form>
                    <?php }else 
                        echo 'не достаточно средст для вязки!';

                    ?>
                            <form method="POST" action="/kennel.php">
                                <input type="submit" name="exit" value="Вернуться" class="knopka"/>
                               
                            </form>
                      <form method="POST" action="/actmating.php">
                                <input type="submit" name="actmat" value="Акт вязки" class="knopka"/>
                            </form>
                      
                 </h3>
        </td>
        <td id="col3"><h3 align="center">Папа:</h3>
                <?php echo $id_d;
               dog_pic($id_d);
               print_lit_pup($id_d);
               detalis($id_d);
               f_tree($id_d);?>
             
        </td>
   </tr>
  </table>
    </div>        
 <?php 

?>
</body>
</html>



