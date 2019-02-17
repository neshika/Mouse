<?php
require "db.php";
        //подключение файлов
        
        require(__DIR__ . '/html/header.html');
         require(__DIR__ . '/html/nav.html');
       // require "/html/header.html";
       // require "/html/nav.html";
        require "includes/functions.php"; 
        

//print_mouse();
print_tabl();
$id=0;
 if ( isset($_POST['comment']) ){ 
    $id=$_POST['comment'];
    echo $id;
 }
?>
  <div id="demoparagraph">
        <form name="test" method="post" action="test.php">
            <p><strong>выбирете id мыши</strong><Br>
            <textarea name="comment" cols="40" rows="1"></textarea></p>
            <p><input type="submit" value="Отправить">
            <input type="reset" value="Очистить"></p>
        </form>
    </div>
 <a href="/mouse.php?id=<?php echo $id;?>">ссылка на мышь: <?php echo $id;?> тут</a>
</div> 






