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
        $lit=ret_cell('litter_id',$id,'mouse');
       // $lit_mouse=ret_cell('litter_id',$id,'mouse');
         $array = R::getAll( 'SELECT id FROM mouse WHERE litter_id = :id',[':id' => $lit]);
        // echo '<br>$lit_mouse ' .$lit_mouse . '<br>';
        // debug($array);
         if(('0'!=$lit)){
             echo '<br>Однопометчики: <br>'; 
                 foreach($array as $item) {
                        foreach ($item as $key => $value) {
                   
                             mouse_pic_url_size($value,45);
                             echo '<br>';
                                       
                        }
                }
         }
              
         
       /* $lit_mouse=ret_litter($id);
        echo $lit_mouse;
        echo '<br>' . ret_mum_id($id);
        echo '<br>' . ret_dad_id($id);
        $array = R::getAll( 'SELECT litter FROM litter' );
        echo '<br> текст <br>';
        foreach($array as $item) {
              foreach ($item as $key => $value) {
                 
                 if('нет данных'!=$lit_mouse && $lit_mouse==$value){
                     echo 'однопометчики: ' . $value;
                 }
             }    
              //echo "<br>";
               
        
       }
        * 
        */
    }
//bdika_sister($id);
   ?>
    <table width="1400" cellpadding="5" cellspacing="0">
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
     
