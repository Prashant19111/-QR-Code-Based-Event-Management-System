<?php
    $showAlert = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'folder/_dbconnect.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $exists=false;
        $existSql="SELECT * FROM `users` WHERE username = '$username' ";
        $result= mysqli_query($conn,$existSql);
        $numExistRows=mysqli_num_rows($result);
        if($numExistRows>0){
             $showError="Username already exists";
             session_start();
             $_SESSION['signupError']=$showError;
            // header("location: home.php?signup=false&error=$showError");
            header("location: home.php");
            exit;
        } 
        else{
            //exists=false
            if(($password == $cpassword)){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if ($result){
                    $showAlert = "Your account hasbeen created successfully.";
                    session_start();
                    $_SESSION['signupAlert']=$showAlert;
                    // header("location: home.php?signup=true");
                    header("location: home.php");
                        exit;
                }
            }
            else{
                $showError = "Passwords do not match";
                session_start();
                $_SESSION['signupError']=$showError;
                // header("location: home.php?signup=false&error=$showError");
                header("location: home.php");
            }
        }
    }
    
    ?>