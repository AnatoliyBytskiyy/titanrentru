<?php
if(isset($_POST['sub']))
{


$id=$_POST['id']; 
$type=$_POST['type'];


$dir="../catalog_photo/".$id;
$file=basename($_FILES['f1']['name']); //��� �����
if($file==''){exit('���� �� ������');}

if(!$_FILES['f1']['size'])
{exit("���� �� ��������� - ������������� ����������� � ����� ���������");}

$ras=array(".jpg",".JPG",".jpeg",".JPEG");
$check=0;
foreach($ras as $r) // ��������� ����������
{
if(strpos(basename($_FILES['f1']['name']),$r)) {$check=1;}
}
if($check==0){exit('����� ��������� ����������� JPG');}

$iden=opendir($dir);
while ($file=readdir($iden))
{
if($file!='.'&&$file!='..')
	$s[]=$file;
}
$count=count($s); //���������� ������ � �����
$next=(int)($count/2)+1; // ����� ����� ��� ���������� �����������


$file_name=$dir.'/'.$next.'.jpg';
$file_big=$dir.'/'.$next.'-big.jpg'; // ��� ����� big
$file_min=$dir.'/'.$next.'-min.jpg'; // ��� ����� min
copy($_FILES['f1']['tmp_name'],$file_name);

$imgsize=getimagesize($file_name);
$width=$imgsize[0]; // ������ �����������
$height=$imgsize[1]; //������ �����������
$img=imagecreatefromjpeg($file_name); // ����������  �����������-���������



	if($height>1000) // ���� ������ ������ 900
	{
		$new_height=1000; //����� ������
		$new_width=round(($new_height*$width)/$height,0); //����� ������ (��������������� � � ����������� �� �����)
	}
	else // ���� ������ ������ 900 - ������ �� �������
	{
	$new_height=$height;
	$new_width=$width;
	}
	

	
	$blank_big=imagecreatetruecolor($new_width,$new_height); //������ ����������� ��� big
	imagecopyresampled($blank_big,$img,0,0,0,0,$new_width,$new_height,$width,$height); //���� ������ ��� �������
	
	
	
imagejpeg($blank_big,$file_big, 70); //��������� � ����
	
	

	
	
	
	$width_out = 280; //������ ���������
	$height_out = 157; // ������ ���������
	$width_orig_  = $width; 
	$height_orig_ = $height;
	
	//////////// ����������� ���������, ��� ������� ��������� ��������.
	$k = $width / $height;
	$k_out = $width_out / $height_out;
	if ( $k > $k_out) $width = $height * $k_out ;  else $height = $width / $k_out ;
	
	///////////////////////// ���� �������� �� �������� ��� ��������� $width_out*$height_out, �� ����� ��������� ����� ��������.
	$ratio_orig = $width/$height;
	if ($width_out/$height_out > $ratio_orig) {$width_out = $height_out*$ratio_orig;} else {$height_out = $width_out/$ratio_orig;}
	
	//// ������������ ������� �������� ������������ �� ������ ���������
	$x_shift =  ($width_orig_  - $width) /2;
	
	$y_shift =  ($height_orig_  - $height) /2;
	
	$image_p = imagecreatetruecolor($width_out, $height_out);
	
	imagecopyresampled($image_p, $img, 0, 0, $x_shift, $y_shift, $width_out, $height_out, $width, $height);


	imagejpeg($image_p,$file_min, 100); //��������� � ����
	imagedestroy($image_p);
	imagedestroy($blank_big);
	imagedestroy($img);

	unlink($file_name); //������� �������� ����
	
	

	echo "<html><head>
	<meta http-equiv='Refresh' content='0; URL=catalog_photo_edit.php?type=$type&id=$id'>
	</head></html>";
	


	exit();	





}

?>