<?php
include 'connect.php';

if((!isset($_GET['type']))||($_GET['type']>4))
{exit("������");}
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
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<?php if($type == 1) : ?>
<title>������ ���������� � �����: ������ ������ �������� � ������</title>
<meta name="description" content="������������ ���� � ����� ������ ����� ��� ���, ��� ����� ���������. ����������� ���� � ������� ����� � ��������� ����� - ����������� ������ �� ��������� ������!" />
<meta name="keywords" content="������ ���������� � �����" />
<?php else : ?>
<title>���������� ������ <?php echo $type_data['name'] ?> :: ���������</title>
<meta name="description" content="<?php echo $type_data['descr'] ?>" />
<meta name="keywords" content="���������� ������ <?php echo $type_data['name'] ?>" />
<? endif; ?>
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
	<div class="breadcrumbs"><a href="/">�������</a> &raquo; ���������� ������ <?php echo $type_data['name'] ?></div>

<div id='cont_top'></div>
<div id='content'>
<nav id='left_menu'>
<?php
include 'libs/left.php';
?>

</nav>
<div class='content_box'>
<h1>���������� ������ <?php echo $type_data['name'] ?></h1>

<?php
$r=mysql_query("select * from catalog where type='".$type."' order by pp,id");
$count_d=0;
while (@$row=mysql_fetch_row($r))
{
 $ar[$count_d]=$row; //��������� �� ������� � ��������� ������
 $count_d++; // ���������� ������� ��� ������ (�� ������ ����� $countOnPage - �� ��������� �������� ������, ��������)
}

for($j=0;$j<$count_d;$j++)
{
$img="catalog_photo/".$ar[$j][0]."/1-min.jpg";

switch($ar[$j][9])
{
case 2: $kpp="�������"; $kp="�"; break;
case 1: $kpp="��������"; $kp="�"; break;
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
			<li id='icon1'>".$ar[$j][36]."<div class='bubble'>���-��<br />������</div></li>
			<li id='icon2'>".$ar[$j][37]."<div class='bubble'>���-��<br />�������</div></li>
			<li id='icon3'>".$kp."<div class='bubble'>��������<br />".$kpp."</div></li>
			<li id='icon4'>".$ar[$j][38]."<div class='bubble'>����<br />������</div></li>
			<li id='icon5'>K<div class='bubble'>�����- ������</div></li>
		</ul>
	</div>

	<div class='car_opis'>
		<div class='car_tit'>���������� <strong style='color: #0058ad;'>".$ar[$j][2]."</strong></div>
		<table>
		<tr>
			<td class='first_td'>
				<span class='col_tit'>��������������</span>
				<ul>
					<li><b>��� �������:</b> ".$ar[$j][5]."</li>
					<li><b>��������:</b> ".$ar[$j][8]." �.�.</li>
					<li><b>���������:</b> ".$ar[$j][7]." �</li>
					<li><b>����:</b> ".$ar[$j][6]."</li>
				<ul>
				<div style='margin-top: -1px;'>
				".$ar[$j][3]."
				</div>
			</td>
			<td class='second_td'>
				<span class='col_tit'>������</span> <span style='font-weight: normal;'>(� �����)</span>
				<table>
				<tr>
					<td style='width: 119px;'>1-3 ���</td>
					<td><span class='red'>".$cena1."</span> ���.</td>
				</tr>
				<tr>
					<td>4-14 ����</td>
					<td><span class='red'>".$cena2."</span> ���.</td>
				</tr>	
				<tr>
					<td>15-30 ����</td>
					<td><span class='red'>".$cena3."</span> ���.</td>
				</tr>	
				<tr>
					<td>31 � �����</td>
					<td><span class='red'>".$cena4."</span> ���.</td>
				</tr>	
				<tr>
					<td>����� ��</td>
					<td><span class='red'>".$cena5."</span> ���.</td>
				</tr>				
				</table>
			</td>
		</tr>
		</table>
		<a href='order.php?car_id=".$ar[$j][0]."' class='order'>�������������</a>
	</div>
</div>
";
}
?>


<?php if ($type == 1) : ?>
<div class="cont_txt"><p style="text-align: justify;">
			���������� �������� ������������ ������ � �����? ������ ������� ������� �� ����������? ��� ���������� ��� �� ��������. ����� ���������� ���������, ������ �������� ����� ������� � ����������� ����, ��������� ���������� � �������� � ��������� ����������! ��������� ������ � ����� � &laquo;�����������&raquo; - ������ � �������!</p>
		<h2 style="text-align: center;">
			������ ����</h2>
		<br>
		<p style="text-align: justify;">
			���� �������� ����� ���������� ������������� ����� ������� � ������ �����.</p>
		<p style="text-align: justify;">
			<strong>� �� ��������, ���� ��:</strong></p>
		<ul>
			<li style="margin-left: 36pt; text-align: justify;">
				���������� ������������ �������� ������ �������</li>
			<li style="margin-left: 36pt; text-align: justify;">
				������������� ������ ��������� ����</li>
			<li style="margin-left: 36pt; text-align: justify;">
				�������� �������������� ������ � ������� �������</li>
			<li style="margin-left: 36pt; text-align: justify;">
				������������� ������ � ������ ������ � ����� � ����</li>
		</ul>
		<h2 style="text-align: center;">
			������ ���������� � �����</h2>
		<br>
		<p style="text-align: justify;">
			���, ��� ����� ������ ������ � ��������, �� ���������� ��������� �������� ������ ������.</p>
		<p style="text-align: justify;">
			����������� ���������� � ����� ������ ����� ��� ���, ��� ����� ��������� � ������� �������� ������. �� �������� ������ � ������� ����� � ��������� ����� - ����������� ������ �� ��������� ������!</p>
		<p style="text-align: justify;">
			���� �� ���������, ��� ���������� ������ ������ ��� �������� &ndash; ��� &laquo;������&raquo; 1985 ���� �������, �� ������ ����������. �� ���������� ������ ������������ ����� ���������� �� ������ ���������. ������� ������ �� ��� ������ ������� ��� ���� ��������� ������� ��� ����������� ������ � �����.</p>
		<p style="text-align: justify;">
			<strong>������ ������ ��������:</strong></p>
		<ul>
			<li style="margin-left: 36pt; text-align: justify;">
				Volkswagen Polo</li>
			<li style="margin-left: 36pt; text-align: justify;">
				Hyundai Solaris</li>
			<li style="margin-left: 36pt; text-align: justify;">
				Skoda Fabia</li>
			<li style="margin-left: 36pt; text-align: justify;">
				Renault Logan</li>
			<li style="margin-left: 36pt; text-align: justify;">
				Daewoo Lanos</li>
		</ul>
		<p style="text-align: justify;">
			��� ����, ��� ���������� ������� ������������. &laquo;��������&raquo; ��� &laquo;�������&raquo;, �������� ���������� ��� ���������, - ������ ���!</p>
		<p style="text-align: justify;">
			���� �� ���������� ������� �� �����������, ������� ��������������� ���������� � ������������ ����� ��� ����� ��� �������. ���� �� ����� ������ ���� ������!</p>
		<p style="text-align: justify;">
			������� � ����������� ������, ������� ������ ����� ����������� ���������� � ����������� �� ���������� �����!</p></div>
<?php endif; ?>






<br />
</div>
	<div style='clear: left;'></div>
</div>
<div id='cont_bot'></div>

<footer>
<?php
include 'libs/foot.php';
?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function (d, w, c) {
       (w[c] = w[c] || []).push(function() {
           try {
               w.yaCounter44895769 = new Ya.Metrika({
                   id:44895769,
                   clickmap:true,
                   trackLinks:true,
                   accurateTrackBounce:true,
                   webvisor:true
               });
           } catch(e) { }
       });

       var n = d.getElementsByTagName("script")[0],
           s = d.createElement("script"),
           f = function () { n.parentNode.insertBefore(s, n); };
       s.type = "text/javascript";
       s.async = true;
       s.src = "https://mc.yandex.ru/metrika/watch.js";

       if (w.opera == "[object Opera]") {
           d.addEventListener("DOMContentLoaded", f, false);
       } else { f(); }
   })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/44895769"; style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</footer>

<div id="toTop"></div>

</body>
</html>
