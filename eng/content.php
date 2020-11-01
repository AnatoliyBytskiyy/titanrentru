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
<title><?php echo $cont_data['title_eng'] ?> :: Avtotitan</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<meta name="description" content="<?php echo $cont_data['descr_eng'] ?>" />
<!--[if lte IE 9]> 
<script src="js/html5.js"></script>
<![endif]-->
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="favicon.ico"  type="image/x-icon"/>

<link rel='stylesheet' type='text/css' href='css/style.css' />
<script src="js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="js/rotate.2.1.js"> </script>
<script type="text/javascript" src="js/scripts.js"></script>
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
	<h1><?php echo $cont_data['name_eng']; ?></h1>
	<div class='cont_txt'>
<?php
echo trim($cont_data['text_eng']);
?>
	</div>
<br />
</div>
<div style='clear: left;'></div>
</div>
<div id='cont_bot'></div>

<footer>
<?php
include 'libs/foot.php';
?>
</footer>

</body>
</html>
