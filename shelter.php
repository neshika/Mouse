<?php
require "/libs/up.php";

        $array[] = R::getAssoc('SELECT id,name FROM animals WHERE owner = :owner && status = 1' ,
        [':owner' => 'shelter']);

           foreach($array as $item) {
              foreach ($item as $key => $value) {
                echo "<br><hr><a>";

/*сохранение данных о голости собаки + вязки/щенки*/
               
                $pol=find_where('animals', $key,'sex');
/*выводим на экран имя собаки как ссылку*/
                //echo '<a href="/name.php?id=' . $key . '">';?>

                <img src="<?php echo from_id_to_url($key);?>" width="10%" float="left">
                <?php
                detalis($key);
                }    
            echo "<br/>";
            }   // foreach($array as $item)
require "/libs/down.php";
?> 