
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
#preview{
   width:500px;
   height: 330px;
   margin:10px 450px;
}
.button{
    margin:0px 550px;
}
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
                        <a class="nav-link" href="/project1/attendees.php">Attendees</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="/project1/qr_scanner.php">Qr scanner</a>
                    </li>
                    </ul>
                    <li>
                        <a class="btn btn-outline-success" href="/project1/logout.php" role="button">Logout</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <video id="preview"></video>
<!-- </nav> -->
<div class="btn-group btn-group-toggle mb-5 button" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
  </label>
  <p id="test"></p>
</div>
    
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script type="text/javascript">
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){
        
         $.post("result.php",{
                mail: content
         },function(data){
            // $("#test").html(data);
            alert(data);
         });
            // window.location.href="result.php";
        
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });
</script>

</body>

</html>