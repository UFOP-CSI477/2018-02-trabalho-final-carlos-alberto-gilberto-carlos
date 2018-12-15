<?php

$database = "mymed";
$dbusername = "root";
$dbpassword = "";
$dbhost = "127.0.0.1";
$mysql = "mysql:host=$dbhost;dbname=$database";

$connection = new PDO($mysql, $dbusername, $dbpassword);

