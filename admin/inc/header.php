<?php
    session_start();
    require_once("config.php");

    if($_SESSION['key'] != "Adminkey")
    {
        echo "<script> location.assign('logout.php'); </script>";
        die;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminpanel - Online Candidate Registration </title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    
    <div class="container-fluid">
        <div class="row bg-black text-white">
            <div class="col-1">

            <img src="../assets/images/logo.png" width="80px" />



            </div>
            <div class="col-11">
                <h3> ONLINE CANDIDATE SYSTEM - <small> Welcome <?php echo $_SESSION['username']; ?></small> </h3>
            </div>
        </div>
    </div>