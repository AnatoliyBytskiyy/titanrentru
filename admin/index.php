<?php
session_start();
if(isset($_POST['pass'])&&($_POST['pass']=='InterLezer25'))
{$_SESSION['pass']=$_POST['pass'];}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
�������
</title>

<meta http-equiv=Content-Type content="text/html; charset=windows-1251" />
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php
if(!isset($_SESSION['pass']))
{
	echo "<div class='box'>";
	echo "<div class='box-in1'>";
	echo "<form action='index.php' method='post'>";
	echo "������� ������: <input type='password' name='pass'>";
	echo "<br /><input type='submit' value='OK'>";
	echo "</form>";
	echo "</div>";
	echo "</div>";
	exit();
}

echo "<h2>������� ����</h2>";
	echo "<div class='box' style='width: 700px; position: relative; padding-bottom: 45px;'>";

echo "<a href='cont_edit.php?cont_id=1'>����� �� �������</a><br /><br />";
echo "<a href='cont_edit.php?cont_id=2'>� ��������</a><br /><br />";
echo "<a href='cont_edit.php?cont_id=3'>��������</a><br /><br />";
echo "<a href='cont_edit.php?cont_id=4'>������� �������</a><br /><br />";
echo "<a href='cont_edit.php?cont_id=5'>�������� ��������</a><br /><br />";
echo "<a href='cont_edit.php?cont_id=6'>������� 1</a><br /><br />";
echo "<a href='cont_edit.php?cont_id=7'>������� 2</a><br /><br />";
echo "<a href='cont_edit.php?cont_id=9'>������� 3</a><br /><br />";
echo "<a href='cont_edit.php?cont_id=10'>������� 4</a><br /><br />";
echo "<a href='cont_edit.php?cont_id=11'>������� 5</a><br /><br />";
echo "<a href='cont_edit.php?cont_id=12'>������� 6</a><br /><br />";
echo "<a href='cont_edit.php?cont_id=13'>������� 7</a><br /><br />";
echo "<a href='cont_edit.php?cont_id=14'>������� 8</a><br /><br />";
echo "<a href='cont_edit.php?cont_id=8'>��������</a><br /><br />";

echo "<div class='line' style='margin-bottom: 8px;'></div>";
echo "<img src='catalog.png' style='vertical-align: middle;' /> <a href='gallery.php'><b>�������</b></a> &nbsp;&nbsp; <a href='price.php'>�����</a><br />";
echo "<div class='line' style='margin-top: 8px; margin-bottom: 10px;'></div>";
echo "<a href='cities.php'>������</a><br /><br />";
//echo "<a href='otz.php'>�������� �����</a><br /><br />";
//echo "<a href='publ.php'>������</a><br /><br />";
echo "<a href='exit.php' style='position: absolute; bottom: 10px; right: 10px;'>�����</a>";
echo "</div>";
echo "<div style='text-align: center;'><img src='logo.png' /></div>";
?>
</div>
</html>