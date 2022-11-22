<?php 
    include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style3.css">
</head>
<style>
    .head {
        margin:25px 0 35px;
        font-size: 30px;
    }
    .head span{
        color:#7C3E66;
    }
    body{
        background:url("../background7.png");
        background-repeat: no-repeat;
        background-size: cover;
    }
    @media only screen and (max-width: 1000px){
    .pembungkus{
    display:inline;
  }}
  </style>
<body>
   <div class="container">
    <div class="head" align="center">
        <p>Selamat Datang <?=$_SESSION['nama_user']?> sebagai <span><b><?=$_SESSION['role']?></b></span></p>
        
    </div>

    <div class="pembungkus" style="margin-top:80px">
        <div class="foto" align="center">
            <img src="../laundry1.jpg" alt="foto"> 
        </div>
        <div class="content">
            <h1><b> Cleaning and Laundry</h1> 
            <h2><b>DELIVERED TO YOUR DOOR</b></h2>
            <h5>We are open 7 days per week 6am-10pm </h5>
            <br><a href="#" class="btn btn-lg" style="background:#243A73; color:white;margin-top:17px">Paket</a>
        </div>
    </div>
</div>
    
</div>  
</body>
</html> 
