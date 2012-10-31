<?php

$hostname = 'localhost';
$username = 'root';
$password = '';

$connection = mysql_connect($hostname,$username,$password);
if(!$connection){
    die('Cant connect to DB');
}


?>