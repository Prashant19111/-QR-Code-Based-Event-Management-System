<?php
session_start();
session_unset();
session_destroy();

header("location: /project1/home.php");
exit;
?>