<?php
session_start();
if(isset($_SESSION['pass']))
{
echo "<link href='style.css' type='text/css' rel='stylesheet' />";
$db_name='avtotitan';
@$connect=mysql_connect("localhost","avto2","Pret1k4m9");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
mysql_query ("set character_set_client='cp1251'");
mysql_query ("set character_set_results='cp1251'");
mysql_query ("set collation_connection='cp1251_general_ci'");
mysql_select_db($db_name);

if(!isset($_POST['sub']))
{
$res_cont = mysql_query("select * from period where id='1' limit 1"); 
$valuta_data = mysql_fetch_assoc($res_cont);
?>
<h2>Периоды</h2>
<div class='box2'>
<div class='box11'><a href='index.php'>Вернуться в Главное меню</a></div>
<form action='period.php' method='post'>
Период 1 <input type='text' name='period1' style='width: 98px;' value='<?php echo $valuta_data['period1']; ?>' />  &nbsp;&nbsp;&nbsp;&nbsp; Период 2 <input type='text' name='period2' style='width: 98px;' value='<?php echo $valuta_data['period2']; ?>' />  &nbsp;&nbsp;&nbsp;&nbsp; Период 3 <input type='text' name='period3' style='width: 98px;' value='<?php echo $valuta_data['period3']; ?>' /> 

<?php
if($valuta_data['curr']==1)
{$curr1=" checked='checked' ";}
elseif($valuta_data['curr']==2)
{$curr2=" checked='checked' ";}
else
{$curr3=" checked='checked' ";}
?>

<br /><br />Текущий период: 1<input type='radio' name='curr' value='1' <?php echo $curr1 ?> /> &nbsp; 2<input type='radio' name='curr' value='2' <?php echo $curr2 ?> /> &nbsp; 3<input type='radio' name='curr' value='3' <?php echo $curr3 ?> />

<br /><br /><input type='submit' name="sub" value='сохранить' />
</form>
</div>
<?php
}
else
{
$period1=$_POST['period1'];
$period2=$_POST['period2'];
$period3=$_POST['period3'];
$curr=$_POST['curr'];

mysql_query("update period set period1='".$period1."',period2='".$period2."',period3='".$period3."',curr='".$curr."' where id='1'") or die("ошибка");
mysql_close($connect);
echo "<html><head>
<meta http-equiv='Refresh' content='0; URL=gallery.php'>
</head></html>";
exit();



}
?>
<?php
}
else
{
echo "Вы не авторизированы";
}
?>