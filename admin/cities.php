<?php
session_start();
if(isset($_SESSION['pass']))
{


echo "<link href='style.css' type='text/css' rel='stylesheet' />";

$db_name='avtotitan';
@$connect=mysql_connect("localhost","avto2","Pret1k4m9");
mysql_query("SET NAMES 'cp1251'");
mysql_query("SET CHARACTER SET 'cp1251'");
mysql_select_db($db_name);


$r=mysql_query("select * from cities order by name");
$count_d=0;
while (@$row=mysql_fetch_row($r))
{
 $ar[$count_d]=$row; //��������� �� ������� � ��������� ������
 $count_d++; // ���������� ������� ��� ������ (�� ������ ����� $countOnPage - �� ��������� �������� ������, ��������)
}
echo "<h2>������</h2>";
echo "<div class='box1' style='width: 800px;'>";
echo "<div class='box11'><a href='index.php'>��������� � ������� ����</a></div>";
echo "<a href='edit_city.php?id=new'>�������� �����</a><br /><br /><br />";
for($j=0;$j<$count_d;$j++)
{

echo "<a class='del'  href='del_city.php?id=".$ar[$j][0]."'><img src='del.png' alt='������� �����' title='������� �����' style='vertical-align: middle;'></a> <a href='edit_city.php?id=".$ar[$j][0]."' title='������������� �����'>".$ar[$j][1]."</a> [<a href='dist.php?id=".$ar[$j][0]."' style='color: #777;'>����������</a>]<br /><br />";
}



}
else
{
echo "�� �� ��������������";
}
?>