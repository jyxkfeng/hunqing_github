<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<?php
echo  '客户端机器文件的原名称 '.$_FILES['userfile']['name'];
echo '</br>';
echo  '文件的MIME类型'.$_FILES['userfile']['type']; 
echo '</br>';
echo  '已上传的文件大小 '.$_FILES['userfile']['size']; 
echo '</br>';
echo  ' 文件被上传后在服务器存储的临时文件名 '.$_FILES['userfile']['tmp_name'];
echo '</br>';
echo "和该文件上传的错误代码 ".$_FILES['userfile']['error'] ;
echo '</br>';
echo "string";

if(is_uploaded_file($_FILES['userfile']['tmp_name']))
{
$file=$_FILES['userfile'];
$imgtype='';

$name=$file['name']; 
$type=$file['type'];

$size=$file['size']; 

$tmpfile=$file['tmp_name']; //临时存放文件

echo '临时存放文件'.$tmpfile;
echo '</br>';
$error=$file['error']; 
//if($erro) die("上传出现错误");
if($size>600000000) die("太大");
switch($type){
// 得到上传文件后缀

case 'image/pjpeg': $imgtype='.jpg';
break; 
case 'image/jpeg': $imgtype='.jpg';
break; 
case 'image/gif': $imgtype='.gif';
break; 
case 'image/png': $imgtype='.png';
break; 
default:echo "图片格式不正确";;
}
echo $imgtype;
echo '</br>';
$filename="wt209_".date("Ymdhis").$imgtype;
$myfile=$filename;
echo $myfile;
if(move_uploaded_file($tmpfile,$myfile)) echo "上传成功";
}
?>