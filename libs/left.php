<?php
$dir='price';
$s="";
$iden=opendir($dir);
while ($file=readdir($iden))
{
if($file!='.'&&$file!='..')
	$s1=$file;
}
?>
	<div class='left_tit'>Автопарк&nbsp; <img src='/img/car.png' style='vertical-align: bottom;' alt='' /></div>
	<ul>
		<li style='margin-top: 15px;'><a href='/class-standart' class='serv'><span>Стандарт</span></a></li>
		<li><a href='/class-comfort' class='serv'><span>Комфорт</span></a></li>
		<li><a href='/class-business' class='serv'><span>Бизнес-класс</span></a></li>
	</ul>
	<a href='/distance' class='distance'><img src='/img/map.png' alt='Расчет расстояний в Крыму' title='Расчет расстояний в Крыму' /></a>
<a href='/price/<?php echo $s1 ?>' id='price' target='_blank' title='Скачать прайс-лист'><span>Прайс-лист</span></a>	
<a href='/news/' id='price' target='_blank' title='Новостной раздел'><span>Новости</span></a>	
	
<div id="SinoptikInformer" style="width:180px; margin-left: 57px; margin-top: 40px;" class="SinoptikInformer type4"><div class="siHeader"><div class="siLh"><div class="siMh"><noindex><a rel="nofollow" onmousedown="siClickCount();" href="http://sinoptik.com.ru/" target="_blank">Погода</a></noindex><noindex><a rel="nofollow" onmousedown="siClickCount();" class="siLogo" href="http://sinoptik.com.ru/" target="_blank"><img src="http://informers.sinoptik.ua/img/t.gif" alt="" /></a></noindex></div></div></div><div class="siBody"><div class="siTitle"><span id="siHeader"></span></div><div class="siCity"><div class="siCityName"><noindex><a rel="nofollow" onmousedown="siClickCount();" href="http://sinoptik.com.ru/погода-симферополь" target="_blank">Погода в <span>Симферополе</span></a></noindex></div><div id="siCont0" class="siBodyContent"><div class="siLeft"><div class="siTerm"></div><div class="siT" id="siT0"></div><div id="weatherIco0"></div></div><div class="siInf"><p>ветер: <span id="wind0" style='color: #02519c !important;'></span></p></div></div></div><div class="siLinks"><span><noindex><a rel="nofollow" onmousedown="siClickCount();" href="http://sinoptik.com.ru/погода-севастополь" target="_blank">Погода в Севастополе</a></noindex>&nbsp;</span><span><noindex><a rel="nofollow" onmousedown="siClickCount();" href="http://sinoptik.com.ru/погода-ялта" target="_blank">Погода в Ялте</a></noindex>&nbsp;</span></div></div><div class="siFooter"><div class="siLf"><div class="siMf"></div></div></div></div><script type="text/javascript" charset="UTF-8" src="http://sinoptik.com.ru/informers_js.php?title=3&amp;wind=2&amp;cities=303024302&amp;lang=ru"></script>

<a href='' class='distance'><img src='/img/gazel.png' alt='' /></a>