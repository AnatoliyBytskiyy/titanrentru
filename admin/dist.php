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

$r=mysql_query("select * from cities order by name");

$count_d=0;
while (@$row=mysql_fetch_row($r))
{
 $ar[$count_d]=$row; //сохраняем из таблицы в двумерный массив
 $count_d++; // количестов записей для вывода (не всегда равно $countOnPage - на последней странице вывода, например)
}
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



$res_city = mysql_query("SELECT * FROM cities WHERE id = '". $id ."' limit 1"); 
$city_data = mysql_fetch_assoc($res_city);




	echo "<h2>Расстояния от города ".$city_data['name']."</h2>";
	echo "<div class='box1' style='width: 850px;'>";
	echo "<div class='box11'><a href='cities.php'>Вернуться</a></div>";
	echo "<form action='dist.php' method='post'>";
echo "
<table class='table' style='margin-top: 10px;'>";




for($j=0;$j<$count_d;$j++)
{
if($ar[$j][0]!=$id)
{
$res_km = mysql_query("SELECT * FROM dist WHERE city1 = '". $id ."' and city2= '".$ar[$j][0]."' limit 1"); 
$km_data = mysql_fetch_assoc($res_km);

echo "<tr>
<td style='text-align: right; width: 250px;'>".$ar[$j][1]."</td><td><input type='text' style='width: 170px;' name='dist".$ar[$j][0]."' class='mini' value='".$km_data['km']."' /></td>
</tr>";
}
}



echo "</table>
";	




    echo "<input type='hidden' name='id' value=$id>";
	echo "<input type='hidden' name='save' value='yes'>";
	echo "<br /><input type='submit' value='Сохранить' />";
	echo "</form>";
	echo "</div>";


}
else
{
	$id=$_POST['id'];
	for($j=0;$j<$count_d;$j++)
	{
		
		if($ar[$j][0]!=$id)
		{
			$dist_num="dist".$ar[$j][0];
			$dist=$_POST[$dist_num];
			
			$comm1=mysql_query("select count(*) from dist where city1='".$ar[$j][0]."' and city2=".$id);
			if($comm1) $count1 = mysql_result($comm1,0); 
			if($count1==0)
			{
			mysql_query("insert into dist (city1, city2, km) values ('".$ar[$j][0]."','".$id."','".$dist."')") or die("ошибка:".mysql_error());
			}
			else
			{
			 mysql_query("update dist set km='".$dist."' where city1='".$ar[$j][0]."' and city2='".$id."'") or die("ошибка");
			}
			
			$comm2=mysql_query("select count(*) from dist where city2='".$ar[$j][0]."' and city1=".$id);
			if($comm2) $count2 = mysql_result($comm2,0); 
			if($count2==0)
			{
			mysql_query("insert into dist (city2, city1, km) values ('".$ar[$j][0]."','".$id."','".$dist."')") or die("ошибка:".mysql_error());
			}
			else
			{
			 mysql_query("update dist set km='".$dist."' where city2='".$ar[$j][0]."' and city1='".$id."'") or die("ошибка");
			}
			
		}
		
	}	
	
	echo "<html><head>
	<meta http-equiv='Refresh' content='0; URL=cities.php'>
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