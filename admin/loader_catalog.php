<?php
if(isset($_POST['sub']))
{


$id=$_POST['id']; 
$type=$_POST['type'];


$dir="../catalog_photo/".$id;
$file=basename($_FILES['f1']['name']); //имя файла
if($file==''){exit('Файл не выбран');}

if(!$_FILES['f1']['size'])
{exit("Файл не определен - пересохраните изображение в любом редакторе");}

$ras=array(".jpg",".JPG",".jpeg",".JPEG");
$check=0;
foreach($ras as $r) // проверяем расширение
{
if(strpos(basename($_FILES['f1']['name']),$r)) {$check=1;}
}
if($check==0){exit('Нужно загрузить изображение JPG');}

$iden=opendir($dir);
while ($file=readdir($iden))
{
if($file!='.'&&$file!='..')
	$s[]=$file;
}
$count=count($s); //количество файлов в папке
$next=(int)($count/2)+1; // номер имени для следующего изображения


$file_name=$dir.'/'.$next.'.jpg';
$file_big=$dir.'/'.$next.'-big.jpg'; // имя файла big
$file_min=$dir.'/'.$next.'-min.jpg'; // имя файла min
copy($_FILES['f1']['tmp_name'],$file_name);

$imgsize=getimagesize($file_name);
$width=$imgsize[0]; // ширина изображения
$height=$imgsize[1]; //высота изображения
$img=imagecreatefromjpeg($file_name); // дескриптор  изображения-оригинала



	if($height>1000) // если высота больше 900
	{
		$new_height=1000; //новая высота
		$new_width=round(($new_height*$width)/$height,0); //новая ширина (пропорционально и с округлением до целых)
	}
	else // если высота меньше 900 - ничего не трогаем
	{
	$new_height=$height;
	$new_width=$width;
	}
	

	
	$blank_big=imagecreatetruecolor($new_width,$new_height); //пустое изображение для big
	imagecopyresampled($blank_big,$img,0,0,0,0,$new_width,$new_height,$width,$height); //туда кидаем наш рисунок
	
	
	
imagejpeg($blank_big,$file_big, 70); //сохраняем в файл
	
	

	
	
	
	$width_out = 280; //ширина миниатюры
	$height_out = 157; // высота миниатюры
	$width_orig_  = $width; 
	$height_orig_ = $height;
	
	//////////// определение пропорций, под которые подгонять картинку.
	$k = $width / $height;
	$k_out = $width_out / $height_out;
	if ( $k > $k_out) $width = $height * $k_out ;  else $height = $width / $k_out ;
	
	///////////////////////// если картинка не попадает под пропорции $width_out*$height_out, то часть оригинала нужно обрезать.
	$ratio_orig = $width/$height;
	if ($width_out/$height_out > $ratio_orig) {$width_out = $height_out*$ratio_orig;} else {$height_out = $width_out/$ratio_orig;}
	
	//// отцентровать будущую картинку отцентровать по центру оригинала
	$x_shift =  ($width_orig_  - $width) /2;
	
	$y_shift =  ($height_orig_  - $height) /2;
	
	$image_p = imagecreatetruecolor($width_out, $height_out);
	
	imagecopyresampled($image_p, $img, 0, 0, $x_shift, $y_shift, $width_out, $height_out, $width, $height);


	imagejpeg($image_p,$file_min, 100); //сохраняем в файл
	imagedestroy($image_p);
	imagedestroy($blank_big);
	imagedestroy($img);

	unlink($file_name); //удаляем исходный файл
	
	

	echo "<html><head>
	<meta http-equiv='Refresh' content='0; URL=catalog_photo_edit.php?type=$type&id=$id'>
	</head></html>";
	


	exit();	





}

?>