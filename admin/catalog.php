<?php
session_start();
if(isset($_SESSION['pass']))
{


$type=$_GET['type'];


$db_name='avtotitan';
@$connect=mysql_connect("localhost","avto2","Pret1k4m9");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
mysql_select_db($db_name);


$res_type = mysql_query("SELECT * FROM types WHERE id = '". $type ."' limit 1"); 
$type_data = mysql_fetch_assoc($res_type);





echo "<link href='style.css' type='text/css' rel='stylesheet' />";






$r=mysql_query("select * from catalog where type='".$type."' order by pp,id");



$count_d=0;
while (@$row=mysql_fetch_row($r))
{
 $ar[$count_d]=$row; //��������� �� ������� � ��������� ������
 $count_d++; // ���������� ������� ��� ������ (�� ������ ����� $countOnPage - �� ��������� �������� ������, ��������)
}

echo "<h2>".$type_data['name']."</h2>";
echo "<div class='box1' style='width: 800px;'>";
echo "<div class='box11'><a href='gallery.php'>���������</a> &nbsp;&nbsp; <a href='index.php'>��������� � ������� ����</a></div>";
echo "<a href='edit_catalog.php?type=".$type."&id=new'>�������� ����������</a><br /><br /><br />";


for($j=0;$j<$count_d;$j++)
{
echo "<a class='del'  href='del_catalog.php?type=".$type."&id=".$ar[$j][0]."'><img src='del.png' alt='�������' title='�������' style='vertical-align: middle;'></a> <span style='color: #777;'>".$ar[$j][22]."</span>  <a href='edit_catalog.php?type=".$type."&id=".$ar[$j][0]."' title='�������������' style='font-weight: bold;'>".$ar[$j][2]."</a> &nbsp;&nbsp; <a href='catalog_photo_edit.php?type=".$type."&id=".$ar[$j][0]."'>[����]</a> &nbsp;&nbsp; <br /><br />";
}


}
else
{
echo "�� �� ��������������";
}
?>