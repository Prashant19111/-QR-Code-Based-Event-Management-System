<?php
include 'folder/_dbconnect.php';
$sql="Select * from harryee ";
$test= mysqli_query($conn,$sql);
$nums=mysqli_num_rows($test);

?>
<?php
$msg=false;
$msgError=false;
session_start();
if(isset($_SESSION['msg'])){
     $msg=$_SESSION['msg'];
}
if(isset($_SESSION['msgerror'])){
     $msgError=$_SESSION['msgerror'];
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
<style>
/* #btn {  
    position: fixed;  
    bottom: 10px;  
    z-index: 100;  
} */
</style>

<body>
    <!-- <nav class="navbar navbar-light" style="background-color: #e3f2fd;"> -->

    <!-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;"> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                        <a class="nav-link" aria-current="page" href="/project1/welcome.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/project1/generate_qr.php">Generate Qr</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/project1/attendees.php">Attendees</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/project1/qr_scanner.php">Qr scanner</a>
                    </li>
                </ul>
                <li>
                    <button id="btn" type="button" class="btn btn-success">Download list</button>
                </li>
                <li>
                    <a class="btn btn-outline-success" href="/project1/logout.php" role="button">Logout</a>
                </li>

                </ul>
            </div>
        </div>
    </nav>
    <?php
    if($msg)
    {
        // echo "true";
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Success!</strong> '.$msg.'
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
           $_SESSION['msg']=false;
    }
    if($msgError)
    {
        // echo "true";
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Success!</strong> '.$msgError.'
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
           $_SESSION['msgerror']=false;
    }
    ?>
    <!-- </nav> -->
    <div class="container" style="padding:20px 0;">
    <table class="table table-bordered table-striped mt-4" id="participanttable">
    
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Email</th>
                <th scope="col">Phone no.</th>
                <th scope="col">Gender</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="2">Operation</th>
            </tr>
        </thead>
    <tbody>
    <?php
    $sno='1';
    while($res=mysqli_fetch_array($test)){
        // <th scope="row">'.$res['sno.'].'</th>
        echo'<tr>
        <th scope="row">'.$sno++.'</th>
        <td>'.$res['name'].'</td>
        <td>'.$res['age'].'</td>
        <td>'.$res['email'].'</td>
        <td>'.$res['phone'].'</td>
        <td>'.$res['gender'].'</td>
        <td>'.$res['status'].'</td>
        <td><a href="delete.php?id='.$res['sno.'].'"><i>Delete</i></a></td>
        <td><a href="send.php?email='.$res['email'].'"><i>Send QR Code</i></a></td>
        
        </tr>';
        
    }
    ?>
    <i></i>
    </tbody>
    </table>
    <!-- <button id="btn" type="button" class="btn btn-success">Download list</button> -->
    </div>
    
    
        <script src= "//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"> </script> 
        <script src= "//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"> </script>
        <script>
        $('#btn').click(function(){
            $('.table').table2excel({
                name: "mylist",
                filename: "participants"
            });
        });
    </script>
        
</body>

</html>