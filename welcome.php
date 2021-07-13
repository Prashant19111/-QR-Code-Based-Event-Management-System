<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: home.php");
    exit;
}
else if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
    $username=$_SESSION['username'];
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
<!-- <nav class="navbar navbar-light" style="background-color: #e3f2fd;"> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;"> -->
    <!-- bg-dark -->
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
                        <a class="nav-link active" aria-current="page" href="/project1/welcome.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/project1/generate_qr.php">Generate Qr</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/project1/attendees.php">Attendees</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/project1/qr_scanner.php">Qr scanner</a>
                    </li>
                    </ul>
                    <li>
                        <a class="btn btn-outline-success" href="/project1/logout.php" role="button">Logout</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
<!-- </nav> -->
    
    

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src=" " class="d-block w-100 mt-6" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <div class="mb-5 pb-5">
                        <?php
                            echo'<h1>Welcome '.$username.'!</h1>';
                        ?>
                    </div>

                    
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