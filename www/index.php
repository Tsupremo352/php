<?php
    require_once 'vendor/autoload.php';
    new PDO("pgsql:host=db;dbname=php","root","0352");
    echo "Connected";
?>