<?php
include 'folder/_dbconnect.php';
$id=$_GET['id'];
// echo $id;
$deletequery="DELETE FROM `harryee` WHERE `harryee`.`sno.` = $id ";
$result= mysqli_query($conn,$deletequery);
if($result){
    // echo 'success';
    header("location: attendees.php");
}
else{
    header("location: attendees.php?error");
}

?>