<?php
$connection = mysql_connect('localhost','root','');
mysql_select_db('clubs');
if(!$connection){
    die('Error Call administrator');
}

?>