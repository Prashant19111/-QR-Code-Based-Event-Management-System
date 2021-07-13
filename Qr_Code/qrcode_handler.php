<?php
include 'phpqrcode/qrlib.php';
$text="hi";
$path='project1/Qr_Code/qr_images/';
$file=$path.uniqid().".png";
$ecc="L";
$pixel_Size=10;
$frame_Size=10;
QRcode::png($text,$file,$ecc,$pixel_Size,$frame_Size);
echo "<center><img src='".$file."'></center>";
?>