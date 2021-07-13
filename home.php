<?php
$loginError=false;
$signupError=false;
$signupAlert=false;
session_start();
if(isset($_SESSION['loginerror'])){
     $loginError=$_SESSION['loginerror'];
}
if(isset($_SESSION['signupError'])){
     $signupError=$_SESSION['signupError'];
}
if(isset($_SESSION['signupAlert'])){
     $signupAlert=$_SESSION['signupAlert'];
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Project 1</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/project1">i-Kart</a>       
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/project1/welcome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/project1/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/project1/contact.php">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    
    
    if($loginError)
    {
        // echo "true";
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Error!</strong> '.$loginError.'
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
           session_unset();
    }
    
    if($signupAlert)
    {
        
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>success!</strong> Your account hasbeen created successfully.
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
           session_unset();
    }
    
    if($signupError)
    {
        
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Error!</strong> '.$signupError.'
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
           session_unset();
    }
    
    ?>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/p1.jfif" class="d-block w-100 mt-5" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <div class="mb-5 pb-5">
                        <h1>Welcome !</h1>
                    </div>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#loginModal">LogIn</button>
                        
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#signupModal">Signup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 ms-3">

        <h5>>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam reprehenderit recusandae tempore natus
            beatae quia.</h5>
        <h5>>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam reprehenderit recusandae tempore natus
            beatae quia.</h5>
        <h5>>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam reprehenderit recusandae tempore natus
            beatae quia.</h5>
        <h5>>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam reprehenderit recusandae tempore natus
            beatae quia.</h5>

    </div>
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/project1/login.php" method="post">
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">user name</label>
                        <input type="text" class="form-control" id="username" name="username"
                            aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">LogIn</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign up here</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/project1/signup.php" method="post">
                    
                        <div class="mb-3">
                            <label for="username" class="form-label">user name</label>
                            <input type="text" class="form-control" id="username" name="username"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword">
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>