<?php
session_start();
if(isset($_SESSION['pass']))
{
?>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({
content_css : "tinypp.css",
style_formats : [
	{title : 'выделение красным', inline : 'span', classes : 'red'},
	{title : 'выделение синим', inline : 'span', classes : 'blue'},	
	{title : 'Подзаголовок', block : 'h2'},
	],
	theme : "advanced",
	mode : "textareas",
	language:"ru",
	paste_strip_class_attributes : "all",
	plugins : "lists, safari, pagebreak, style, layer, table, save, advhr, advimage, advlink, emotions, iespell, inlinepopups, insertdatetime, preview, media, searchreplace, print, contextmenu, paste, directionality, fullscreen, noneditable, visualchars, nonbreaking, xhtmlxtras, template",
	 theme_advanced_buttons1 : "bold,italic,underline, fontsizeselect, justifyleft, justifyright, justifycenter, justifyfull, removeformat, undo,redo, bullist, numlist, link, unlink, image, styleselect,|,forecolor,backcolor",
    theme_advanced_buttons2 : "table, tablecontrols,|,nonbreaking,|,media,|,code",
   theme_advanced_buttons3 : "",


theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true
});
</script>
<?php
if(!isset($_GET['cont_id'])) {die("тип контента не определен");}
$cont_id=$_GET['cont_id'];
//if($cont_id>4) {exit('Ошибка');}
$db_name='avtotitan';
@$connect=mysql_connect("localhost","avto2","Pret1k4m9");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
mysql_select_db($db_name);
$quer="select * from content where id='".$cont_id."' limit 1";
$r=mysql_query($quer);
$count_d=0;
while (@$row=mysql_fetch_row($r))
{
$ar[$count_d]=$row; //сохраняем из таблицы в двумерный массив
$count_d++; // количестов записей для вывода (не всегда равно $countOnPage - на последней странице вывода, например)
}
$tit=$ar[0][1];
?>
<link href='style.css' type='text/css' rel='stylesheet' />
<h2><?php echo $tit ?></h2>
<div class='box2' style='width: 850px;'>
<div class='box11'>



<?php
echo "<a href='index.php'>Вернуться</a></div>";
echo "<form action='save_cont.php' method='post'>";
   
echo "Title: <input type='text' name='title' style='width: 600px;' value='".$ar[0][6]."' /><br /><br />";	
echo "Title (англ): <input type='text' name='title_eng' style='width: 600px;' value='".$ar[0][7]."' /><br /><br />";	
	echo "Текст:<br /><textarea style='width: 750px; height: 300px;' name='txt'>";
	echo $ar[0][2];
	echo "</textarea><br />";
	echo "Текст (англ):<br /><textarea style='width: 750px; height: 300px;' name='txt_eng'>";
	echo $ar[0][4];
	echo "</textarea><br />";
echo "Description: <input type='text' name='descr' style='width: 400px;' value='".$ar[0][3]."' /><br /><br />";
echo "Description (англ): <input type='text' name='descr_eng' style='width: 400px;' value='".$ar[0][5]."' /><br /><br />";
echo "Keywords: <input type='text' name='keyword' style='width: 400px;' value='".$ar[0][9]."' /><br /><br />";
echo "Keywords (англ): <input type='text' name='keyword_eng' style='width: 400px;' value='".$ar[0][10]."' /><br /><br />";
echo "H1: <input type='text' name='h1' style='width: 400px;' value='".$ar[0][1]."' /><br /><br />";
echo "H1 (англ): <input type='text' name='h1_eng' style='width: 400px;' value='".$ar[0][8]."' /><br /><br />";
	echo "<input type='hidden' name='cont_id' value=".$cont_id." />";
	echo "<input type='submit' value='Сохранить' />";
	echo "</form>";
?>



</div>




<?php
}
else
{
echo "Вы не авторизированы";
}
?>