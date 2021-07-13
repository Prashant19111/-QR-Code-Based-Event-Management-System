<?php

include('libs/phpqrcode/qrlib.php'); 

function getUsernameFromEmail($email) {
	$find = '@';
	$pos = strpos($email, $find); 
	$username = substr($email, 0, $pos);   
	return $username;
}

if(isset($_POST['submit']) ) {
	$tempDir = 'temp/'; 
	$email = $_POST['mail'];
    $filename = getUsernameFromEmail($email);
    QRcode::png($email, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
    session_start();
    $_SESSION['filename']=$filename;
   
}
include 'attendeesdb.php';
header('location:generate_qr.php');
?>