<?php
require "/libs/up.php";
      $id = $_GET['id']; 
      $data_dog=ret_Row($id, 'animals');
      $f_data= ret_f_data_by_dog($id);
?>
    <p class="kennel"><?php echo "<br>Питомник: " . '"' . $data_dog['kennel'] . '"';
    echo "<br>Заводчик: " . $data_dog['breeder'];
    echo "<br>Владелец: " . $data_dog['owner'];

/*печать данных*/
  echo '<br>Вязок: ' .  $data_dog['litter'];
  echo '<br>Щенков: ' .  $data_dog['puppy'];


 ?>
<p class="dog">
    <div id="mydog"><?php echo  $data_dog['name'];?> 
    <img src="<?php echo bdika_url($id);?>" width="13%"></div>
</p>
<p class="dad_mum">
<div id="dad"><?php echo 'Отец<br>'; echo ret_Cell('name', $f_data['dad'], 'animals'); ?>
      <img src="<?php echo ret_Cell('url', $f_data['dad'], 'animals');?>" width="25%">
    </div>
    <div id="mum"><?php echo 'Мать<br>'; echo ret_Cell('name', $f_data['mum'], 'animals'); ?>
      <img src="<?php echo ret_Cell('url', $f_data['mum'], 'animals');?>" width="25%">
    </div>
</p>
<p class="GG_dad_mum">
    <div id="one"><?php echo 'Дедушка по линии отца<br>'; echo ret_Cell('name', $f_data['g1dad'], 'animals'); ?>
      <img src="<?php echo ret_Cell('url', $f_data['g1dad'], 'animals');?>" width="45%">
    </div>
    <div id="two"><?php echo 'Бабушка по линии отца<br>';echo ret_Cell('name', $f_data['g1mum'], 'animals'); ?>
      <img src="<?php echo ret_Cell('url', $f_data['g1mum'], 'animals');?>" width="45%">
    </div>
    <div id="three"><?php echo 'Дедушка по линии матери<br>'; echo ret_Cell('name', $f_data['g0dad'], 'animals');?>
      <img src="<?php echo ret_Cell('url', $f_data['g0dad'], 'animals');?>" width="45%">
    </div>
    <div id="four"><?php echo 'Бабушка по линии матери<br>';echo ret_Cell('name', $f_data['g0mum'], 'animals'); ?>
      <img src="<?php echo ret_Cell('url', $f_data['g0mum'], 'animals');?>" width="45%">
    </div>
</p>


</div>
    <!-- --------------------------------------  class="right_sidebar"  ----------------------------- -->   

<div class="right_sidebar" >
        <!-- ******************** кнопка вязка справа  *****************--> 

   <form method="POST">
      
     
      <a class="buttons" <?php echo '<a href="/name.php?id=' . $id . '">'?>назад</a>
                           
    </form>

</div class="right_sidebar" >

   
