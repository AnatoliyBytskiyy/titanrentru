<?php
$id=$_GET['id'];

$db_name='avtotitan';
@$connect=mysql_connect("localhost","avto2","Pret1k4m9");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
mysql_select_db($db_name);
mysql_query("delete from cities where id=".$id);
mysql_query("delete from dist where city1=".$id);
mysql_query("delete from dist where city2=".$id);
mysql_close($connect);
$head="Location: cities.php";
header($head);


?>