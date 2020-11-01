<?php
session_start();
if(isset($_SESSION['pass']))
{
$text=stripslashes($_POST['txt']);
$text_eng=stripslashes($_POST['txt_eng']);
$descr=stripslashes($_POST['descr']);
$title=$_POST['title'];
$title_eng=$_POST['title_eng'];
$cont_id=$_POST['cont_id'];
$descr_eng=stripslashes($_POST['descr_eng']);
$keyword=stripslashes($_POST['keyword']);
$keyword_eng=stripslashes($_POST['keyword_eng']);
$h1=stripslashes($_POST['h1']);
$h1_eng=stripslashes($_POST['h1_eng']);
$db_name='avtotitan';
@$connect=mysql_connect("localhost","avto2","Pret1k4m9");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
mysql_query ("set character_set_client='cp1251'");
mysql_query ("set character_set_results='cp1251'");
mysql_query ("set collation_connection='cp1251_general_ci'");
mysql_select_db($db_name);
mysql_query("update content set text='".$text."', descr='".$descr."',text_eng='".$text_eng."',descr_eng='".$descr_eng."',title='".$title."',title_eng='".$title_eng."',keyword='".$keyword."',keyword_eng='".$keyword_eng."',name='".$h1."',name_eng='".$h1_eng."' where id='".$cont_id."'") or die("ошибка");
header("Location: index.php");
}
else
{
echo "Вы не авторизированы";
}
?>

