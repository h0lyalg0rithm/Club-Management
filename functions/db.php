<?php
$connection = mysql_connect('localhost','root','');
$select_db = mysql_select_db('clubs');
if(!$connection && !$select_db){
    die('Error Call administrator');
}

?>