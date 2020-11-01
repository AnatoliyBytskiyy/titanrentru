<?php
session_start();
if(isset($_SESSION['pass']))
{
?>
<link href='style.css' type='text/css' rel='stylesheet' />
<h2>Загрузка прайс-листа</h2>
<div class='box2'>
<div class='box11'>
<a href='index.php'>Вернуться в главное меню</a>
</div>

<form name='f' method='post' enctype="multipart/form-data" action='price-loader.php'>
Загрузить прайс:<input type='file' name='f1' /><br /><br />
<input type='submit' name='sub' value='загрузить'/>
</form>
<?php
$dir='../price';
$s="";
$iden=opendir($dir);
while ($file=readdir($iden))
{
if($file!='.'&&$file!='..')
	$s=$file;
}

if($s!="")
{
	$f=fopen("../date.txt","r");
	$read=fread($f,filesize("../date.txt"));
	fclose($f);
	echo "<div style='text-align: center; margin-top: 25px; font-size: 16px;'>Прайс загружен: <b>".$read."</b></div>";

}
else
{	echo "<div style='text-align: center; margin-top: 25px; font-size: 16px;'>Прайс не загружен</div>";
}

?>
</div>




<?php
}
else
{
echo "Вы не авторизированы";
}
?>