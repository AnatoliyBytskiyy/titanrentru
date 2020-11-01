<?php
session_start();
if(isset($_SESSION['pass']))
{
	$db_name='avtotitan';
	@$connect=mysql_connect("localhost","avto2","Pret1k4m9");
	mysql_query("SET NAMES 'cp1251'");
	mysql_query("SET CHARACTER SET 'cp1251'");
	mysql_query ("set character_set_client='cp1251'");
	mysql_query ("set character_set_results='cp1251'");
	mysql_query ("set collation_connection='cp1251_general_ci'");
	mysql_select_db($db_name);
?>
<html>
<head>
<title>
Админка
</title>
<meta http-equiv=Content-Type content="text/html; charset=windows-1251" />


<link href='style.css' type='text/css' rel='stylesheet' />

</head>
<body>

<?php

if(!isset($_POST['save']))
{if(!isset($_GET['id'])) {die('Товарищ, хакер, - так ничего не получится!!! )');}
$id=$_GET['id'];
$type_d=mysql_query("select * from types where id='".$id."' limit 1");
$type_data = mysql_fetch_assoc($type_d);



	echo "<h2>".$type_data['name']."</h2>";
	echo "<div class='box1' style='width: 850px;'>";
	echo "<div class='box11'><a href='gallery.php'>Вернуться</a></div>";
	echo "<form action='edit_subtype1.php' method='post'>";
	echo "Название: <input type='text' size='40' name='name' value='".$type_data['name']."'> &nbsp; ";	
	echo "Название (англ): <input type='text' size='40' name='name_eng' value='".$type_data['name_eng']."'><br /><br />";	
	echo "Description: <input type='text' size='70' name='descr' value='".$type_data['descr']."' class='mini'><br /><br />";	
	echo "Description (англ): <input type='text' size='70' name='descr_eng' value='".$type_data['descr_eng']."' class='mini'><br /><br />";	
	echo "<input type='hidden' name='id' value=$id>";
	echo "<input type='hidden' name='save' value='yes'>";
	echo "<br /><input type='submit' value='Сохранить' />";
	echo "</form>";
	echo "</div>";

}
else
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$name_eng=$_POST['name_eng'];
	$descr=$_POST['descr'];		
	$descr_eng=$_POST['descr_eng'];	



	mysql_query("update types set name='".$name."', descr='".$descr."', name_eng='".$name_eng."', descr_eng='".$descr_eng."' where id='".$id."'") or die("ошибка");
	mysql_close($connect);
   	//$head="Location: news.php";
	//header($head);
	echo "<html><head>
	<meta http-equiv='Refresh' content='0; URL=gallery.php'>
	</head></html>";
	exit();

	
}

?>

</body>
</html>
<?php
}
else
{
echo "Вы не авторизированы";
}
?>