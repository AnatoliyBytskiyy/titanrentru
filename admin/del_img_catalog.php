<?php
session_start();
if(isset($_SESSION['pass']))
{
$id_photo=$_GET['id_photo'];
$id=$_GET['id'];
$type=$_GET['type'];
$count=$_GET['count'];

echo 
$dir="../catalog_photo/".$id."/";

unlink($dir.$id_photo."-big.jpg");
unlink($dir.$id_photo."-min.jpg");
if($count!=$id_photo)
{
for($i=($id_photo+1);$i<=$count;$i++)
{
rename($dir.($i)."-big.jpg",$dir.($i-1)."-big.jpg");
rename($dir.($i)."-min.jpg",$dir.($i-1)."-min.jpg");
}
}


	echo "<html><head>
	<meta http-equiv='Refresh' content='0; URL=catalog_photo_edit.php?type=$type&id=$id'>
	</head></html>";




}
else
{
echo "Вы не авторизированы";
}


?>