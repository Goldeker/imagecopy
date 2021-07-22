<?php

//背景图片
$bgPath= './resource/bg.png';
$bgImage= imagecreatefrompng($bgPath);

//透明图片
$desPath = './resource/avator.png';
$desImage = imagecreatefrompng($desPath);

//创建图像
$imagebox = imagecreatetruecolor(imagesx($bgImage),imagesy($bgImage));
imagecopyresampled($imagebox, $bgImage, 0, 0, 0, 0, imagesx($bgImage), imagesy($bgImage), imagesx($bgImage), imagesy($bgImage));

//----合并透明图片----

/*最初*/
// imagecopymerge($imagebox, $desImage, 20, 0, 0, 0, imagesx($desImage), imagesy($desImage), 100);  

/*方式一*/
imagecopy($imagebox, $desImage, 20, 0, 0, 0, imagesx($desImage), imagesy($desImage));  

/*方式二*/
// $x = imagesx($desImage);
// $y = imagesy($desImage);
// $newDes = imagecreatetruecolor($x, $y);
// $color = imagecolorallocate($newDes,255,255,255); 
// imagecolortransparent($newDes,$color); 
// imagefill($newDes,0,0,$color); 
// imagecopy($newDes, $desImage, 0, 0, 0, 0,$x, $y);
// imagecopymerge($imagebox, $newDes, 20, 0, 0, 0, $x, $y, 100);  

$filename = './images/'.uniqid().'.jpg';
imagejpeg($imagebox,$filename);

exit('success..');