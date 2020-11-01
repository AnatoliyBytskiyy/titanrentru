<?php
include 'connect.php';

$r=mysql_query("select * from cities order by name");
$count_d=0;
while (@$row=mysql_fetch_row($r))
{
 $ar[$count_d]=$row; //сохран¤ем из таблицы в двумерный массив
 $count_d++; // количестов записей дл¤ вывода (не всегда равно $countOnPage - на последней странице вывода, например)
}

?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Calculation of distances between the cities of the Crimea :: Avtotitan</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<meta name="description" content="" />
<!--[if lte IE 9]> 
<script src="js/html5.js"></script>
<![endif]-->
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="favicon.ico"  type="image/x-icon"/>

<link rel='stylesheet' type='text/css' href='css/style.css' />
<link href="css/select.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="js/rotate.2.1.js"> </script>
<script type="text/javascript" src="js/jquery.selectBox.js"> </script>
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript">
$(function(){

 $("select").selectBox(
 {menuTransition: 'slide'}
 );
 $("ul.selectBox-dropdown-menu").css("height","250px").css("overflow","auto");

 
 $("form#form_dist").submit(function (e) {
 
 


	
city1=document.getElementById('city1').value;
city2=document.getElementById('city2').value;
script="count_km.php?city1="+city1+"&city2="+city2;
$.get(script, function(data){

	if($("img#car").length==0)
	{
	$("div#out").append("<img id='car' src='img/car.png' />");
	$("img#car").animate({opacity: 1}, 500).animate({left: "440px"}, 1500, function(){
    $(this).remove();
	$("#km").html(data);
	});
	}


})	
	
	
return false;
});

 

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
<h1>Calculation of distances between the cities of the Crimea</h1>
<div style='text-align: center; margin-top: 50px;'>
	<form action='' method='get' id='form_dist'>
	<span class='blue'>Point A</span> <select name='city1' id='city1'>
<?php
for($j=0;$j<$count_d;$j++)
{
echo "<option value='".$ar[$j][0]."'>".$ar[$j][2]."</option>";
}
?>	
	</select>
	 &nbsp;&nbsp; 
	<span class='blue'>Point B</span> <select name='city2' id='city2'>
<?php
for($j=0;$j<$count_d;$j++)
{
echo "<option value='".$ar[$j][0]."'>".$ar[$j][2]."</option>";
}
?>	
	</select>
	&nbsp;&nbsp;
	<input type='submit' class='but' value='Calculate'>
	</form>

<div id='out'>
	<img src='img/punkt.png' class='punkt punkt1' />
	<img src='img/punkt.png' class='punkt punkt2' />
	<span id='punkt_a'>A</span>
	<span id='punkt_b'>B</span>
</div>
<div style='text-align: center; margin-top: 3px;'><span id='km'>0</span> km</div>
</div>

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
