<?php
require "db.php";
        //подключение файлов
        
     require(__DIR__ . '/html/header.html');
      require(__DIR__ . '/html/nav.html');
     //  require "/html/header.html";
      // require "/html/nav.html";
        require "includes/functions.php"; 
?> 
<link rel="stylesheet" href="/css/style.css" type="text/css" />
<div class="content">
<?php
//var_dump($_GET);
    $id = $_GET['id'];
    function bdika_sister($id){
        echo ret_litter($id);
        echo '<br>' . ret_mum_id($id);
        echo '<br>' . ret_dad_id($id);
        $array = R::getAll( 'SELECT id FROM litter' );
        echo '<br> текст <br>';
        foreach($array as $item) {
              foreach ($item as $key => $value) {
                 echo $value;
             }    
              echo "<br>";
       }
    }

   ?>
     <div>дата рождения <?php echo ret_cell('birth',$id,'mouse')?></div>
     <div>id mum <?php echo ret_mum_id($id);?></div>
     <div>id dad <?php echo ret_dad_id($id);?></div>
     <div>Литтера: <?php echo ret_litter($id);?></div>
    <div style="float: left; width: 35%; height: 300px;"><?php mouse_pic_size($id,'300');?></div>  
    <div style="float: right; width: 48%; height: 300px;"> <?php print_m($id);?></div>
    <p><?php pedigree($id);?></p>
   

     
 <?php 
 bdika_sister($id);
 //require "/libs/down.php";
 require(__DIR__ . '/libs/down.php');
     
