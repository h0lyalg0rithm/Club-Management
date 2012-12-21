<?php

/*
$str = "0:0;1:0;2:0;3:1";
$exp1 = explode(";", $str);

//$exp[] = explode(":", $exp1);
 print_r($exp1);
 echo $exp1[0].' ';
 
 foreach($exp1 as $k){
     $exp[] = explode(":", $k);
 }
 echo "<br>";
 print_r($exp);
 echo $exp[3][0];
$time_start = microtime(true);

// Sleep for a while
sleep(5);

$time_end = microtime(true);
$time = $time_end - $time_start;

echo "Did nothing in $time seconds\n";
 */
/*
 $time_start = microtime(true);
 $hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'clubs';
$connection = mysql_connect($hostname,$username,$password);
if(!$connection){
    die('Cant connect to DB');
}
mysql_select_db($database);
//$query = "INSERT INTO test(name, studid, email) VALUES ('test','123','email@email.com')";
$query = "SELECT * from test";
$done = mysql_query($query);
if(!$done){
    die('cant do the query');
}
for($i=0;$i<=4;$i++){
mysql_query($query);
}
$time_end = microtime(true);
$time = $time_end - $time_start;

echo "Did nothing in $time seconds\n";*/

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'clubs';
$connection = mysql_connect($hostname,$username,$password);
if(!$connection){
    die('Cant connect to DB');
}
mysql_select_db($database);
$query = 'INSERT INTO test(name, studid, email) VALUES ("test",12233,"email@email.com")';
$done = mysql_query($query);
$id = mysql_insert_id($connection);
echo $id;




 
?>