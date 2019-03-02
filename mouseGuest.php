<?php
require "db.php";
        //подключение файлов
require(__DIR__ . '/html/header.html');
require(__DIR__ . '/html/aside.html');
        require "includes/functions.php"; 
?> 
<link rel="stylesheet" href="/css/style.css" type="text/css" />


<div class="content2">
<?php
//var_dump($_GET);
    $id = $_GET['id'];
    function bdika_sister($id){
        $lit=ret_cell('litter_id',$id,'mouse');
       // $lit_mouse=ret_cell('litter_id',$id,'mouse');
         $array = R::getAll( 'SELECT id FROM mouse WHERE litter_id = :id',[':id' => $lit]);
        // echo '<br>$lit_mouse ' .$lit_mouse . '<br>';
        // debug($array);
         if(('0'!=$lit)){
             echo '<br>Однопометчики: <br>'; 
                 foreach($array as $item) {
                        foreach ($item as $key => $value) {
                   
                             mouse_pic_url_size_guest($value,45);
                             echo '<br>';
                                       
                        }
                }
         }
              
    }
//bdika_sister($id);
   ?>
    <table width="1200" cellpadding="5" cellspacing="0">
   <tr>
    <td width="150"><?php mouse_pic_size($id,'300');?></td>
    <td width="200"> <?php print_m($id);?></td>
    <td width="400"><?php bdika_sister($id);?></td>
   </tr>
  </table>
   
    <p><?php pedigree($id);?></p>
     <div>дата рождения <?php echo ret_cell('birth',$id,'mouse')?></div>
     <div>id mum <?php echo ret_mum_id($id);?></div>
     <div>id dad <?php echo ret_dad_id($id);?></div>
     <div>Литтера: <?php echo ret_litter($id);?></div>
   

     
 <?php 
 
 //require "/libs/down.php";
 require(__DIR__ . '/libs/down.php');
     
