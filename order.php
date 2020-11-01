<?php
include 'connect.php';
if(isset($_GET['car_id']))
{$id=$_GET['car_id'];}
elseif(isset($_POST['car_id']))
{$id=$_POST['car_id'];}
else
{exit("Не выбран автомобиль");}
$res_car = mysql_query("select * from catalog where id='".$id."'"); 
$car_data = mysql_fetch_assoc($res_car);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Онлайн бронирование автомобиля <?php echo $car_data['name'] ?> для проката :: Автотитан</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<meta name="description" content="<?php echo $cont_data['descr'] ?>" />
<!--[if lte IE 9]> 
<script src="js/html5.js"></script>
<![endif]-->
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="favicon.ico"  type="image/x-icon"/>

<link rel='stylesheet' type='text/css' href='css/style.css' />
<link href="datepick.css" type="text/css" rel="stylesheet" />
<script src="js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="datepick.js"> </script>
<script type="text/javascript" src="js/rotate.2.1.js"> </script>
<script type="text/javascript" src="js/scripts.js"></script>

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
	<h1 style='margin-bottom: 30px;'>Заявка на прокат автомобиля</h1>
	

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
<td class='f_td'>Автомобиль:</td>
<td><span class='blue' style='font-size: 17px;'><?php echo $car_data['name'] ?></span></td>
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
<td colspan='2' style='padding-left: 50px;'><span style='color: #23374a; font-weight: bold;'>Загрузка файлов</span> (формат JPG, не более 2 Мб каждый):</td>
</tr>
<tr>
<td class='f_td'>Файл 1:</td>
<td><input type='file' name='f1' /></td>
</tr>
<tr>
<td class='f_td'>Файл 2:</td>
<td><input type='file' name='f2' /></td>
</tr>
<tr>
<td class='f_td'>Файл 3:</td>
<td><input type='file' name='f3' /></td>
</tr>
<tr>
<td class='f_td'>Файл 4:</td>
<td><input type='file' name='f4' /></td>
</tr>
<tr>
<td colspan='2' style='height: 20px;'> </td>
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
$mes=$mes."<span style='color: #eb4042;'>Автомобиль: </span><b>".$_POST['car_id']."</b><br />";
$mes=$mes."<span style='color: #eb4042;'>Получение: </span> ".$_POST['date1'].", время ".$_POST['time1']."<br />";
$mes=$mes."<span style='color: #eb4042;'>Возврат </span> ".$_POST['date2'].", время ".$_POST['time2']."<br />";
$mes=$mes."<br /><img src='http://titan-rent.ru/logo.png' />";

$file1=basename($_FILES['f1']['name']); 
$file2=basename($_FILES['f2']['name']); 
$file3=basename($_FILES['f3']['name']); 
$file4=basename($_FILES['f4']['name']); 
if(($file1=='')&&($file2=='')&&($file3=='')&&($file4=='')) // нет вложения
{
$to="info@titan-rent.ru";
$tema = "Бронирование автомобиля!!!";
$subject_send= '=?koi8-r?B?'.base64_encode(convert_cyr_string($tema, "w","k")).'?=';
$mes = convert_cyr_string($mes, "w", "k");
$headers = "From: =?koi8-r?B?".base64_encode(convert_cyr_string("AVTOTITAN", "w","k"))."?= <info@titan-rent.ru>" . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=koi8-r' . "\r\n";
mail($to,$subject_send,$mes,$headers);
}
elseif(($file1!='')&&($file2=='')&&($file3=='')&&($file4=='')) //есть 1 вложение
{

	if($_FILES['f1']['size']>6000000)
	{
	exit("Размер файла > 6 мегабайт");
	}
	$ras=array(".jpg",".JPG",".jpeg",".JPEG");
	$check=0;
	foreach($ras as $r) // проверяем расширение
	{
	if(strpos(basename($_FILES['f1']['name']),$r)) {$check=1;}
	}
	if($check==0){exit('Нужно загрузить изображение JPG');}	
	
	$file_name1='file/file1.jpg';
	copy($_FILES['f1']['tmp_name'],$file_name1);


$my_file = "file1.jpg";
$my_path = "file/";
$my_name = "AVTOTITAN";
$my_mail = "info@titan-rent.ru";
$my_replyto = "info@titan-rent.ru";
$my_subject = "Бронирование автомобиля";
$my_message = $mes;
mail_attachment($my_file, "", "", "",$my_path, "info@titan-rent.ru", $my_mail, $my_name, $my_replyto, $my_subject, $my_message);
unlink($file_name1);
}

elseif(($file1!='')&&($file2!='')&&($file3=='')&&($file4=='')) //есть 2 вложение
{

	if($_FILES['f1']['size']>6000000)
	{
	exit("Размер файла > 6 мегабайт");
	}
	if($_FILES['f2']['size']>6000000)
	{
	exit("Размер файла > 6 мегабайт");
	}	
	$ras=array(".jpg",".JPG",".jpeg",".JPEG");
	$check=0;
	foreach($ras as $r) // проверяем расширение
	{
	if(strpos(basename($_FILES['f1']['name']),$r)) {$check=1;}
	}
	if($check==0){exit('Нужно загрузить изображение JPG');}	
	
	foreach($ras as $r) // проверяем расширение
	{
	if(strpos(basename($_FILES['f2']['name']),$r)) {$check=1;}
	}
	if($check==0){exit('Нужно загрузить изображение JPG');}		
	
	
	$file_name1='file/file1.jpg';
	copy($_FILES['f1']['tmp_name'],$file_name1);

	$file_name2='file/file2.jpg';
	copy($_FILES['f2']['tmp_name'],$file_name2);

$my_file = "file1.jpg";
$my_file2 = "file2.jpg";
$my_path = "file/";
$my_name = "AVTOTITAN";
$my_mail = "info@titan-rent.ru";
$my_replyto = "info@titan-rent.ru";
$my_subject = "Бронирование автомобиля";
$my_message = $mes;
mail_attachment($my_file, $my_file2, "", "", $my_path, "info@titan-rent.ru", $my_mail, $my_name, $my_replyto, $my_subject, $my_message);
unlink($file_name1);
unlink($file_name2);
}

elseif(($file1!='')&&($file2!='')&&($file3!='')&&($file4=='')) //есть 3 вложение
{

	if($_FILES['f1']['size']>6000000)
	{
	exit("Размер файла > 6 мегабайт");
	}
	if($_FILES['f2']['size']>6000000)
	{
	exit("Размер файла > 6 мегабайт");
	}	
	if($_FILES['f3']['size']>6000000)
	{
	exit("Размер файла > 6 мегабайт");
	}	


	$ras=array(".jpg",".JPG",".jpeg",".JPEG");
	$check=0;
	
	foreach($ras as $r) // проверяем расширение
	{
	if(strpos(basename($_FILES['f1']['name']),$r)) {$check=1;}
	}
	if($check==0){exit('Нужно загрузить изображение JPG');}	
	
	foreach($ras as $r) // проверяем расширение
	{
	if(strpos(basename($_FILES['f2']['name']),$r)) {$check=1;}
	}
	if($check==0){exit('Нужно загрузить изображение JPG');}	
	foreach($ras as $r) // проверяем расширение
	{
	if(strpos(basename($_FILES['f3']['name']),$r)) {$check=1;}
	}
	if($check==0){exit('Нужно загрузить изображение JPG');}	
	
	
	$file_name1='file/file1.jpg';
	copy($_FILES['f1']['tmp_name'],$file_name1);

	$file_name2='file/file2.jpg';
	copy($_FILES['f2']['tmp_name'],$file_name2);
	
	$file_name3='file/file3.jpg';
	copy($_FILES['f3']['tmp_name'],$file_name3);	

$my_file = "file1.jpg";
$my_file2 = "file2.jpg";
$my_file3 = "file3.jpg";
$my_path = "file/";
$my_name = "AVTOTITAN";
$my_mail = "info@titan-rent.ru";
$my_replyto = "info@titan-rent.ru";
$my_subject = "Бронирование автомобиля";
$my_message = $mes;
mail_attachment($my_file, $my_file2, $my_file3, "", $my_path, "info@titan-rent.ru", $my_mail, $my_name, $my_replyto, $my_subject, $my_message);
unlink($file_name1);
unlink($file_name2);
unlink($file_name3);
}

elseif(($file1!='')&&($file2!='')&&($file3!='')&&($file4!='')) //есть 4 вложение
{

	if($_FILES['f1']['size']>6000000)
	{
	exit("Размер файла > 6 мегабайт");
	}
	if($_FILES['f2']['size']>6000000)
	{
	exit("Размер файла > 6 мегабайт");
	}	
	if($_FILES['f3']['size']>6000000)
	{
	exit("Размер файла > 6 мегабайт");
	}	
	if($_FILES['f4']['size']>6000000)
	{
	exit("Размер файла > 6 мегабайт");
	}	
	
	
	$ras=array(".jpg",".JPG",".jpeg",".JPEG");
	$check=0;
	
	
	foreach($ras as $r) // проверяем расширение
	{
	if(strpos(basename($_FILES['f1']['name']),$r)) {$check=1;}
	}
	if($check==0){exit('Нужно загрузить изображение JPG');}	
	
	foreach($ras as $r) // проверяем расширение
	{
	if(strpos(basename($_FILES['f2']['name']),$r)) {$check=1;}
	}
	if($check==0){exit('Нужно загрузить изображение JPG');}	
	foreach($ras as $r) // проверяем расширение
	{
	if(strpos(basename($_FILES['f3']['name']),$r)) {$check=1;}
	}
	if($check==0){exit('Нужно загрузить изображение JPG');}	
	foreach($ras as $r) // проверяем расширение
	{
	if(strpos(basename($_FILES['f4']['name']),$r)) {$check=1;}
	}
	if($check==0){exit('Нужно загрузить изображение JPG');}	
	
	
	$file_name1='file/file1.jpg';
	copy($_FILES['f1']['tmp_name'],$file_name1);

	$file_name2='file/file2.jpg';
	copy($_FILES['f2']['tmp_name'],$file_name2);
	
	$file_name3='file/file3.jpg';
	copy($_FILES['f3']['tmp_name'],$file_name3);	

	$file_name4='file/file4.jpg';
	copy($_FILES['f4']['tmp_name'],$file_name4);	
	
$my_file = "file1.jpg";
$my_file2 = "file2.jpg";
$my_file3 = "file3.jpg";
$my_file4 = "file4.jpg";
$my_path = "file/";
$my_name = "AVTOTITAN";
$my_mail = "info@titan-rent.ru";
$my_replyto = "info@titan-rent.ru";
$my_subject = "Бронирование автомобиля";
$my_message = $mes;
mail_attachment($my_file, $my_file2, $my_file3, $my_file4, $my_path, "info@titan-rent.ru", $my_mail, $my_name, $my_replyto, $my_subject, $my_message);
unlink($file_name1);
unlink($file_name2);
unlink($file_name3);
unlink($file_name4);
}


echo "<p>Ваш заказ успешно отправлен! Менеджер свяжется с Вами в ближайшее время.</p>";
}
?>	
	
	
	
	
	
<br />
</div>
<div style='clear: left;'></div>

</div>
<div id='cont_bot'></div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
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
<noscript><div><img src="https://mc.yandex.ru/watch/44895769" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100554937-1', 'auto');
  ga('send', 'pageview');
</script>

<footer>
<?php
include 'libs/foot.php';
?>
</footer>

<div id="toTop"></div>

</body>
</html>
