<?php

       require "/libs/up.php";
   $owner=ret_owner();
?>

<?php

if(!isset($_POST['buy']) ){        //если кнопка не нажата

       $_SESSION['hr']=$Hr=f_rand_col('HrHr','Hrhr','hrhr');
       $_SESSION['ww']=$W=f_rand_col('WW','Ww','ww');
       $_SESSION['ff']=$F=f_rand_col('FF','Ff','ff');
       $_SESSION['bb']=$B=f_rand_col('BB','Bb','bb');
  
       $_SESSION['tt']=$T=f_rand_col('TT','Tt','tt');
       $_SESSION['mm']=$M=f_rand_col('MM','Mm','mm');
       $_SESSION['aa']=$A=f_rand_col('AA','AA','aa');

      $all= "<br>".$Hr."<br>".$W."<br>".$F."<br>".$B."<br>".$T."<br>".$M;
   // echo $all;
   
//возвращает url собаки, чтобы нарисовать картинку
      $url=bdika_color ($Hr,$W,$F,$B,$T,$M);

// морем картинки из базы
     $_SESSION['url_id'] = $url_id=ret_id_from_url($url);
      $_SESSION['url'] = $url;
   //   echo 'id ' . $url_id;

     // echo "<br>" . f_bdika_sex();      //дает рандомный пол
/////////////////////////////////////////////////////////////создает temp собаку в stats
      $id=1;
      $dog_id=0; 


      
       $sex=f_bdika_sex();
      $spd=Rand(9,11);
      $agl=Rand(9,11);
      $tch=Rand(9,11);
      $jmp=Rand(9,11);
      $nuh=Rand(9,11);
      $fnd=Rand(9,11);
      $ttl=($spd+$agl+$tch+$jmp+$nuh+$fnd);
      $ttl=number_format ($ttl , $decimals = 1 ,$dec_point = "." , $thousands_sep = " " );

      
      // session_start(); 
       $_SESSION['sex'] = $sex;
       $_SESSION['own'] = $owner;


echo 'вставляем DNA';

//вставляем DNA
 //     $new = R::dispense('dna');
 //     echo '<br>$new->id' . $new->id;
 //   if (0==($new->id)){
 // // echo '<br> start';
 //    // $new->id = '1';
 //      $new->dog_id = $dog_id;
       
 //        $new->url_id = $_SESSION['url_id'];
 //        $new->hr = $_SESSION['hr'];
 //        $new->ww = $_SESSION['ww'];
 //        $new->ff = $_SESSION['ff'];
 //        $new->bb = $_SESSION['bb'];
 //        $new->mm = $_SESSION['mm'];
 //        $new->tt = $_SESSION['tt'];
 //        $new->aa = $_SESSION['aa'];
 //        R::store( $new );
 //   }
 //   else{
     
       
   
   // R::exec( 'UPDATE dna SET id=1');
     R::exec( 'UPDATE dna SET dog_id=:dog_id WHERE id = :id ', array(':dog_id'=> $dog_id, ':id' => $id));
     R::exec( 'UPDATE dna SET url_id=:url_id WHERE id = :id ', array(':url_id'=> $_SESSION['url_id'], ':id' => $id));
     R::exec( 'UPDATE dna SET hr=:hr WHERE id = :id ', array(':hr'=> $_SESSION['hr'], ':id' => $id));
     R::exec( 'UPDATE dna SET ww=:ww WHERE id = :id ', array(':ww'=> $_SESSION['ww'], ':id' => $id));
     R::exec( 'UPDATE dna SET ff=:ff WHERE id = :id ', array(':ff'=> $_SESSION['ff'], ':id' => $id));
     R::exec( 'UPDATE dna SET bb=:bb WHERE id = :id ', array(':bb'=> $_SESSION['bb'], ':id' => $id));
     R::exec( 'UPDATE dna SET mm=:mm WHERE id = :id ', array(':mm'=> $_SESSION['mm'], ':id' => $id));
     R::exec( 'UPDATE dna SET tt=:tt WHERE id = :id ', array(':tt'=> $_SESSION['tt'], ':id' => $id));
     R::exec( 'UPDATE dna SET aa=:aa WHERE id = :id ', array(':aa'=> $_SESSION['aa'], ':id' => $id));

   // }

//  вставляем статы
       
      //   $new = R::dispense('stats');
      //  echo '<br>2$new->id' . $new->id;


      //   if (0==($new->id)){
          
      //     $new->dog_id = $dog_id;
       
      //   $new->speed = $spd;
      //   $new->agility = $agl;
      //   $new->teach = $tch;
      //   $new->jump = $jmp;
      //   $new->scent = $nuh;
      //   $new->find = $fnd;
      //   $new->total = $ttl;
      //   R::store( $new );
      // }
      // else{
       
   
     R::exec( 'UPDATE stats SET dog_id=:dog_id WHERE id = :id ', array(':dog_id'=> $dog_id, ':id' => $id));
     R::exec( 'UPDATE stats SET speed=:speed WHERE id = :id ', array(':speed'=> $spd, ':id' => $id));
     R::exec( 'UPDATE stats SET agility=:agility WHERE id = :id ', array(':agility'=> $agl, ':id' => $id));
     R::exec( 'UPDATE stats SET teach=:teach WHERE id = :id ', array(':teach'=> $tch, ':id' => $id));
     R::exec( 'UPDATE stats SET jump=:jump WHERE id = :id ', array(':jump'=> $jmp, ':id' => $id));
     R::exec( 'UPDATE stats SET scent=:scent WHERE id = :id ', array(':scent'=> $nuh, ':id' => $id));
     R::exec( 'UPDATE stats SET find=:find WHERE id = :id ', array(':find'=> $fnd, ':id' => $id));
     R::exec( 'UPDATE stats SET total=:total WHERE id = :id ', array(':total'=> $ttl, ':id' => $id));
    //  }



     $_SESSION['price']=pricing($sex, '0');
    
        
      ?>
<h1 align="center">Доска объявлений</h1>
<h3 align="center">Актуальное предложение: предполагаемый окрас</h3>
<h3 align="center"><?php print_item($owner,1);?></h3>

<div>

       <div align="left">
        <img src = "<?php echo $url; ?>" width="300" >
        <table width="100" cellpadding="2" cellspacing="0" border="1" >
              <colgroup width="150">
                  <colgroup span="9" align="center" width="10">
                  <col span="5">
                  <col span="4">
              </colgroup>
              <tr border="1"> 
                     <td>пол</td><td><?php echo $sex; ?></td>
              </tr>
              <tr border="1"> 
                     <td>Скорость</td><td><?php echo $spd; ?></td>
              </tr>
              <tr border="1"> 
                     <td>Уворот</td><td><?php echo $agl; ?></td>
              </tr>
              <tr border="1"> 
                     <td>Обучение</td><td><?php echo $tch; ?></td>
              </tr>
              <tr border="1"> 
                     <td>Прыжки</td><td><?php echo $jmp; ?></td>
              </tr>
              <tr border="1"> 
                     <td>Обоняние</td><td><?php echo $nuh; ?></td>
              </tr>
              <tr border="1"> 
                     <td>Поиск</td><td><?php echo $fnd; ?></td>
              </tr>
              <tr border="1"> 
                     <td>Итого</td><td><?php echo $ttl; ?></td>
              </tr>
              </colgroup>
        </table>
      </div>

       <?php echo $_SESSION['bb']; ?>
      <h3><?php echo '<br> Цена: ' . number_format (pricing($sex, '0') , $decimals = 0,$dec_point = "." , $thousands_sep = " " ); // формат 10 000  ;?></h3>
          
<form action="/buy.php" method="POST">
       <button type="submit" class="knopka" name="buy">Купить</button>
       <a class="buttons" href="/kennel.php" >в питомник</a>
      
</form>
<?php
} 
////////////////////////////////////////////////////////////////////////////////////
      if( isset($_POST['buy']) ){  //если нажата кнопка ЭкупитьЭ

     
    


        //var_dump(bdika_balance($_SESSION['own'],$_SESSION['price']));
        if( bdika_balance($_SESSION['own'],$_SESSION['price']) ){
              buying($_SESSION['own'],$_SESSION['price']);
 ?>
              <h1 align="center">Доска объявлений</h1>
              <h3 align="center"><?php print_item($owner,1);?></h3>

<?php

              echo 'Проверьте покупку в питомнике! <br> Дайте собаке имя!<br> ';
             
             $date=date('d.m.Y');

             echo '<br>вносим в базу собаку';
             $_SESSION['dog_id']=insert_2_new_dogs('Без имени',$_SESSION['sex'],'КХС',$_SESSION['own'],find_where('users',get_id($_SESSION['own']),'kennel'),$date,$_SESSION['url_id']);

             var_dump($_SESSION['dog_id']);

             echo '<br>вносим статы';
             insert_new_stats($_SESSION['dog_id'],find_where('stats','0','speed'),find_where('stats','0','agility'),find_where('stats','0','teach'),find_where('stats','0','jump'),find_where('stats','0','scent'),find_where('stats','0','find'),find_where('stats','0','total'),find_where('stats','0','mutation'));
            
              echo '<br>вносим DNA';

              insert_new_dna($_SESSION['dog_id'],$_SESSION['url_id'],$_SESSION['hr'],$_SESSION['ww'], $_SESSION['ff'],$_SESSION['bb'],$_SESSION['mm'],$_SESSION['tt'],$_SESSION['aa']);



              echo '<a href="/name.php?id=' . $_SESSION['dog_id'] . '">';?>
              <img src = "<?php echo $_SESSION['url']; ?>"></a>

              <?php
          }//if(bdika_balance($owner,$price))
          else {
            echo 'Не достаточно средств для покупки!';
        ?>
            <a class="buttons" href="/buy.php" >в магазин</a>

        <?php            

          }
       }//if( isset($_POST['buy']) )

////////////////////////////////////////////////////////////////////////////////////
?>

 </div>