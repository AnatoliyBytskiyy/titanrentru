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
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<?php if($type == 1) : ?>
<title>Эконом автопрокат в Крыму: машины класса Стандарт и Эконом</title>
<meta name="description" content="Экономпрокат авто в любом городе Крыма для тех, кто хочет отдохнуть. Предоставим авто в краткие сроки в выбранное время - современные машины на небольшой бюджет!" />
<meta name="keywords" content="эконом автопрокат в Крыму" />
<?php else : ?>
<title>Автомобили класса <?php echo $type_data['name'] ?> :: Автотитан</title>
<meta name="description" content="<?php echo $type_data['descr'] ?>" />
<meta name="keywords" content="Автомобили класса <?php echo $type_data['name'] ?>" />
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
	<div class="breadcrumbs"><a href="/">Главная</a> &raquo; Автомобили класса <?php echo $type_data['name'] ?></div>

<div id='cont_top'></div>
<div id='content'>
<nav id='left_menu'>
<?php
include 'libs/left.php';
?>

</nav>
<div class='content_box'>
<h1>Автомобили класса <?php echo $type_data['name'] ?></h1>

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
$img="catalog_photo/".$ar[$j][0]."/1-min.jpg";

switch($ar[$j][9])
{
case 2: $kpp="автомат"; $kp="А"; break;
case 1: $kpp="механика"; $kp="М"; break;
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
			<li id='icon1'>".$ar[$j][36]."<div class='bubble'>Кол-во<br />дверей</div></li>
			<li id='icon2'>".$ar[$j][37]."<div class='bubble'>Кол-во<br />человек</div></li>
			<li id='icon3'>".$kp."<div class='bubble'>Передача<br />".$kpp."</div></li>
			<li id='icon4'>".$ar[$j][38]."<div class='bubble'>Мест<br />багажа</div></li>
			<li id='icon5'>K<div class='bubble'>Конди- ционер</div></li>
		</ul>
	</div>

	<div class='car_opis'>
		<div class='car_tit'>Автомобиль <strong style='color: #0058ad;'>".$ar[$j][2]."</strong></div>
		<table>
		<tr>
			<td class='first_td'>
				<span class='col_tit'>Характеристики</span>
				<ul>
					<li><b>Год выпуска:</b> ".$ar[$j][5]."</li>
					<li><b>Мощность:</b> ".$ar[$j][8]." л.с.</li>
					<li><b>Двигатель:</b> ".$ar[$j][7]." л</li>
					<li><b>Цвет:</b> ".$ar[$j][6]."</li>
				<ul>
				<div style='margin-top: -1px;'>
				".$ar[$j][3]."
				</div>
			</td>
			<td class='second_td'>
				<span class='col_tit'>Тарифы</span> <span style='font-weight: normal;'>(в сутки)</span>
				<table>
				<tr>
					<td style='width: 119px;'>1-3 дня</td>
					<td><span class='red'>".$cena1."</span> руб.</td>
				</tr>
				<tr>
					<td>4-14 дней</td>
					<td><span class='red'>".$cena2."</span> руб.</td>
				</tr>	
				<tr>
					<td>15-30 дней</td>
					<td><span class='red'>".$cena3."</span> руб.</td>
				</tr>	
				<tr>
					<td>31 и более</td>
					<td><span class='red'>".$cena4."</span> руб.</td>
				</tr>	
				<tr>
					<td>Залог от</td>
					<td><span class='red'>".$cena5."</span> руб.</td>
				</tr>				
				</table>
			</td>
		</tr>
		</table>
		<a href='order.php?car_id=".$ar[$j][0]."' class='order'>Забронировать</a>
	</div>
</div>
";
}
?>


<?php if ($type == 1) : ?>
<div class="cont_txt"><p style="text-align: justify;">
			Планируете провести незабываемый отпуск в Крыму? Грядет деловая поездка на полуостров? Без автомобиля Вам не обойтись. Чтобы оставаться мобильным, суметь посетить много городов и потрясающих мест, арендуйте автомобиль и забудьте о городском транспорте! Экономить деньги и время с &laquo;Автотитаном&raquo; - просто и выгодно!</p>
		<h2 style="text-align: center;">
			Прокат авто</h2>
		<br>
		<p style="text-align: justify;">
			Наша компания давно пользуется популярностью среди жителей и гостей Крыма.</p>
		<p style="text-align: justify;">
			<strong>И не случайно, ведь мы:</strong></p>
		<ul>
			<li style="margin-left: 36pt; text-align: justify;">
				Предлагаем качественные иномарки разных классов</li>
			<li style="margin-left: 36pt; text-align: justify;">
				Устанавливаем низкие доступные цены</li>
			<li style="margin-left: 36pt; text-align: justify;">
				Внедряем индивидуальный подход к каждому клиенту</li>
			<li style="margin-left: 36pt; text-align: justify;">
				Предоставляем машину в аренду быстро и точно в срок</li>
		</ul>
		<h2 style="text-align: center;">
			Эконом автопрокат в Крыму</h2>
		<br>
		<p style="text-align: justify;">
			Тем, кто умеет ценить минуты и средства, мы предлагаем недорогие варианты аренды машины.</p>
		<p style="text-align: justify;">
			Предоставим автомобиль в любом городе Крыма для тех, кто хочет отдохнуть и активно провести отпуск. Вы получите машину в краткие сроки в выбранное время - современные машины на небольшой бюджет!</p>
		<p style="text-align: justify;">
			Если Вы полагаете, что автомобиль класса эконом или стандарт &ndash; это &laquo;Жигули&raquo; 1985 года выпуска, Вы крупно ошибаетесь. Мы предлагаем только качественные новые автомобили по низкой стоимости. Поэтому каждый из Вас сможет выбрать для себя недорогой вариант для прекрасного отдыха в Крыму.</p>
		<p style="text-align: justify;">
			<strong>Машины класса Стандарт:</strong></p>
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
			Нам есть, что предложить каждому автолюбителю. &laquo;Механика&raquo; или &laquo;автомат&raquo;, немецкий автомобиль или корейский, - решать Вам!</p>
		<p style="text-align: justify;">
			Если Вы планируете перелет до Симферополя, заранее забронированный автомобиль в обозначенное время уже будет Вас ожидать. Ведь мы ценим каждую Вашу минуту!</p>
		<p style="text-align: justify;">
			Звоните и заказывайте машину, которая станет Вашим незаменимым помощником в путешествии по сказочному Крыму!</p></div>
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
