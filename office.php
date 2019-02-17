<?php
require "db.php";
		//подключение файлов
	
	//	require "/html/header.html";
	//	require "/html/nav.html";
	require(__DIR__ . '/html/header.html');
	require(__DIR__ . '/html/nav.html');
			
?><div class="content">
<?php
		require "includes/functions.php";
       // require(__DIR__ . 'includes/functions.php');
		//var_dump($_POST);

		echo 'Добро пожаловать, ' . $GLOBALS['name']=$_SESSION['logged_user']->login . ' .';
				//date('d.m.Y', time() - 86400);
		echo ' Сегодня: ' . date('d.m.Y');

		$id=get_id($_SESSION['logged_user']->login);
		$l_time= ret_Cell('l_time', $id,'users');
				$now=date('d.m.Y');  //03.08.2017
				$visits= ret_Cell('visits',$id,'users');
				//echo '<br>' . $visits . '<br>now ' .$now .'<br>f_time '. find_where('users', $id,'f_time');

				if($now!=$l_time){
				 // echo 'разые';
					$visits=$visits+1;

					insert_data('users',$id,'visits',$visits);
					insert_data('users',$id,'l_time',$now);

				}
				

				?><h3><li>Последние новости</li></h3>
<?php 
					if (isset($_POST['comment'])) { //если в форме NewDog включена кнопка отправки имени собаки
						//echo 'Поле было заполнено';
					echo '<br> родился малыш: ';
					echo $a = $_POST['comment'];
                                        
					   // echo $_SESSION['id_new'];
					insert_data('animals',$_SESSION['id_new'],'name',$_POST['comment']);
					  //  insert_name($_SESSION['id_new'],$_POST['comment']);

					 

              					if (ret_Cell('l_time', $id, 'users') == $now ) {
              						
              						//echo '<br> Чудо свершилось! рождены: <br>';

              						//$count = R::count( 'animals', 'owner = :owner && status = 1',[':owner' => $owner]);

              						
                      				
                      				$array[] = R::getAssoc('SELECT id FROM animals WHERE owner = :owner && status = 1' ,[':owner' => $_SESSION['logged_user']->login]);
                      				//debug($array);
                      				         foreach($array as $item) {
                            					foreach ($item as $key => $value) {
                            						if ( ('Без имени'==ret_cell('name', $key,'animals')) || (''==ret_cell('name', $key,'animals')) ){
                            							echo '<br>необходимо дать имя новой собаке: ';
                            							echo '<a href="/name.php?id=' . $key . '">';?>
                            						

                             							<img src="<?php echo ret_cell('url_puppy',$key,'animals');?>" width="5%" float="left"></a><?php
                             						}
                            					}
                            					
                            			           }
              						
              					} //find_where('users', $id,'l_time') == $now 
                                          } //isset($_POST['comment'])




?> 
				<h3><li>Важные события: </li></h3>
                    
				
<?php
                     if ( isset($_POST['shelter']) ){ 
                          echo 'Cобака продана!';


                          ?><img src="<?php echo from_id_to_url($_SESSION['Dog']);?>" width="5%"><?php
                            //echo $_SESSION['Dog'];
                           // echo $_SESSION['logged_user']->login;
                           // echo $id;
                          //******************************вносит в базу владелец становиться - SHELTER********************//
                           insert_data('animals',$_SESSION['Dog'],'owner','shelter');

                           //******************************получает пол собаки по id********************//
                            $sex=find_where('animals',$id,'sex');

                            //**********************  высчитываем стоимость в зависимости от параметров**************** //
                         $price=pricing($sex, $_SESSION['Dog']);
                         //**************************  уменьшаем стоимость на 50 % ***************** //

                         $price=$price/2;
                          put_money($_SESSION['logged_user']->login,$price);

                          echo '<br>Выручка составила: ' . $price;
 
                     }
                     
                     
                     
			  // require '/libs/down.php';
			  require_once(__DIR__ . '//libs/down.php');
