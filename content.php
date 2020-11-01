<?php
include 'connect.php';
if(!isset($_GET['id'])) {
exit("Тип контента не  определен");
}
else
{
$id=intval($_GET['id']);
}

$res_cont = mysql_query("select * from content where id='".$id."' limit 1"); 
$cont_data = mysql_fetch_assoc($res_cont);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo ($cont_data['title'] == '' ? "Автотитан" : $cont_data['title'] ) ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<meta name="description" content="<?php echo $cont_data['descr'] ?>" />
<meta name="keywords" content="<?php echo $cont_data['keyword'] ?>" />
<!--[if lte IE 9]> 
<script src="js/html5.js"></script>
<![endif]-->
<link rel="icon" href="/favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="/favicon.ico"  type="image/x-icon"/>

<link rel='stylesheet' type='text/css' href='/css/style.css' />
<link href="datepick.css" type="text/css" rel="stylesheet" />
<script src="/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="datepick.js"> </script>
<script type="text/javascript" src="/js/rotate.2.1.js"> </script>
<script type="text/javascript" src="/js/scripts.js"></script>

<?php if ($cont_data['id'] == 3) : ?>
<script type="text/javascript">
$(function(){
$('#date1, #date2').attachDatepicker();

function isValidEmail (email)
{
 return (/^([a-z0-9_\-]+\.)*[a-z0-9_\-]+@([a-z0-9][a-z0-9\-]*[a-z0-9]\.)+[a-z]{2,4}$/i).test(email);
}


jQuery("#target").submit
(
	function()
	{
	
		re_date = /^\s*(\d{1,2})\.(\d{1,2})\.(\d{2,4})\s*$/;
		
		if($.trim($("#name").val()) == "")
		{
		jQuery("span#err").html("Введите имя и фамилию");
		$("#name").focus();
		return false;
		}
		
		if($.trim($("#tel").val()) == "")
		{
		jQuery("span#err").html("Введите контактный телефон");
		$("#tel").focus();
		return false;
		}		
		
		if($.trim($("#email").val()) == "")
		{
		jQuery("span#err").html("Введите адрес e-mail");
		$("#email").focus();
		return false;
		}		
		
		
		if($.trim($("#mess").val()) == "")
		{
		jQuery("span#err").html("Введите текст заявки");
		$("#mess").focus();
		return false;
		}
	
		
		if(!isValidEmail (jQuery("#email").val()))
		{
		jQuery("span#err").html("Адрес e-mail имеет неверный формат");
		$("#email").focus();
		return false;
		}
		
		if (!re_date.exec($.trim($("#date1").val())))
		{
		jQuery("span#err").html("Формат даты должен быть dd.mm.yyyy");
		$("#date1").focus();
		return false;
		}
		
		if (!re_date.exec($.trim($("#date2").val())))
		{
		jQuery("span#err").html("Формат даты должен быть dd.mm.yyyy");
		$("#date2").focus();
		return false;
		}
		
		
		


		if((parseInt(jQuery("#a1").html())+parseInt(jQuery("#a2").html())) != parseInt(jQuery("#ch-s").val()))
		{
		jQuery("span#err").html("Неправильно посчитана контрольная сумма");
		$("#ch-s").focus();
		return false;
		}
		
		if($('input[name=check]').attr('checked') == undefined)
		{
		jQuery("span#err").html("Нужно согласиться с условиями проката");
		return false;
		}		
		

	}
); 



})
</script>
<?php endif; ?>

</head>
<body>

<?php
include 'libs/head.php';
?>
	<div class="breadcrumbs"><a href="/">Главная</a> &raquo;<?php echo ($cont_data['id'] == 6 || $cont_data['id'] == 7 || $cont_data['id'] == 9 || $cont_data['id'] == 10 || $cont_data['id'] == 11 || $cont_data['id'] == 12 || $cont_data['id'] == 13 || $cont_data['id'] == 14 ? " <a href=\"/news/\">Новости</a> &raquo;" : "" ); ?> <?php echo $cont_data['name']; ?></div>

<div id='cont_top'></div>
<div id='content'>
<nav id='left_menu'>
<?php
include 'libs/left.php';
?>
</nav>
<div class='content_box'>
	<h1><?php echo $cont_data['name']; ?></h1>
	<div class='cont_txt'>
<?php
echo trim($cont_data['text']);
?>
	</div>
<br />

<?php if ($cont_data['id'] == 3) : ?>
<br />
<h1 style='margin-bottom: 30px;text-align: center;'>Оставить заявку</h1>
<?php
if(!isset($_POST['ok']))	
{
$a1=rand(1,10); $a2=rand(1,10);
?>
<form action='' method='post' id='target' name='form1' enctype='multipart/form-data'>
<input type='hidden' name='car_id' value='<?php echo $car_data['name'] ?>' />
<div class='form_box' style='margin-bottom: 8px;'>
<table class='order'>
<tr>
<td class='f_td'>Имя, фамилия:</td>
<td><input type='text' name='name' class='txt' style='width: 350px;'  id='name' /></td>
</tr>
<tr>
<td colspan='2' style='height: 8px;'> </td>
</tr>
<tr>
<td class='f_td'>Телефон:</td>
<td><input type='text' name='tel' class='txt'  id='tel' style='width: 350px;' /></td>
</tr>
<tr>
<td colspan='2' style='height: 8px;'> </td>
</tr>
<tr>
<td class='f_td'>E-mail:</td>
<td><input type='text' name='email' class='txt'  id='email' style='width: 350px;' /></td>
</tr>
<tr>
<td colspan='2' style='height: 20px;'> </td>
</tr>
<tr>
<td class='f_td'>Сообщение:</td>
<td><textarea rows="10" cols="45" name='mess' class='txt' id='mess' style='width: 350px; height: 100px;'></textarea></td>
</tr>
<tr>
<td colspan='2' style='height: 20px;'> </td>
</tr>
<tr>
<td colspan='2' style='height: 8px;'> </td>
</tr>
<tr>
<td class='f_td'>Получение автомобиля:</td>
<td>Дата <input type='text' name='date1' class='txt'  id='date1' style='width: 80px;' value='<?php echo date("d.m.Y",time()) ?>' /> 
&nbsp; &nbsp;  время <input type='text' name='time1' class='txt'  id='time1' style='width: 40px;'  /> 
</td>
</tr>
<tr>
<td colspan='2' style='height: 8px;'> </td>
</tr>
<tr>
<td class='f_td'>Возврат автомобиля:</td>
<td>Дата <input type='text' name='date2' class='txt'  id='date2' style='width: 80px;' value='<?php echo date("d.m.Y",time()) ?>' /> 
&nbsp; &nbsp;  время <input type='text' name='time2' class='txt'  id='time2' style='width: 40px;'  /> 
</td>
</tr>
<tr>
<td colspan='2' style='height: 15px;'> </td>
</tr>
<tr>
<td class='f_td'>Защита от спама:</td>
<td><span id="a1"><?php echo $a1 ?></span> + <span id="a2"><?php echo $a2 ?></span> = <input type="text" name="ch-s" id="ch-s" class='txt' style='width: 22px;'></td>
</tr>
</table>
</div>
<p style='padding-left: 40px;'>С <a href='terms_rent' target='_blank' class='link'>условиями проката</a> ознакомился <input type='checkbox' name='check' id='check'  /></p>
<input name="ok" type="submit" value="Забронировать" class='but send_btn' style='margin-left: 40px;' onclick="ga('send', 'event', 'knopka_bron', 'click');yaCounter44895769.reachGoal('form_sent'); return true;"> &nbsp;&nbsp; <span id='err'></span>
</form>	
<?php
}
else
{
function mail_attachment($filename, $filename2, $filename3, $filename4, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
    $file = $path.$filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
	
	if($filename2!='')
	{
	$file2 = $path.$filename2;
    $file_size2 = filesize($file2);
    $handle2 = fopen($file2, "r");
    $content2 = fread($handle2, $file_size2);
    fclose($handle2);
	}
	
	if($filename3!='')
	{
	$file3 = $path.$filename3;
    $file_size3 = filesize($file3);
    $handle3 = fopen($file3, "r");
    $content3 = fread($handle3, $file_size3);
    fclose($handle3);
	}

	if($filename4!='')
	{
	$file4 = $path.$filename4;
    $file_size4 = filesize($file4);
    $handle4 = fopen($file4, "r");
    $content4 = fread($handle4, $file_size4);
    fclose($handle4);
	}	
	
	
    $content = chunk_split(base64_encode($content));
	$content2 = chunk_split(base64_encode($content2));
	$content3 = chunk_split(base64_encode($content3));
	$content4 = chunk_split(base64_encode($content4));	
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/html; charset=koi8-r\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $message = convert_cyr_string($message, "w", "k");
	$header .= $message."\r\n\r\n";
    
	$header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    
    
	if($filename2!='')
	{
	$header .= "--".$uid."\r\n";
	$header .= "Content-Type: application/octet-stream; name=\"".$filename2."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$filename2."\"\r\n\r\n";
    $header .= $content2."\r\n\r\n";
    
			if($filename3!='')
			{
			$header .= "--".$uid."\r\n";
			$header .= "Content-Type: application/octet-stream; name=\"".$filename3."\"\r\n"; // use different content types here
			$header .= "Content-Transfer-Encoding: base64\r\n";
			$header .= "Content-Disposition: attachment; filename=\"".$filename3."\"\r\n\r\n";
			$header .= $content3."\r\n\r\n";
			
					if($filename4!='')
					{
					$header .= "--".$uid."\r\n";
					$header .= "Content-Type: application/octet-stream; name=\"".$filename4."\"\r\n"; // use different content types here
					$header .= "Content-Transfer-Encoding: base64\r\n";
					$header .= "Content-Disposition: attachment; filename=\"".$filename4."\"\r\n\r\n";
					$header .= $content4."\r\n\r\n";
					$header .= "--".$uid."--";
					}	
					else
					{
					$header .= "--".$uid."--";
					}
			
			}
			else
			{
			$header .= "--".$uid."--";
			}
	}
	else
	{
	$header .= "--".$uid."--";
	}
	
	
	$subject_send= '=?koi8-r?B?'.base64_encode(convert_cyr_string($subject, "w","k")).'?=';
	mail($mailto, $subject_send, "", $header);
}




$mes="";
$mes=$mes."<span style='color: #eb4042;'>ФИО: </span>".$_POST['name']."<br />";
$mes=$mes."<span style='color: #eb4042;'>Телефон: </span>".$_POST['tel']."<br />";
$mes=$mes."<span style='color: #eb4042;'>E-mail: </span>".$_POST['email']."<br />";
//$mes=$mes."<span style='color: #eb4042;'>Автомобиль: </span><b>".$_POST['car_id']."</b><br />";
$mes=$mes."<span style='color: #eb4042;'>Сообщение: </span><b>".$_POST['mess']."</b><br />";
$mes=$mes."<span style='color: #eb4042;'>Получение: </span> ".$_POST['date1'].", время ".$_POST['time1']."<br />";
$mes=$mes."<span style='color: #eb4042;'>Возврат </span> ".$_POST['date2'].", время ".$_POST['time2']."<br />";
$mes=$mes."<br /><img src='http://titan-rent.ru/logo.png' />";


$to="info@titan-rent.ru";
$tema = "Заявка!!!";
$subject_send= '=?koi8-r?B?'.base64_encode(convert_cyr_string($tema, "w","k")).'?=';
$mes = convert_cyr_string($mes, "w", "k");
$headers = "From: =?koi8-r?B?".base64_encode(convert_cyr_string("AVTOTITAN", "w","k"))."?= <info@titan-rent.ru>" . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=koi8-r' . "\r\n";
mail($to,$subject_send,$mes,$headers);


echo "<p>Ваш заказ успешно отправлен! Менеджер свяжется с Вами в ближайшее время.</p>";
}
?>
<br />
<?php endif; ?>



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
