<?php
session_start();

if(isset($_SESSION['pass']))
{

$id=$_GET['id'];
$type=$_GET['type'];


$db_name='avtotitan';
@$connect=mysql_connect("localhost","avto2","Pret1k4m9");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
mysql_select_db($db_name);
$res = mysql_query("select * from catalog where id='".$id."' limit 1"); 
$obj_data = mysql_fetch_assoc($res);


$dir="../catalog_photo/".$id;
$iden=opendir($dir);
while ($file=readdir($iden))
{
if($file!='.'&&$file!='..')
	$s[]=$file;
}
$count=count($s)/2; 
?>
<link href='style.css' type='text/css' rel='stylesheet' />
<h2><?php echo $obj_data['name']  ?></h2>
<div class='box2'>
<div class='box11'>
<?php
echo "<a href='catalog.php?type=".$type."'>¬ернутьс€</a>";
?>


<form name='f' method='post' enctype="multipart/form-data" action='loader_catalog.php' style='text-align: left;'>
ƒобавить фото:<input type='file' name='f1' /><br />
<input type='hidden' name='id' value='<?php echo $id ?>' />
<input type='hidden' name='type' value='<?php echo $type ?>' />
<input type='submit' name='sub' value='загрузить'/>
</form>
<?php
if($count!=0)
{
	for($i=1;$i<=$count;$i++)
	{
		echo "<div class='img-box' style='width: 450px;'>";
		if($i==1)
		{
			echo "<div style='text-align: center;'>главное фото</div>";
		}
		else
		{
		echo "
		<form action='catalog_make_main_img.php' method='post'>
		<input type='hidden' name='id' value='".$id."' />
		<input type='hidden' name='id_photo' value='".$i."' />
		<input type='hidden' name='count' value='".$count."' />";
		
echo "<input type='hidden' name='type' value='$type' />";

		
		echo "<input type='submit' value='сделать главной' />
		</form>
		";
		}
		echo "<img src='".$dir."/".$i."-min.jpg?salt=".rand(1,100)."'><br /><br />";
		
		
		echo "
		<form action='del_img_catalog.php' method='get'>
		<input type='hidden' name='id' value='".$id."' />
		<input type='hidden' name='id_photo' value='".$i."' />
		<input type='hidden' name='count' value='".$count."' />";

echo "<input type='hidden' name='type' value='$type' />";
		echo "<input type='submit' value='удалить' />
		</form>
		";
		echo "</div>";
	}
}
else
{
	echo "<div style='text-align: center; margin-top: 25px; font-size: 16px;'>изображени€ не загружены</div>";
}

?>
</div>




<?php
}
else
{
echo "¬ы не авторизированы";
}
?>