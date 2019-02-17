<?php

require "db.php";
require "includes/functions.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<title>Молодые родители</title>
</head>
<body>
<h1 align="center">Выбирите собак для племенного разведения...</h1>
<div style="background: white; text-align: center; height: 350px; width: 350px; float:left; margin-left: 180px;">
	<?php 
	//echo "<br>" . f_bdika_sex();	//дает рандомный пол
/** Содаем рандомную собаку и выводим на экран **/	
  	$_SESSION['hr1']=$Hr=f_rand_col('HrHr','Hrhr','hrhr');
  	$_SESSION['ww1']=$W=f_rand_col('WW','Ww','ww');
  	$_SESSION['ff1']=$F=f_rand_col('FF','Ff','ff');
  	$_SESSION['bb1']=$B=f_rand_col('BB','Bb','bb');
  
  	$_SESSION['tt1']=$T=f_rand_col('TT','Tt','tt');
  	$_SESSION['mm1']=$M=f_rand_col('MM','Mm','mm');

      $all= "<br>".$Hr."<br>".$W."<br>".$F."<br>".$B."<br>".$T."<br>".$M;
    //echo $all;
      $_SESSION['url1']=$url=bdika_color ($Hr,$W,$F,$B,$T,$M);
     ?>
    <img src = "<?php echo $url; ?>">
</div>
<div style="background: blue; text-align: center; height: 350px; width: 350px; float: right; margin-right: 180px; ">
	<?php 
	//echo "<br>" . f_bdika_sex();	//дает рандомный пол
/** Содаем рандомную собаку и выводим на экран **/	
  	$_SESSION['hr2']=$Hr=f_rand_col('HrHr','Hrhr','hrhr');
    $_SESSION['ww2']=$W=f_rand_col('WW','Ww','ww');
    $_SESSION['ff2']=$F=f_rand_col('FF','Ff','ff');
    $_SESSION['bb2']=$B=f_rand_col('BB','Bb','bb');
  
    $_SESSION['tt2']=$T=f_rand_col('TT','Tt','tt');
    $_SESSION['mm2']=$M=f_rand_col('MM','Mm','mm');

      $all= "<br>".$Hr."<br>".$W."<br>".$F."<br>".$B."<br>".$T."<br>".$M;
    //echo $all;
      $_SESSION['url2']=$url=bdika_color ($Hr,$W,$F,$B,$T,$M);
     ?>
    <img src = "<?php echo $url; ?>">
</div>
<form action="rand_dog.php" method="POST">
<button type="submit" class="knopka" name="rand">еще варианты</button>
</form>
<form action="blank_prist.php" method="POST">
<button type="submit" class="knopka" name="rand">отлично</button>
</form>
<form action="index.php" method="POST">
<button type="submit" class="knopka" name="back">назад</button>
</form>
</body>
</html>
