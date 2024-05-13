<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "ppc3";
 
return new PDO("mysql:host=$host;dbname=$database", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));

