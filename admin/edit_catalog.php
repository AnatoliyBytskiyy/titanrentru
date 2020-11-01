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

	
$res_cont = mysql_query("select * from period where id='1' limit 1"); 
$period_data = mysql_fetch_assoc($res_cont);	

?>
<html>
<head>
<title>
Админка
</title>
<meta http-equiv=Content-Type content="text/html; charset=windows-1251" />
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({
content_css : "tinypp.css",
	theme : "advanced",
	mode : "textareas",
	language:"ru",
	paste_strip_class_attributes : "all",
	plugins : "lists, safari, pagebreak, style, layer, table, save, advhr, advimage, advlink, emotions, iespell, inlinepopups, insertdatetime, preview, media, searchreplace, print, contextmenu, paste, directionality, fullscreen, noneditable, visualchars, nonbreaking, xhtmlxtras, template",
	 theme_advanced_buttons1 : "bullist, bold",
    theme_advanced_buttons2 : "",
   theme_advanced_buttons3 : "",


theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true
});
</script>
<link href='style.css' type='text/css' rel='stylesheet' />

</head>
<body>

<?php

if(!isset($_POST['save']))
{if(!isset($_GET['id'])) {die('Товарищ, хакер, - так ничего не получится!!! )');}
$id=$_GET['id'];
$type=$_GET['type'];



$res_type = mysql_query("SELECT * FROM types WHERE id = '". $type ."' limit 1"); 
$type_data = mysql_fetch_assoc($res_type);





if($id=='new')
{
	echo "<h2>Добавление нового автомобиля (".$type_data['name'].")</h2>";
	echo "<div class='box1' style='width: 850px;'>";
	echo "<div class='box11'><a href='catalog.php?type=$type'>Вернуться</a></div>";
	echo "<form action='edit_catalog.php' method='post'>";
	echo "№ п/п: <input type='text' size='4' name='pp'> &nbsp;&nbsp;&nbsp;&nbsp; Название: <input type='text' size='70' name='title'> &nbsp;&nbsp; ";

echo "
<table class='table' style='margin-top: 10px;'>
<tr>
<td style='text-align: right;'>Год выпуска</td><td><input type='text' style='width: 170px;' name='year' class='mini' /></td><td style='width: 110px; text-align: right;'>Цвет</td><td><input type='text' style='width: 170px;' name='color' class='mini' /></td><td style='width: 110px; text-align: right;'>Объем дв.</td><td><input type='text' style='width: 170px;' name='v' class='mini' /></td>
</tr>
<tr>
<td style='text-align: right;'>Мощность</td><td><input type='text' style='width: 170px;' name='p' class='mini' /></td><td style='width: 110px; text-align: right;'>КПП</td><td>
<select name='kpp' style='width: 170px; font-size: 12px;'>
<option value='1'>механика</option>
<option value='2'>автомат</option>
</select>
</td><td style='width: 110px; text-align: right;'>Дверей</td><td><input type='text' style='width: 170px;' name='dver' class='mini' /></td>
</tr>
<tr>
<td style='text-align: right;'>Пассажиров</td><td><input type='text' style='width: 170px;' name='men' class='mini' /></td><td style='width: 110px; text-align: right;'>Мест багажа</td><td><input type='text' style='width: 170px;' name='bag' class='mini' /></td><td style='width: 110px; text-align: right;'>Цвет (англ)</td><td><input type='text' style='width: 170px;' name='color_eng' class='mini' /></td>
</tr>
</table>
";	

echo "<br /><br />Период: <b>".$period_data['period1']."</b>";
echo "
<table class='table' style='margin-top: 5px;'>
<tr>
<td style='text-align: right;'>1-3</td><td><input type='text' style='width: 70px;' name='cena1' class='mini' /></td><td style='text-align: right;'>4-14</td><td><input type='text' style='width: 70px;' name='cena2' class='mini' /></td><td style='text-align: right;'>15-30</td><td><input type='text' style='width: 70px;' name='cena3' class='mini' /></td><td style='text-align: right;'>31+</td><td><input type='text' style='width: 70px;' name='cena4' class='mini' /></td><td style='text-align: right;'>залог</td><td><input type='text' style='width: 70px;' name='cena5' class='mini' /></td>
</tr>
</table>
";

echo "<br /><br />Период: <b>".$period_data['period2']."</b>";
echo "
<table class='table' style='margin-top: 5px;'>
<tr>
<td style='text-align: right;'>1-3</td><td><input type='text' style='width: 70px;' name='cena21' class='mini' /></td><td style='text-align: right;'>4-14</td><td><input type='text' style='width: 70px;' name='cena22' class='mini' /></td><td style='text-align: right;'>15-30</td><td><input type='text' style='width: 70px;' name='cena23' class='mini' /></td><td style='text-align: right;'>31+</td><td><input type='text' style='width: 70px;' name='cena24' class='mini' /></td><td style='text-align: right;'>залог</td><td><input type='text' style='width: 70px;' name='cena25' class='mini' /></td>
</tr>
</table>
";

echo "<br /><br />Период: <b>".$period_data['period3']."</b>";
echo "
<table class='table' style='margin-top: 5px;'>
<tr>
<td style='text-align: right;'>1-3</td><td><input type='text' style='width: 70px;' name='cena31' class='mini' /></td><td style='text-align: right;'>4-14</td><td><input type='text' style='width: 70px;' name='cena32' class='mini' /></td><td style='text-align: right;'>15-30</td><td><input type='text' style='width: 70px;' name='cena33' class='mini' /></td><td style='text-align: right;'>31+</td><td><input type='text' style='width: 70px;' name='cena34' class='mini' /></td><td style='text-align: right;'>залог</td><td><input type='text' style='width: 70px;' name='cena35' class='mini' /></td>
</tr>
</table>
";
	
	echo "<br /><br />Еще характеристики: <textarea cols='80' rows='6' name='txt'>";
 	echo "</textarea><br /><br />";	
	echo "<br /><br />Еще характеристики (англ): <textarea cols='80' rows='6' name='txt_eng'>";
 	echo "</textarea>";		

    echo "<input type='hidden' name='id' value=$id>";
    echo "<input type='hidden' name='type' value=$type>";	
	echo "<input type='hidden' name='save' value='yes'>";
	echo "<br /><input type='submit' value='Сохранить' />";
	echo "</form>";
	echo "</div>";
}
else
{

	$quer="select * from catalog where id='".$id."' limit 1";
	$r=mysql_query($quer);
	$count_d=0;
	while (@$row=mysql_fetch_row($r))
	{
	$ar[$count_d]=$row; //сохраняем из таблицы в двумерный массив
	$count_d++; // количестов записей для вывода (не всегда равно $countOnPage - на последней странице вывода, например)
	}
	echo "<h2>".$ar[0][2]."</h2>";
	echo "<div class='box1' style='width: 850px;'>";
	echo "<div class='box11'><a href='catalog.php?type=$type'>Вернуться</a></div>";
	echo "<form action='edit_catalog.php' method='post'>";

	echo "№ п/п: <input type='text' size='4' name='pp' value='".$ar[0][22]."'> &nbsp;&nbsp;&nbsp;&nbsp; Название: <input type='text' size='70' name='title' value='".$ar[0][2]."'> &nbsp;&nbsp; ";
	

echo "
<table class='table' style='margin-top: 10px;'>
<tr>
<td style='text-align: right;'>Год выпуска</td><td><input type='text' style='width: 170px;' name='year' class='mini' value='".$ar[0][5]."' /></td><td style='width: 110px; text-align: right;'>Цвет</td><td><input type='text' style='width: 170px;' name='color' class='mini' value='".$ar[0][6]."' /></td><td style='width: 110px; text-align: right;'>Объем дв.</td><td><input type='text' style='width: 170px;' name='v' class='mini' value='".$ar[0][7]."' /></td>
</tr>
<tr>
<td style='text-align: right;'>Мощность</td><td><input type='text' style='width: 170px;' name='p' class='mini' value='".$ar[0][8]."' /></td><td style='width: 110px; text-align: right;'>КПП</td><td>
<select name='kpp' style='width: 170px; font-size: 12px;'>";
if($ar[0][9]==1) {$sel1="selected='selected'";} else {$sel1="";}
if($ar[0][9]==2) {$sel2="selected='selected'";} else {$sel2="";}

echo "
<option value='1' ".$sel1.">механика</option>
<option value='2' ".$sel2.">автомат</option>
</select>
</td><td style='width: 110px; text-align: right;'>Дверей</td><td><input type='text' style='width: 170px;' name='dver' class='mini' value='".$ar[0][36]."' /></td>
</tr>
<tr>
<td style='text-align: right;'>Пассажиров</td><td><input type='text' style='width: 170px;' name='men' class='mini' value='".$ar[0][37]."' /></td><td style='width: 110px; text-align: right;'>Мест багажа</td><td><input type='text' style='width: 170px;' name='bag' class='mini' value='".$ar[0][38]."'  /></td><td style='width: 110px; text-align: right;'>Цвет (англ)</td><td><input type='text' style='width: 170px;' name='color_eng' class='mini' value='".$ar[0][12]."' /></td>
</tr>
</table>
";	

echo "<br /><br />Период: <b>".$period_data['period1']."</b>";
echo "
<table class='table' style='margin-top: 20px;'>
<tr>
<td style='text-align: right;'>1-3</td><td><input type='text' style='width: 70px;' name='cena1' class='mini' value='".$ar[0][15]."' /></td><td style='text-align: right;'>4-14</td><td><input type='text' style='width: 70px;' name='cena2' class='mini' value='".$ar[0][16]."' /></td><td style='text-align: right;'>15-30</td><td><input type='text' style='width: 70px;' name='cena3' class='mini' value='".$ar[0][17]."' /></td><td style='text-align: right;'>31+</td><td><input type='text' style='width: 70px;' name='cena4' class='mini' value='".$ar[0][18]."' /></td><td style='text-align: right;'>залог</td><td><input type='text' style='width: 70px;' name='cena5' class='mini' value='".$ar[0][19]."' /></td>
</tr>
</table>
";

echo "<br /><br />Период: <b>".$period_data['period2']."</b>";
echo "
<table class='table' style='margin-top: 5px;'>
<tr>
<td style='text-align: right;'>1-3</td><td><input type='text' style='width: 70px;' name='cena21' class='mini' value='".$ar[0][23]."' /></td><td style='text-align: right;'>4-14</td><td><input type='text' style='width: 70px;' name='cena22' class='mini' value='".$ar[0][24]."' /></td><td style='text-align: right;'>15-30</td><td><input type='text' style='width: 70px;' name='cena23' class='mini' value='".$ar[0][25]."' /></td><td style='text-align: right;'>31+</td><td><input type='text' style='width: 70px;' name='cena24' class='mini' value='".$ar[0][26]."' /></td><td style='text-align: right;'>залог</td><td><input type='text' style='width: 70px;' name='cena25' class='mini' value='".$ar[0][27]."' /></td>
</tr>
</table>
";



echo "<br /><br />Период: <b>".$period_data['period3']."</b>";
echo "
<table class='table' style='margin-top: 5px;'>
<tr>
<td style='text-align: right;'>1-3</td><td><input type='text' style='width: 70px;' name='cena31' class='mini' value='".$ar[0][28]."' /></td><td style='text-align: right;'>4-14</td><td><input type='text' style='width: 70px;' name='cena32' class='mini' value='".$ar[0][29]."' /></td><td style='text-align: right;'>15-30</td><td><input type='text' style='width: 70px;' name='cena33' class='mini' value='".$ar[0][30]."' /></td><td style='text-align: right;'>31+</td><td><input type='text' style='width: 70px;' name='cena34' class='mini' value='".$ar[0][31]."' /></td><td style='text-align: right;'>залог</td><td><input type='text' style='width: 70px;' name='cena35' class='mini' value='".$ar[0][32]."' /></td>
</tr>
</table>
";

	
	echo "<br /><br />Еще характеристики: <textarea cols='80' rows='6' name='txt'>";
	echo $ar[0][3];
 	echo "</textarea><br /><br />";	
	echo "<br /><br />Еще характеристики (англ): <textarea cols='80' rows='6' name='txt_eng'>";
	echo $ar[0][4];
 	echo "</textarea>";		
	
	
    echo "<input type='hidden' name='id' value=$id>";
	echo "<input type='hidden' name='type' value=$type>";
	echo "<input type='hidden' name='save' value='yes'>";
	echo "<br /><input type='submit' value='Сохранить' />";
	echo "</form>";
	echo "</div>";
}
}
else
{
	$id=$_POST['id'];
	$type=$_POST['type'];

	$name=$_POST['title'];	
	$year=$_POST['year'];
	$color=$_POST['color'];
	$v=$_POST['v'];
	$p=$_POST['p'];
	$kpp=$_POST['kpp'];
	//$kuzov=$_POST['kuzov'];
	//$salon=$_POST['salon'];
	$color_eng=$_POST['color_eng'];
	//$kuzov_eng=$_POST['kuzov_eng'];
	//$salon_eng=$_POST['salon_eng'];
	$cena1=$_POST['cena1'];
	$cena2=$_POST['cena2'];
	$cena3=$_POST['cena3'];
	$cena4=$_POST['cena4'];
	$cena5=$_POST['cena5'];
	$text=$_POST['txt'];
	$text_eng=$_POST['txt_eng'];	
	//$oil=$_POST['oil'];
	//$oil_eng=$_POST['oil_eng'];	
	$pp=$_POST['pp'];	

	$cena21=$_POST['cena21'];
	$cena22=$_POST['cena22'];
	$cena23=$_POST['cena23'];
	$cena24=$_POST['cena24'];
	$cena25=$_POST['cena25'];	
	$cena31=$_POST['cena31'];
	$cena32=$_POST['cena32'];
	$cena33=$_POST['cena33'];
	$cena34=$_POST['cena34'];
	$cena35=$_POST['cena35'];	
	
	$dver=$_POST['dver'];
	$men=$_POST['men'];
	$bag=$_POST['bag'];

	if($id=='new')
	{
	mysql_query("insert into catalog (type,name,year,color,v,p,kpp,color_eng,cena1,cena2,cena3,cena4,cena5,text,text_eng,pp,cena21,cena22,cena23,cena24,cena25,cena31,cena32,cena33,cena34,cena35,dver,men,bag) values ('".$type."','".$name."','".$year."','".$color."','".$v."','".$p."','".$kpp."','".$color_eng."','".$cena1."','".$cena2."','".$cena3."','".$cena4."','".$cena5."','".$text."','".$text_eng."','".$pp."','".$cena21."','".$cena22."','".$cena23."','".$cena24."','".$cena25."','".$cena31."','".$cena32."','".$cena33."','".$cena34."','".$cena35."','".$dver."','".$men."','".$bag."')") or die(mysql_error());
	$idd=mysql_insert_id();
	mysql_close($connect);
	$dir="../catalog_photo/".$idd;
	mkdir($dir, 0777);

    
	echo "<html><head>
	<meta http-equiv='Refresh' content='0; URL=catalog.php?type=$type'>
	</head></html>";
	exit();
	//$head="Location: news.php";
	//header($head);


	}
	else
	{
	mysql_query("update catalog set name='".$name."', year='".$year."', color='".$color."', v='".$v."', p='".$p."', kpp='".$kpp."', color_eng='".$color_eng."', cena1='".$cena1."', cena2='".$cena2."', cena3='".$cena3."', cena4='".$cena4."', cena5='".$cena5."', text='".$text."', text_eng='".$text_eng."', pp='".$pp."', cena21='".$cena21."', cena22='".$cena22."', cena23='".$cena23."', cena24='".$cena24."', cena25='".$cena25."', cena31='".$cena31."', cena32='".$cena32."', cena33='".$cena33."', cena34='".$cena34."', cena35='".$cena35."', dver='".$dver."', men='".$men."', bag='".$bag."'  where id='".$id."'") or die(mysql_error());
	mysql_close($connect);
   	//$head="Location: news.php";
	//header($head);
	echo "<html><head>
	<meta http-equiv='Refresh' content='0; URL=catalog.php?type=$type'>
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