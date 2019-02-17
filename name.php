<?php
require "/libs/up.php";
     $id = $_GET['id'];
      $GLOBALS['Data_dog']=data_animals($id);
      $owner=ret_owner();
      $family_data= ret_Row($GLOBALS['Data_dog']['family_id'],'family');
    
        
/*<h1 style="font-size: 120%; font-family: Verdana, Arial, Helvetica, sans-serif; 
  color: #336">Заголовок</h1>*/
  if ( isset($_POST['newName']) ){ 
    if("" != $_POST['name1']){
       insert_data('animals',$id,'name',$_POST['name1']);
    }
    else {  // всплывающее окно, если имя не ввели
      ?> <script>alert ("ВВедите имя!");</script>   
      <?php
    }
  }
   if ( isset($_POST['add_age']) ){ 

    add_age($_SESSION['Dog']);
  }
  if ( isset($_POST['train']) ){
      insert_data('animals',$id,'mark_id',2);
  }


?>


<!-- ******************** вывод питомника / имя собаки и картинка пола   выводит число счастья *****************-->    
  <div style="height: 80px; width: 1170px;"> 
      <h3 align="center"><?php echo $GLOBALS['Data_dog']['name'];
      echo ' "' . $GLOBALS['Data_dog']['kennel'] . '" ';
      echo ret_pic_sex($id);?></h3>
      <hr>
   </div>
          
<!-- ******************** вывод доп меню собаки  заводчик / хозяин  *****************-->  
    <div style="height: 110px; width: 1165px; background-color: #D0D0D0;"> 
          <ul style="width: 45%; float: left;">
            <li>Заводчик: <?php echo $GLOBALS['Data_dog']['breeder'];?></li>
            <li>Хозяин: <?php echo $GLOBALS['Data_dog']['owner'];?></li>
            <li>Вязок: <?php echo $GLOBALS['Data_dog']['litter'];?></li>
            <li>Оценка: <?php print_mark($id);?></li>
            <li>Происхождение: <?php print_origin($id);?></li>

          </ul>
        
<!-- ******************** вывод доп меню собаки  вид \\ Дата рождения \\ окрас    *****************-->       
        <ul style="width: 40%; float: right;">
          <li>тип:  <?php echo  print_hr($id);?></li>
          <li>возраст:  <?php echo print_age($id);?></li>
          <li>Щенков: <?php echo $GLOBALS['Data_dog']['puppy'];?></li>
                <?php echo bdika_estrus($id);?>
       </ul>

    </div>

 <!-- ******************** вывод картинки собаки по id  *****************-->

<form method="POST">
<table width="1165" cellpadding="3" cellspacing="0" bgcolor="#D0D0D0">
   <colgroup width="390">
     <tr>
      <td><input style="float: left;  margin-left: 30px;" id="button" name="food" type="submit" value="есть" class = "knopka">
          <input style="float: right;  margin-right: 30px;" id="button" name="water" type="submit" value="пить" class = "knopka">
          <br>
          <input style="float: left;  margin-left: 30px;" id="button" name="comp" type="submit" value="чесать" class = "knopka">
          <input style="float: right;  margin-right: 30px;" id="button" name="walk" type="submit" value="гулять" class = "knopka">
          <br>
          <input style="float: left;  margin-left: 30px;" id="button" name="sleep" type="submit" value="спать" class = "knopka">
          <input style="float: right;  margin-right: 30px;" id="button" name="up" type="submit" value="растить" class = "knopka">

        
    </td>

    <td style="border-width: 10px; text-align: center;"><?php echo bdika_url($id) . "<br>"; dog_pic($id);?>
        
    </td> 
    <td>
      <input id="button" name="badd" type="submit" value="добавка" class = "knopka">
      <input id="button" name="knopka" type="submit" value="спа уход" class = "knopka">
      <input id="button" name="vet" type="submit" value="ветеринар" class = "knopka">
      <input id="button" name="train" type="submit" value="тренировки" class = "knopka">
    </td>
  </tr>
</table>
<input id="button" name="rand" type="submit" value="рандомное число" class = "knopka">
<div style="margin-left: 450px">
    <table>
         <tr><td>Энергия</td><td><div class="meter"><span style="width: <?php echo $GLOBALS['Data_dog']['vitality'] . '%';?>"></span></div></td><td><?php echo $GLOBALS['Data_dog']['vitality'];?></td></tr>
            <tr><td>Здоровье</td><td><div class="meter"><span style="width: <?php echo $GLOBALS['Data_dog']['hp'] . '%';?>"></span></div></td><td><?php echo $GLOBALS['Data_dog']['hp'];?></td></tr>
            <tr><td>Счастье</td><td> <div class="meter"><span style="width: <?php echo $GLOBALS['Data_dog']['joy'] . '%';?>"></span></div></td><td><?php echo $GLOBALS['Data_dog']['joy'];?></td></tr>
      </table>
</div>

</form>
 
<!-- ******************** вывод Генетического кода собаки  скрытый текст*****************--> 
<!-- ******************** вывод статы собаки  *****************--> 

    <details>
      <summary>Генетический код 
          <?php //print_all_d($id);  
            detalis_green($id);
          ?>
          </summary>
    </details>
<!-- ******************** вывод родителей *****************--> 
<p align="center">Родители:<br>
    
                                  МАМА ========================= ПАПА
  <?php 
   
if(!isset($id_m)): ?>
                                  
<!-- левая колонка мамы-->    
    <div style="float: left; width: 35%;">
<!-- имя мамы--> 
        <details>
            <summary><?php $id_m=$family_data['mum'];
                    $mum_name=take_data_from($id_m, 'animals');
                    echo $mum_name['name'];?>
            </summary> 
<!-- картинка мамы--> 
            <?php 
                  
                  if ('0'!==$id_m){
                       
                      echo '<a href="/name.php?id=' . $id_m . '">';
                       dog_pic($id_m); ?></a>
                       

<!-- ******************** вывод Генетического кода собаки  скрытый текст*****************--> 
              <details>
                    <summary>Генетический код
                    <?php echo "<br>" . bdika_url($id_m) . "<br>"; detalis($id_m);?>
                        </summary> 
              </details>


              <?php
                  }else
                    echo 'нет данных о предках'; ?>
        
           
       </details>
 <?php endif;    ?>
     </div class="content_mum">
<?php if(!isset($id_d)): ?>
<!-- правая колонка папы-->  
    <div style="float: right; width: 48%;">
<!-- имя папы-->  
      <details>
            <summary><?php $id_d=$family_data['dad'];
                    $dad_name=take_data_from($id_d, 'animals');
                    echo $dad_name['name'];?>
            </summary> 
<!-- картинка папы-->  
              <?php 
                   $id_d=$family_data['dad'];
                    if ('0'!==$id_d){
                       echo '<a href="/name.php?id=' . $id_d . '">';
                       dog_pic($id_d); ?></a>

<!-- ******************** вывод Генетического кода собаки  скрытый текст*****************--> 
            <details>
                  <summary>Генетический код
                  <?php echo "<br>" . bdika_url($id_d) . "<br>"; detalis($id_d);?>
                      </summary> 
            </details>


                      <?php }else
                      echo 'нет данных о предках'; ?>


                  
        </details>
    
    </div>
    </p>
    </main>

<?php endif;

?></div>
    <!-- --------------------------------------  class="right_sidebar"  ----------------------------- -->   

<div class="right_sidebar" >
        <!-- ******************** кнопка вязка справа  *****************--> 

   <form method="POST">
      
      
      <a class="buttons" <?php echo '<a href="/family_tree.php?id=' . $id . '">'?>Родословная</a>
      <a class="buttons" <?php echo '<a href="/kennel.php">'?>в питомник</a>
      <p>
    <p><strong>Сменить имя:</strong></p>
    <input type="text" name="name1">
    <input id="button" name="newName" type="submit" value="Новое имя" class = "knopka">

                           
    </form>
    <form method="POST" action = "/office.php">
      <div align="right"><input id="button" name="shelter" type="submit" value="отдать в приют" class = "knopka"></div>
      <?php $_SESSION['Dog'] = $id; ?>
  </form>
  <form method="POST">
      <div align="right"><input id="button" name="add_age" type="submit" value="растим" class = "knopka"></div>
      <?php $_SESSION['Dog'] = $id; ?>
  </form>
  <form method="POST" action = "/matting.php">
      <?php If (1==bdika_age_for_breeding($GLOBALS['Data_dog'])):?>
      <?php echo bdika_for_breed($id);?>
      <div align="right"> <input id="button" name="knopka" type="submit" value="Вязка" class = "knopka" >
      </div>
      <?php $_SESSION['Dog'] = $id;Endif;?>
      
  </form>

</div class="right_sidebar" >

     
