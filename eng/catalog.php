<?php
include 'connect.php';

if((!isset($_GET['type']))||($_GET['type']>4))
{exit("Ошибка");}
else
{
$type=intval($_GET['type']);
}

$res_type = mysql_query("SELECT * FROM types WHERE id = '". $type ."' limit 1"); 
$type_data = mysql_fetch_assoc($res_type);


$res_cont = mysql_query("select * from period where id='1' limit 1"); 
$period_data = mysql_fetch_assoc($res_cont);

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Class cars <?php echo $type_data['name'] ?> :: Avtotitan</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<meta name="description" content="<?php echo $type_data['descr_eng'] ?>" />
<!--[if lte IE 9]> 
<script src="js/html5.js"></script>
<![endif]-->
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="favicon.ico"  type="image/x-icon"/>

<link rel='stylesheet' type='text/css' href='css/style.css' />
<script src="js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="js/rotate.2.1.js"> </script>
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript">
$(function(){

 
 $("div.car_panel li").hover(
function(){
$(this).find("div").css("display","block");

},
function(){
$(this).find("div").css("display","none");
}
);

 

})
</script>
</head>
<body>
<?php
include 'libs/head.php';
?>	

<div id='cont_top'></div>
<div id='content'>
<nav id='left_menu'>
<?php
include 'libs/left.php';
?>

</nav>
<div class='content_box'>
<h1>Class cars <?php echo $type_data['name_eng'] ?></h1>

<?php
$r=mysql_query("select * from catalog where type='".$type."' order by pp,id");
$count_d=0;
while (@$row=mysql_fetch_row($r))
{
 $ar[$count_d]=$row; //сохраняем из таблицы в двумерный массив
 $count_d++; // количестов записей для вывода (не всегда равно $countOnPage - на последней странице вывода, например)
}

for($j=0;$j<$count_d;$j++)
{
$img="../catalog_photo/".$ar[$j][0]."/1-min.jpg";

switch($ar[$j][9])
{
case 2: $kpp="Automatic"; $kp="А"; break;
case 1: $kpp="Manual"; $kp="М"; break;
}


switch($period_data['curr'])
{
case 1: $cena1=$ar[$j][15]; $cena2=$ar[$j][16]; $cena3=$ar[$j][17]; $cena4=$ar[$j][18]; $cena5=$ar[$j][19]; break;
case 2: $cena1=$ar[$j][23]; $cena2=$ar[$j][24]; $cena3=$ar[$j][25]; $cena4=$ar[$j][26]; $cena5=$ar[$j][27]; break;
}

echo "
<div class='catalog-box'>
	
	<img src='".$img."' class='catalog_img' />
	<div class='car_panel'>
		<ul>
			<li id='icon1'>".$ar[$j][36]."<div class='bubble'>Number of<br />doors</div></li>
			<li id='icon2'>".$ar[$j][37]."<div class='bubble'>Number of<br />men</div></li>
			<li id='icon3'>".$kp."<div class='bubble'>".$kpp."<br />gearbox</div></li>
			<li id='icon4'>".$ar[$j][38]."<div class='bubble'>baggage</div></li>
			<li id='icon5'>K<div class='bubble'>Conditioner</div></li>
		</ul>
	</div>

	<div class='car_opis'>
		<div class='car_tit'>Car <strong style='color: #0058ad;'>".$ar[$j][2]."</strong></div>
		<table>
		<tr>
			<td class='first_td'>
				<span class='col_tit'>Features</span>
				<ul>
					<li><b>Year:</b> ".$ar[$j][5]."</li>
					<li><b>Power:</b> ".$ar[$j][8]." h.p.</li>
					<li><b>Engine:</b> ".$ar[$j][7]." l</li>
					<li><b>Color:</b> ".$ar[$j][6]."</li>
				<ul>
				<div style='margin-top: -1px;'>
				".$ar[$j][4]."
				</div>
			</td>
			<td class='second_td'>
				<span class='col_tit'>Tariffs</span> <span style='font-weight: normal;'>(per day)</span>
				<table>
				<tr>
					<td style='width: 119px;'>1-3 days</td>
					<td><span class='red'>".$cena1."</span> rub</td>
				</tr>
				<tr>
					<td>4-14 days</td>
					<td><span class='red'>".$cena2."</span> rub</td>
				</tr>	
				<tr>
					<td>15-30 days</td>
					<td><span class='red'>".$cena3."</span> rub</td>
				</tr>	
				<tr>
					<td>31 days or more</td>
					<td><span class='red'>".$cena4."</span> rub</td>
				</tr>	
				<tr>
					<td>Guarantee</td>
					<td><span class='red'>".$cena5."</span> rub</td>
				</tr>				
				</table>
			</td>
		</tr>
		</table>
		<a href='order.php?car_id=".$ar[$j][0]."' class='order'>Order</a>
	</div>
</div>
";
}
?>









<br />
</div>
	<div style='clear: left;'></div>
</div>
<div id='cont_bot'></div>

<footer>
<?php
include 'libs/foot.php';
?>
</footer>

</body>
</html>
