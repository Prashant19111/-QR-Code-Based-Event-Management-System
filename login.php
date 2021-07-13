<?php 
    $login=false;
    $Error=false;

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        include 'folder/_dbconnect.php';
        $username=$_POST["username"];
        $password=$_POST["password"];

        // $sql="Select * from users where username = '$username' AND password='$password' ";
        $sql="Select * from users where username = '$username' ";
        $test= mysqli_query($conn,$sql);
        $num=mysqli_num_rows($test);
        if($num==1){
            while($row=mysqli_fetch_assoc($test)){
                if(password_verify($password,$row['password'])){
                    $login=true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    header("location: welcome.php");
                }
                else{
                    session_start();
                    $Error="Invalid credentials";
                    $_SESSION['loginerror']=$Error;
                    // header("location: home.php?loginsuccess=false&error=$Error");
                    header("location: home.php");
                    exit;
                }        
            }
            
        }
        else{
            session_start();
            $Error="invalid credentials";
            // header("location: home.php?loginsuccess=false&error=$Error");
            $_SESSION['loginerror']=$Error;
            header("location: home.php");
        }
        
    }

?>