<?php
//подключение файлов
require "db.php";
require "/html/header.html";
require "/html/nav.html";
require "/includes/functions.php"; 
?>
<div class="content">
<?php    
/*каунтом считаем сколько строк с собаками по владельцу*/        
         $count = R::count( 'mouse', 'status = 1');
        $owner=ret_owner();
        
  /*создаем форму с кнопками по сортировке собак на виды*/      

?>
    <form method="POST" action="/kennel.php">
          <h4 align="center"><?php  echo "Владелец: " . $owner . "<br>Количество животных: " . $count;?><h4>
          <button type="submit" class="knopka" name="all_mouse">все мыши</button>
          <button type="submit" class="knopka" name="female">девочки</button>
          <button type="submit" class="knopka" name="male">мальчики</button>
      </form>
    </p>
<?php


/************************* Ели нажата кнопка ВСЕ СОБАКИ выводим на экран всех собак, пренадлежащих владельцу*/
 
          
       if( isset($_POST['all_mouse']) ){
        echo $owner;
        $array[] = R::getAssoc('SELECT id,name FROM mouse WHERE status = 1 && owner = :owner' ,
                  [':owner' => $owner ]);
       /*картинка суки/кобели*/              
        ?><p class="kennel"><img src = "/pic/male.png" width="10%"><img src = "/pic/female.png" width="10%"></p><?php
            foreach($array as $item) {
                  foreach ($item as $key => $value) {
                      echo "<br><hr><a>";
                      $GLOBALS['Data_mouse']= data_mouse($key); 
                     ?>
                      <table> 
                         <tr>
                             <td><?php echo '<a href="/mouse.php?id=' . $key . '">';
                                     
                                        mouse_pic_size($key,'100');?></td></a>
                            <td><?php info($key); ?></td>
                        </tr>
                       </table>
                <?php                  
                   
                     
                  }//foreach ($item as $key => $value) {
                 }     //foreach($array as $item) {
              
       }   //if( isset($_POST['all_mouse']))




/****************************** Если нажата кнопка СУКИ выводим на экран всех собак, пренадлежащих владельцу*/
          
          if( isset($_POST['female']) ){
              $sex='самка';
            $array[] = R::getAssoc('SELECT id,name FROM mouse WHERE sex = :sex && status = 1 && owner = :owner' ,
                  [':sex' => $sex, ':owner' => $owner ]);
              ?><p class="left"><img src = "/pic/female_mini.png" alt = "девочки" width="10%"></p><?php
            foreach($array as $item) {
                  foreach ($item as $key => $value) {
                      echo "<br><hr><a>";
                      $GLOBALS['Data_mouse']= data_mouse($key); 
                     ?>
                      <table> 
                         <tr>
                             <td><?php echo '<a href="/mouse.php?id=' . $key . '">';
                                     
                                        mouse_pic_size($key,'100');?></td></a>
                            <td><?php info($key); ?></td>
                        </tr>
                       </table>
                <?php                  
                   
                     
                  }//foreach ($item as $key => $value) {
                 }     //foreach($array as $item) {
              
          }//if( isset($_POST['female']) ){
           if( isset($_POST['male']) ){
               $sex='самец';
               $array[] = R::getAssoc('SELECT id,name FROM mouse WHERE sex = :sex && status = 1 && owner = :owner' ,
                  [':sex' => $sex, ':owner' => $owner ]);
              ?><p class="left"><img src = "/pic/male_mini.png" alt = "мальчики" width="10%"></p><?php
               foreach($array as $item) {
                  foreach ($item as $key => $value) {
                      echo "<br><hr><a>";
                      $GLOBALS['Data_mouse']= data_mouse($key); 
                     ?>
                      <table> 
                         <tr>
                             <td><?php echo '<a href="/mouse.php?id=' . $key . '">';
                                mouse_pic_size($key,'100');?></td></a>
                            <td><?php info($key); ?></td>
                        </tr>
                       </table>
                <?php                  
                   
                     
                  }//foreach ($item as $key => $value) {
                 }     //foreach($array as $item) {
              
              
          }



/******************************* Если нажата кнопка щенки выводим на экран всех щенков, пренадлежащих владельцу*/


        if( isset($_POST['puppy']) ){
              $array[] = R::getAssoc('SELECT id,name FROM animals WHERE owner = :owner && status = 1' ,
              [':owner' => $owner]);
            ?><img src = "/pic/Puppy_mini.png" alt = "мышата"> <?php
           
              foreach($array as $item) {
                  foreach ($item as $key => $value) {
                     
/*сохранение данных о голости собаки + вязки/щенки*/
                    $GLOBALS['Data_dog']=data_animals($key);    //сохраняем данные по собаке
                      if(13>=$GLOBALS['Data_dog']['age_id']){ //возраст <6 месяцев
                          echo "<br><hr><a>";
/*выводим имена кобелей как ссылки на страничку собаки*/
                                echo '<a href="/name.php?id=' . $key . '">';?>

                          <img src="<?php echo bdika_url($key);?>" width="10%"></a> 
                           <div>
                                <?php echo '<br>имя: ' . $value;
                                echo '<br>возраст: ' . print_age($key);
                                
                                
                                 ?>
                                     
                            </div><?php
                    }   //foreach ($item as $key => $value)  
                        
                  } //if(13>=$GLOBALS['Data_dog']['age_id']){
                  
            }   //foreach($array as $item)
            
         }   //if( isset($_POST['puppy']) )

//функция вызывающая футер сайта
require "/libs/down.php";
?> 
