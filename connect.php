<?php
$db_name='avtotitan';
@$connect=mysql_connect("localhost","avto2","Pret1k4m9");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
mysql_query ("set character_set_client='cp1251'"); 
mysql_query ("set character_set_results='cp1251'"); 
mysql_query ("set collation_connection='cp1251_general_ci'");
mysql_select_db($db_name);
?>