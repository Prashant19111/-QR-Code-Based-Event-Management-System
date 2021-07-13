<?php
function getUsernameFromEmail($email) {
	$find = '@';
	$pos = strpos($email, $find); 
	$username = substr($email, 0, $pos);   
	return $username;
}

$email=$_GET['email'];
$filename=getUsernameFromEmail($email);

// Recipient 
$to = 'shrimalprashant2000@gmail.com'; 
 
// Sender 
$from = 'prashantshrimal3268@gmail.com'; 
$fromName = 'code'; 
 
// Email subject 
$subject = 'QR Code for Event';  
 
// Attachment file 
$file = "temp/$filename.png"; 
 
// Email body content 
$htmlContent = ' 
    <h3>QR code attached</h3> 
'; 
 
// Header for sender info 
// $headers = "From: $fromName"." <".$from.">"; 
$headers = "From: prashantshrimal3268@gmail.com"; 
 
// Boundary  
$semi_rand = md5(time());  
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 
// Headers for attachment  
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
 
// Multipart boundary  
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";    
 
// Preparing attachment 
if(!empty($file) > 0){ 
    if(is_file($file)){ 
        $message .= "--{$mime_boundary}\n"; 
        $fp =    @fopen($file,"rb"); 
        $data =  @fread($fp,filesize($file)); 
 
        @fclose($fp); 
        $data = chunk_split(base64_encode($data)); 
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
        "Content-Description: ".basename($file)."\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
    } 
} 
$message .= "--{$mime_boundary}--"; 
$returnpath = "-f" . $from; 
 
// Send email 
if(mail($to, $subject, $message, $headers, $returnpath)){
	session_start();
    $msg="Email Sent Successfully";
    $_SESSION['msg']=$msg;
	header('location:attendees.php');
}
else{
	session_start();
    $msgerror="Email sending failed";
    $_SESSION['msgerror']=$msgerror;
	header('location:attendees.php');
}  
 
// Email sending status 
// echo $mail?"<h1>Email Sent Successfully!</h1>":"<h1>Email sending failed.</h1>"; 

?>