
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="css/style.css"> -->
<link rel="stylesheet" href="formstyle.css">
<!-- <link rel="stylesheet" href="libs/style.css"> -->
<!-- <link rel="stylesheet" href="libs/css/bootstrap.min.css"> -->
<style>
    .qr-field{

        border-radius: 10px;
        width: 24em;
        height:26em;
        padding: .5em 2em 2em 2em;
        margin:-35em 8em 5em;
        float:right;
}
</style>
<body>
    <div class="formcontainer">
        <h1>Generate QR Code</h1>
        <form method="post" action="qr_code_handle.php">
            <div class="formform-group">
                <input type="text" name="name" placeholder="Enter your Name">
            </div>
            <div class="formform-group">
                <input type="text" name="age" placeholder="Enter your Age">
            </div>
            <div class="formform-group">
                <input type="text" name="gender" placeholder="Enter your Gender">
            </div>
            <div class="formform-group">
                <input type="email" name="mail" placeholder="Enter your Email Id">
            </div>
            <div class="formform-group">
                <input type="text" name="number" placeholder="Enter your Phone Number">
            </div>
            <div class="formform-group">
                <input type="submit" name="submit" class="button">
            </div>
            <!-- <button class="btn">Submit</button> -->
        </form>
    </div>
    <?php
			if(!isset($filename)){
				$filename = "download";
				$set = "True";
			}
			?>
			<div class="qr-field">
				<h2 style="text-align:center">QR Code Result: </h2>
				<center>
					<div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
							<?php echo '<img src="temp/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
                    </div>
                    <?php
                    if(!isset($set))
                      echo'<h2>QR code generated successfully</h2>';
                    //   session_unset();
                      
                    ?>
					<!-- <a class="btn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a> -->
				</center>
			</div>
        
</body>
</html>
<!-- CREATE TABLE `users09`.`harryee` ( `sno.` INT(20) NOT NULL AUTO_INCREMENT , `name` VARCHAR(30) NOT NULL , `email` VARCHAR(30) NOT NULL , `phone` INT(10) NOT NULL , `gender` TEXT NOT NULL , `status` TEXT NOT NULL , PRIMARY KEY (`sno.`)) ENGINE = InnoDB; -->
​
