<?php
//файл db.php

require "libs/rb.php";
R::setup('mysql:host=localhost;dbname=bg',
        'root', 'root' ); //for both mysql or mariaDB
session_start();
//echo 'db включена';
