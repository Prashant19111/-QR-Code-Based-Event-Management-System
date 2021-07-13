<?php
// $Email=$_POST['mail'];
// echo "already used";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    include 'folder/_dbconnect.php';
    $Email=$_POST["mail"];
    $status="No";
    $sql="Select * from harryee where email = '$Email' ";
    $test= mysqli_query($conn,$sql);
    $num=mysqli_num_rows($test);
    if($num==1){
        while($row=mysqli_fetch_assoc($test)){
            if($row['status']==$status){
                $sqli = "UPDATE `harryee` SET `status` = 'Yes' WHERE `email` ='$Email'";
                if(mysqli_query($conn,$sqli)){
                    echo "welcome to the event";
                }
                    
            }
            else{
                echo "Sorry qr code is already used";
            }        
        }
                        
    }
    else{
        echo "invalid qrcode";
    }
                            
}
?>