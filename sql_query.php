<?php
include 'connect.php';
$res_cont = mysql_query("select * from content where id='1' limit 1"); 
$cont_data = mysql_fetch_assoc($res_cont);
print_r($cont_data);

$res_cont = mysql_query("select id from content"); 
while($myrow = mysql_fetch_assoc($res_cont))
	echo '<br>'.$myrow["id"];
$res_cont = mysql_query("SHOW CREATE TABLE content"); 
$cont_data = mysql_fetch_assoc($res_cont);
print_r($cont_data);

//$res_cont = mysql_query("ALTER TABLE `content` ADD `keyword` TEXT NOT NULL DEFAULT '' AFTER `name_eng`, ADD `keyword_eng` TEXT NOT NULL DEFAULT '' AFTER `keyword`;");

try
{
	/*$res_cont = mysql_query("INSERT INTO `content`(`id`, `name`, `text`, `descr`, `text_eng`, `descr_eng`, `title`, `title_eng`, `name_eng`, `keyword`, `keyword_eng`) VALUES (5,'Новости','','','','','','','News','','');");
	echo "***".$res_cont."***";
	$res_cont = mysql_query("INSERT INTO `content`(`id`, `name`, `text`, `descr`, `text_eng`, `descr_eng`, `title`, `title_eng`, `name_eng`, `keyword`, `keyword_eng`) VALUES (6,'Новость_1','','','','','','','News_1','','');");
	echo "***".$res_cont."***";
	$res_cont = mysql_query("INSERT INTO `content`(`id`, `name`, `text`, `descr`, `text_eng`, `descr_eng`, `title`, `title_eng`, `name_eng`, `keyword`, `keyword_eng`) VALUES (7,'Новость_2','','','','','','','News_2','','');");
	echo "***".$res_cont."***";*/
	
	/*$res_cont = mysql_query("INSERT INTO `content`(`id`, `name`, `text`, `descr`, `text_eng`, `descr_eng`, `title`, `title_eng`, `name_eng`, `keyword`, `keyword_eng`) VALUES (8,'Аэропорт','','','','','','','Airport','','');");
	echo "***".$res_cont."***";*/
	
	/*$res_cont = mysql_query("UPDATE `content` SET `name`='Новости' WHERE `id`=5");
	echo "***".$res_cont."***";
	$res_cont = mysql_query("UPDATE `content` SET `name`='Новость_1' WHERE `id`=6");
	echo "***".$res_cont."***";
	$res_cont = mysql_query("UPDATE `content` SET `name`='Новость_2' WHERE `id`=7");
	echo "***".$res_cont."***";*/
	
	/*$res_cont = mysql_query("ALTER TABLE `content` CHANGE `descr` `descr` VARCHAR(300) NOT NULL");
	echo "***".$res_cont."***";*/
}
catch(Exception $e)
{
	print_r($e);
}
?>