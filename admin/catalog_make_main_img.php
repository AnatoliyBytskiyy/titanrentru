<?php
session_start();
if(isset($_SESSION['pass']))
{
$id_photo=$_POST['id_photo'];
$id=$_POST['id'];
$type=$_POST['type'];

$dir="../catalog_photo/".$id."/";

rename($dir."1-big.jpg",$dir."tmp-big.jpg");
rename($dir."1-min.jpg",$dir."tmp-min.jpg");



rename($dir.$id_photo."-big.jpg",$dir."1-big.jpg");
rename($dir.$id_photo."-min.jpg",$dir."1-min.jpg");


rename($dir."tmp-big.jpg",$dir.$id_photo."-big.jpg");
rename($dir."tmp-min.jpg",$dir.$id_photo."-min.jpg");




header("Location: catalog_photo_edit.php?type=$type&id=$id");


}
else
{
echo "Вы не авторизированы";
}
?>