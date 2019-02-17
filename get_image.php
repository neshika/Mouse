
<!-------------------<img src="<?php echo $url?>" width="100%"> -----$_POST['url']= $anwer;---------->

 
 <?php
 function picpic($url){

	echo $url;
 }
 function ret_need($array2, $need){

 		if (strrpos($array2 , $need)){
 			return "test/" . $need . "/" . $array2 . ".png";
 		}
 		
 		
 }
 function ret_img($array){ //hr_white
 		//$array='hr_shoko';
 		//var_dump($array);
 		$need='';
 		if (strrpos($array , 'r_')){
 			$anwer="test/hrhr/" . $array . ".png";
 		 		
 		}elseif(!strrpos($array , $need)){
 				$anwer="test/" . $array . ".png";

 		}else{
 			$need='MM';
 		if (strrpos($array , $need)) $anwer=ret_need($array, $need);
 		$need='TT';
 		if (strrpos($array , $need)) $anwer=ret_need($array, $need);
 		$need='TM';
 		if (strrpos($array , $need)) $anwer=ret_need($array, $need);
 		}
 		
 		//var_dump(preg_match('hr', $array));
 		//if (strpbrk($array, 'hr')){
 		//	echo "<br>pic/hrhr/" . $array . ".png<br>";
 		//}
 		//$array2='OrangeMM';
 		//var_dump($array2);
 		//echo "<br>pic/" . $array . ".png<br>";
 		//var_dump($anwer);
 		$anwer='/'.$anwer;
 		//echo $anwer;
 		//echo '<img src="' . $anwer . ">";
 		$_POST['url']= $anwer;
 		//var_dump($_POST['url']);
}





 
// $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
 //$GLOBALS["$hr_black"]

//пуховые виды ====================================================
	//черный пух
	$hr_black='<img src="pic/hrhr/hr_black.png">';
	$hr_blackMM='<img src="pic/hrhr/hr_blackMM.png">';

	//рыжий пух
	$hr_orange='<img src="pic/hrhr/hr_orange.png">';
	$hr_orangeMM='<img src="pic/hrhr/hr_orangeMM.png">';

	//шоко пух
	$hr_shoko='<img src="pic/hrhr/hr_shoko.png">';
	$hr_shokoMM='<img src="pic/hrhr/hr_shokoMM.png">';

	//белый пух
	$hr_white='<img src="pic/hrhr/hr_white.png">';
	$hr_white_sh='<img src="pic/hrhr/hr_white_sh.png">';




//echo 'проверка пятен и крапа';
	//голые виды ====================================================
//orange
	$orangeMM='<img src="pic/MM/OrangeMM.png"';
	$orange='<img src="pic/Orange.png">';

	//black
	$black='<img src="pic/black.png">';
	$blackTTMM='<img src="pic/TTMM/blackTTMM.png">';
	$blackMM='<img src="pic/MM/blackMM.png">';
	$blackTT='<img src="pic/TT/blackTT.png">';

	//shoko

	$shoko='<img src="pic/shoko.png">';
	$shokoTTMM='<img src="pic/TTMM/shokoTTMM.png">';
	$shokoMM='<img src="pic/MM/shokoMM.png">';
	$shokoTT='<img src="pic/TT/shokoTT.png">';

	//white
	$witeTTMM='<img src="pic/TTMM/whiteTTMM.png">';
	$white='<img src="pic/white.png">';

/*	//orange
	$orangeMM='<img src="pic/orange/OrangeMM.png"';
	$orange='<img src="pic/orange/Orange.png">';

	//black
	$black='<img src="pic/black/black.png">';
	$blackTTMM='<img src="pic/white/blackTTMM.png">';
	$blackMM='<img src="pic/white/blackMM.png">';
	$blackTT='<img src="pic/white/blackTT.png">';

	//shoko

	$shoko='<img src="pic/shoko/shoko.png">';
	$shokoTTMM='<img src="pic/white/shokoTTMM.png">';
	$shokoMM='<img src="pic/white/shokoMM.png">';
	$shokoTT='<img src="pic/white/shokoTT.png">';

	//white
	$witeTTMM='<img src="pic/white/whiteTTMM.png">';
	$white='<img src="pic/white/white.png">';


*/


/////////////////////////////////////////////////1.пуховки hrhr///////////////////////////////////////////


//1.3 пуховки шоко (шоко/шоко с пятнами)
function hr_shoko_ttmm($M){
	if ($M!='mm')	//если пятна
		ret_img('hr_shokoMM');
	else           //без пятен
		ret_img('hr_shoko');
}
//1.3 пуховки черный (черный/черный с пятнами)
function hr_black_ttmm($M){
	if ($M!='mm')	//если пятна
		ret_img('hr_blackMM');
	else           //без пятен
		ret_img('hr_black');
}

function hr_shoko_black($B, $M){
	if ($B=='bb')	//шоко
		hr_shoko_ttmm($M);
	else  //черный
		hr_black_ttmm($M);
}
//1.2 пуховки рыжий (рыжий/рыжий с пятнами)
function hr_orange_ttmm($M){
	if ($M!='mm')	//если пятна
		ret_img('hr_orangeMM');
	else           //без пятен
		ret_img('hr_orange');
}

function orange($F,$B,$M){
	if ($F!='ff')
		hr_orange_ttmm($M);
	else 
		hr_shoko_black($B, $M);


}

//1.1 пуховки белый (шоко/черный)
function hr_white_ttmm($B){	
	if ($B=='bb')	//шоко
		ret_img('hr_white_sh');
	else 			//черный
		ret_img('hr_white');
}


/////////////////////////////////////////////////2.голые Hrhr///////////////////////////////////////////

//1.1 голый белый (шоко/черный)
function white_ttmm($B,$T,$M){	
	if(($T=="tt") && ($M=="mm")){
			ret_img('white');
		}
		elseif (($T=="tt") && ($M!="mm")){
			if($B == "bb")
				ret_img('shokoMM');
			if(($B == "BB") || ($B == "Bb"))
				ret_img('blackMM');
		}
		elseif (($T!="tt") && ($M=="mm")){
			if($B == "bb") 
				ret_img('shokoTT');
			if(($B == "BB") || ($B == "Bb"))
				ret_img('blackTT');
		}
		else{
			if($B == "bb") 
				ret_img('shokoTTMM');
			if(($B == "BB") || ($B == "Bb"))
				ret_img('blackTTMM');
		}
}
//1.2 пуховки рыжий (рыжий/рыжий с пятнами)
function orange_ttmm($M){
	if ($M!='mm')	//если пятна
		ret_img('orangeMM');
	else           //без пятен
		ret_img('orange');
}
//1.3 пуховки шоко (шоко/шоко с пятнами)
function shoko_ttmm(){
	ret_img('shoko');
}
//1.3 пуховки черный (черный/черный с пятнами)
function black_ttmm(){
	ret_img('black');
}


//проверка голой=======================================================
function f_gol($W,$F,$B,$T,$M){
	if ($W=='ww'){	// если не белый цвет
		if ($F=='ff'){	//если не рыжий
			if ($B=='bb'){	//шоко
				shoko_ttmm();
			}
			if (($B == 'Bb') || ($B == 'BB')){ //черный
				black_ttmm();
			}
		}
					
		else{
			orange_ttmm($M);
		}
	}
				
	else{
		//белая
		white_ttmm($B,$T,$M);
	}
}


//проверка пуха===============================================================
function f_pooh($W,$F,$B,$T,$M){
		
	if($W=='ww')
		orange($F,$B,$M);
	
	else
		hr_white_ttmm($B);


	

}



// проверка голая или пух===========================================
function f_get_image($Hr,$W,$F,$B,$T,$M){
	//echo 'f_get_image($Hr,$W,$F,$B,$T,$M);';
	
		if ($Hr=="hrhr") // если пух
			f_pooh($W,$F,$B,$T,$M);
		else 
			f_gol($W,$F,$B,$T,$M);
			
}
/*                                             *************************    1 страница рандомная собака  */
function f_rand_col($param, $param2, $param3){
	$num=Rand(1,3);
	if ( $num == 1)
		$col = $param;
	if ($num == 2)
		$col = $param2;
	else
		$col = $param3;
	return $col;
	
}
