<?php
$id=$_GET['id'];
$type=$_GET['type'];
$db_name='avtotitan';
@$connect=mysql_connect("localhost","avto2","Pret1k4m9");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
mysql_select_db($db_name);
mysql_query("delete from catalog where id=".$id);
mysql_close($connect);
include("del_dir.php");
$dir="../catalog_photo/".$id;
del_dir($dir);
$head="Location: catalog.php?type=".$type;
header($head);




?>