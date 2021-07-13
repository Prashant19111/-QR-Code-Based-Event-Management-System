<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'folder/_dbconnect.php';
        $name = $_POST["name"];
        $age=$_POST["age"];
        $Email = $_POST["mail"];
        $gender = $_POST["gender"];
        $number= $_POST["number"];
        $status = "No";
        $existSql="SELECT * FROM `harryee` WHERE email = '$Email' ";
        $result= mysqli_query($conn,$existSql);
        $numExistRows=mysqli_num_rows($result);
        session_start();
        if($numExistRows>0){
             $_SESSION['error']="Email already exists";
        } 
        else{
            $sql = "INSERT INTO `harryee` ( `name`,`age`, `email`, `phone`,`gender`,`status`) VALUES ('$name','$age','$Email','$number','$gender','$status')";
            $result=mysqli_query($conn,$sql);
            if(!$result){
                // $_SESSION['error']="submitted successfully";
                $_SESSION['error']="failed to submit";
            }
        }
    } 
?>