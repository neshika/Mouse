<?php
require "/libs/up.php";

//*******************проверяем пол выбранной собаки, чтобы вывести противоположных партнеров
function bdika_pol($id_dog){  
  $owner = ret_cell('owner',$id_dog,'animals'); 
  $sex= ret_sex($id_dog);
  $sex==0 ? $sex1=1 : $sex1=0;
  return $sex1;
  
}

//*******************проверяем возраст выбранной собаки, чтобы вывести в рамках
function bdika_age($id){    //$key
    $data_dog= take_data_from($id, 'animals');
    //echo print_age($id);
    if ((13>$data_dog['age_id']) || (('сука' == $data_dog['sex']) && (58>=$data_dog['age_id']) && (13>$data_dog['age_id'])) ){ //кобель >6 мес. сука>6 мес, < 7лет
        return 0;
    }
    else return 1;
}

$id_dog= $_SESSION['Dog'];// выгружаем из памяти id собаки 


/***************************   рисуем собаку и ее характеристики*********************/
?>
<div style="background: #E0E0E0; text-align: center; height: 350px; width: 350px; margin-left: 180px;">
    <?php dog_pic($id_dog);?>
   
</div>
    <details>
        <summary> 
          <?php echo "Выбранная собака: " . ret_Cell('name',$id_dog,'animals');?>
                
         </summary> 
                <?php detalis($id_dog);?>        
   </details>

<div style="background: #E0E0E0;">
<?php /********************проверяем пол выбранной собаки, чтобы вывести противоположных партнеров******************/
    $Sex_partner=bdika_pol($id_dog);
    $owner = ret_cell('owner',$id_dog,'animals');
    
     // echo 'пол партнеров: ' . $Sex_partner?>
      <h3 align="center"><?php echo 'Партнеры: ';?></h3><?php
   /***************************вывожу на экран возможных парнтеров в зависимости от пола*************************/ 

      
    /**********************выводим на экран имя собаки как ссылку*********************************/
                   
      
      $data[] =  ret_dogs_by_owner($owner);
    // debug($data);
     foreach($data as $item) {
         foreach ($item as $id => $value) {
             
             $sex= ret_sex($id);
             
            $lit= ret_Cell('litter', $id,'animals');
            $pup=ret_cell('puppy', $id,'animals');
            $age= print_age($id);
            $age_norma=ret_cell('age_id',$id,'animals');
            $name=ret_Cell('name', $id, 'animals');
            $_SESSION['para']=$id_dog; 
            if(($Sex_partner==$sex) && ('0'== $sex) && (13<$age_norma)){  //и старше 6 месяцев и партнерши суки

             ?>
          <form method="post" action="breedding.php">
              
              
                <hr>                                        
                <a href="/name.php?id=<?php echo $id?>"><h3><?php //echo $name;?></h3>
                                                    
                     <div style="background:#E0E0E0;width: 300px;">
                     <?php echo $name . dog_pic_size($id,145);?>
                     </div>
                                                     
                     </a>
                          
                       <div style="display:none;" class="radio_buttons">
                         <input type="radio" NAME="ONONA" VALUE="<?=$id?>" class="knopka" checked />
                         <label for="radio4">Вяжем</label>

                       </div>
                  
                         
              <div style="background: #E0E0E0;height: 200px;">       
                   <?php  echo '<br>' . bdika_for_breed($id);detalis($id); ?>
              </div>
                <input type="submit" class="knopka" value="Вяжем">
        </form> 
      
                <?php
                
                
    }
    if(($Sex_partner==$sex) && ('1'== $sex) && (13<$age_norma)){
     ?>
      
                <form method="post" action="breedding.php">
              
              
                   <hr>                                        
                    <a href="/name.php?id=<?php echo $id?>"><h3><?php echo $name?></h3>
                                                    
                     <div style="background:#E0E0E0;width: 300px;">
                     <?php echo dog_pic_size($id,145);?>
                     </div>
                                                     
                     </a>
                          
                       <div style="display:none;" class="radio_buttons">
                         <input type="radio" NAME="ONONA" VALUE="<?=$id?>" class="knopka" checked />
                         <label for="radio4">Вяжем</label>

                       </div>
                  
                         
              <div style="background: #E0E0E0;height: 200px;">       
                   <?php  echo '<br>' . bdika_for_breed($id);detalis($id); ?>
              </div>
                <input type="submit" class="knopka" value="Вяжем">
        </form> 
         <?php
            }
       
             
         }    
     }
      
      ?>
                   
 
        ?>
</div></div>
    <!-- --------------------------------------  class="right_sidebar"  ----------------------------- -->   

<div class="right_sidebar" >
        <!-- ******************** кнопка вязка справа  *****************--> 
          <a class="buttons" <?php echo '<a href="/name.php?id=' . $id_dog . '">'?>назад</a>

</div class="right_sidebar" >

