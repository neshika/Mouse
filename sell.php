<?php
require "/libs/up.php";
 if ( isset($_POST['shelter']) ){ 

    insert_data('animals',$id,'owner','shelter');
    header ('Location:/office.php');
        exit;
}
?>
