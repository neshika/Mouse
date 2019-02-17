<?php

       require "/libs/up.php";
   $owner=ret_owner();
        //$test1=0;
        //$test2=0;
        //$test3=0;
        //$test4=0;

function vip_buy(){
   $_SESSION['sex']=f_bdika_sex();
   $_SESSION['spd']=Rand(9,11);
   $_SESSION['agl']=Rand(9,11);
  $_SESSION['tch']=Rand(9,11);
  $_SESSION['jmp']=Rand(9,11);
  $_SESSION['nuh']=Rand(9,11);
  $_SESSION['fnd']=Rand(9,11);
  $_SESSION['ttl']=($_SESSION['spd']+$_SESSION['agl']+$_SESSION['tch']+$_SESSION['jmp']+$_SESSION['nuh']+$_SESSION['fnd']);
  $_SESSION['ttl']=number_format ($_SESSION['ttl'] , $decimals = 1 ,$dec_point = "." , $thousands_sep = " " );

     $dna = rand_dog();
     $_SESSION['url']=do_url($dna);
     $_SESSION['url_rev'] = strrev($_SESSION['url']);
     $_SESSION['url_rev'] = str_split($_SESSION['url_rev']);
     //debug($url_rev);
     $_SESSION['bb']=$_SESSION['url_rev'][11];
     $_SESSION['hr']=$_SESSION['url_rev'][17];

    //echo '<br>b= ' . $_SESSION['bb'] . 'hr ' . $_SESSION['hr'];
       
       if('сука'==$_SESSION['sex'])
          $_SESSION['pic_sex']='<img src = "/pic/female_mini.png">';
      else
          $_SESSION['pic_sex']='<img src = "/pic/male_mini.png">';


        //////////////////// проверка цены ........
    $_SESSION['cost']=0;
        if('сука'==$_SESSION['sex']){
          if(1==$_SESSION['hr']){ //голая
              if(0==$_SESSION['bb'])//шоко
                $_SESSION['cost']=75000;
              else
                $_SESSION['cost']=45000;
          }
          if(0==$_SESSION['hr']){ //пух
            if(0==$_SESSION['bb'])//шоко
                $_SESSION['cost']=40000;
              else
                $_SESSION['cost']=25000;
          }

        }
        if('кобель'==$_SESSION['sex']){
          if(1==$_SESSION['hr']){ //голый
              if(0==$_SESSION['bb'])//шоко
                $_SESSION['cost']=55000;
              else
                $_SESSION['cost']=35000;
          }
          if(0==$_SESSION['hr']){ //пух
            if(0==$_SESSION['bb'])//шоко
                $_SESSION['cost']=35000;
              else
                $_SESSION['cost']=10000;
          }
        }
}        
?>

<form method="POST" action="/buy.php">
    <table border="1" cellpadding="60" text-align="center">
    <caption><h1>Aктуальные предложения на сегодня</h1></caption>
         
      <tr>
        

                ?><h3 align="center"><?php print_item($owner,1); //  рисует деньги?></h3>
                  <td>
                    <?php if ( !isset($_POST['buy']) ){ //усли не нажали кнопку купить
                           vip_buy();
                           
                          
                       
                      
                    ?>Первая ячейка VIP<?php echo $_SESSION['pic_sex'];?>
                      <img align="center" src = "<?php echo $_SESSION['url'];?>" width="75%">
               
                

                            ?><button type="submit" class="knopka" name="buy">Купить</button>
                            <?php echo $test1=0;?>

                              
                       

          <h3><img src = "<?php echo ret_item('1');?>"> 
          <?php echo $_SESSION['cost'];?></h3>


            <table width="100" cellpadding="2" cellspacing="0" border="1" >
                <colgroup width="10" span="9"  width="10">
                  
               <tr> 
                     <td>пол</td><td><?php echo $_SESSION['sex']; ?></td>
              </tr>
              <tr> 
                     <td>Скорость</td><td><?php echo $_SESSION['spd']; ?></td>
              </tr>
              <tr> 
                     <td>Уворот</td><td><?php echo $_SESSION['agl']; ?></td>
              </tr>
              <tr> 
                     <td>Обучение</td><td><?php echo $_SESSION['tch']; ?></td>
              </tr>
              <tr> 
                     <td>Прыжки</td><td><?php echo $_SESSION['jmp']; ?></td>
              </tr>
              <tr> 
                     <td>Обоняние</td><td><?php echo $_SESSION['nuh']; ?></td>
              </tr>
              <tr> 
                     <td>Поиск</td><td><?php echo $_SESSION['fnd']; ?></td>
              </tr>
              <tr> 
                     <td>Итого</td><td><?php echo $_SESSION['ttl']; ?></td>
              </tr>
              </colgroup>
        </table>

        <?php } //end if
                else{
                      
                      ?><button type="submit" class="knopka" name="buyoff">продана</button><?php 
                      echo $test1=1;
                    }
          
          ?>


        </td>
        <td><?php if ( !isset($_POST['buy2']) ){ //усли не нажали кнопку купить?>
                          Вторая ячейка<button type="submit" class="knopka" name="buy2" >Купить</button>
                  <?php echo $test2=0;
                }
                  else{
                      echo $test2=1;
                      ?><button type="submit" class="knopka" name="buyoff">продана</button><?php 
                    }
          
          ?>

        </td>
        <td>Третья ячейка<button type="submit" class="knopka" name="money" >Купить</button></td>
        <td>Четвертая ячейка<button type="submit" class="knopka" name="money" >Купить</button></td>

        
      </tr>

    </table>
</form>

