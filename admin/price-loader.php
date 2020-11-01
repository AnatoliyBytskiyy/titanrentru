<?php
if(isset($_POST['sub']))
{$file=basename($_FILES['f1']['name']); //имя файла
if($file==''){exit('Файл не выбран');}

$ras=substr($file, strrpos($file, '.') + 1); //расширение загружаемого файла


$rand='';

$uploadfile ="../price/price.".$ras;



$dir='../price';
$s="";
$iden=opendir($dir);
while ($file=readdir($iden))
{
if($file!='.'&&$file!='..')
	$s=$file;
}
@unlink($dir."/".$s);


// Копируем файл из каталога для временного хранения файлов:
copy($_FILES['f1']['tmp_name'], $uploadfile);

$curr_d=date("d.m.Y H:i");
$fout=fopen("../date.txt","w");
fwrite($fout,$curr_d);
fclose($fout);

echo "<html><head>
<meta http-equiv='Refresh' content='0; URL=price.php'>
</head></html>";
}


?>