<?php
//файл db.php

require "libs/rb.php";
R::setup('mysql:host=localhost;dbname=bg',
      'root', 'root' ); //for both mysql or mariaDB
//R::setup('mysql:host=localhost;dbname=id8694121_bg',
       // 'id8694121_neshika', '321478828' ); //for both mysql or mariaDB
session_start();
//echo 'db включена';
