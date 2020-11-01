<?php
session_start();
if(isset($_SESSION['pass']))
{
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
if($id=='new')
{
	echo "<div class='box1' style='width: 850px;'>";
	echo "<div class='box11'><a href='cities.php'>Вернуться</a></div>";
	echo "<form action='edit_city.php' method='post'>";
	echo "Город: <input type='text' style='width: 320px;' name='title'>";
	echo " &nbsp; Город (англ): <input type='text' style='width: 320px;' name='title_eng'><br />";
	echo "<input type='hidden' name='id' value=$id>";
	echo "<input type='hidden' name='save' value='yes'>";
	echo "<br /><input type='submit' value='Сохранить' />";
	echo "</form>";
	echo "</div>";
}
else
{
$db_name='avtotitan';
@$connect=mysql_connect("localhost","avto2","Pret1k4m9");
	mysql_query("SET NAMES 'cp1251'");
	mysql_query("SET CHARACTER SET 'cp1251'");
	mysql_select_db($db_name);
	$quer="select * from cities where id='".$id."' limit 1";
	$r=mysql_query($quer);
	$count_d=0;
	while (@$row=mysql_fetch_row($r))
	{
	$ar[$count_d]=$row; //сохраняем из таблицы в двумерный массив
	$count_d++; // количестов записей для вывода (не всегда равно $countOnPage - на последней странице вывода, например)
	}
	echo "<div class='box1' style='width: 850px;'>";
	echo "<div class='box11'><a href='cities.php'>Вернуться</a></div>";
	echo "<form action='edit_city.php' method='post'>";

	echo "Город: <input type='text' style='width: 320px;' name='title' value='".$ar[0][1]."'>";
	echo " &nbsp; Город (англ): <input type='text' style='width: 320px;' name='title_eng' value='".$ar[0][2]."'><br />";
	

    echo "<input type='hidden' name='id' value=$id>";
	echo "<input type='hidden' name='save' value='yes'>";
	echo "<br /><input type='submit' value='Сохранить' />";
	echo "</form>";
	echo "</div>";
}
}
else
{

$db_name='avtotitan';
@$connect=mysql_connect("localhost","avto2","Pret1k4m9");
	mysql_query("SET NAMES 'cp1251'");
	mysql_query("SET CHARACTER SET 'cp1251'");
	mysql_query ("set character_set_client='cp1251'");
	mysql_query ("set character_set_results='cp1251'");
	mysql_query ("set collation_connection='cp1251_general_ci'");
	mysql_select_db($db_name);

	$id=$_POST['id'];
	$title=$_POST['title'];
	$title_eng=$_POST['title_eng'];
	
	
	if($id=='new')
	{
	mysql_query("insert into cities (name,name_eng) values ('".$title."','".$title_eng."')") or die("ошибка");
	mysql_close($connect);


    
	echo "<html><head>
	<meta http-equiv='Refresh' content='0; URL=cities.php'>
	</head></html>";
	exit();
	//$head="Location: news.php";
	//header($head);


	}
	else
	{
	mysql_query("update cities set name='".$title."', name_eng='".$title_eng."' where id='".$id."'") or die("ошибка");
	mysql_close($connect);
   	//$head="Location: news.php";
	//header($head);
	echo "<html><head>
	<meta http-equiv='Refresh' content='0; URL=cities.php'>
	</head></html>";
	exit();

	}
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