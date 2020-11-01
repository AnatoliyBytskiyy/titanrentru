<?php
session_start();
if(isset($_SESSION['pass']))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>
Админка
</title>

<meta http-equiv=Content-Type content="text/html; charset=windows-1251" />
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class='outer'>

<?php

$db_name='avtotitan';
@$connect=mysql_connect("localhost","avto2","Pret1k4m9");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
mysql_query ("set character_set_client='cp1251'");
mysql_query ("set character_set_results='cp1251'");
mysql_query ("set collation_connection='cp1251_general_ci'");
mysql_select_db($db_name); 






echo "<h2>Каталог автомобилей</h2>";
	echo "<div class='box' style='width: 700px;'>";
echo "<div class='box11'><a href='index.php'>В Главное меню</a></div>";


echo "<ul class='sub11'>";

$r1=mysql_query("SELECT * FROM `types` order by id");
$count_d1=0;
while (@$row1=mysql_fetch_row($r1))
{
 $ar1[$count_d1]=$row1; //сохраняем из таблицы в двумерный массив
 $count_d1++; // количестов записей для вывода (не всегда равно $countOnPage - на последней странице вывода, например)
}
for($j=0;$j<$count_d1;$j++)
{

	echo "<li> <a href='edit_subtype1.php?id=".$ar1[$j][0]."' style='border: none;' title='редактировать'><img src='b_edit.png' style='vertical-align: middle;'/></a> <a href='catalog.php?type=".$ar1[$j][0]."' style='font-weight: bold;'>".$ar1[$j][1]."</a></li>";



}

echo	"</ul>";
	

echo "<br /><a href='period.php'>Периоды</a>";	








	echo "</div>";
?>
</div>
</body>
</html>
<?php
}
else
{echo "Вы не авторизированы";}
?>