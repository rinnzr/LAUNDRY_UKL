<?php 
session_start();
    if($_SESSION['status_login']!=true){
        header('location: ../login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css">
    <title></title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        *{
            font-family: 'Poppins';
        }
    .nav-item:hover{
        text-decoration: underline #B900B1;
    }
    .navbar-brand span{
        font-weight:bold;
        color:#08BCEC;
    }
    .nav-link {
        color:#243A73;
    }
    .navbar-brand{
      font-size:25px;
    }
    .navbar-nav .nama{
      font-size:20px;
    }
</style>
<body style="background-color:#F2EBE9">
    <nav class="navbar navbar-expand-lg navbar-light " style="color:#243A73;">
      <div class="container-fluid" >
        <a class="navbar-brand" style="color:#243A73; margin-left:20px" href="#"><b>LAUNDRY </b><span>LAB</span> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" >
              <li class="nav-item" style="margin-left:440px">
                <a class="nav-link active" aria-current="page"style="color:#243A73; font-size:16px" href="/laundry_ukl/owner/home_owner.php">Home</i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" style="color:#243A73; font-size:16px; margin-left:10px"  href="/laundry_ukl/owner/outlet/tampil_outlet.php">Outlet</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" aria-current="page" style="color:#243A73;font-size:16px; margin-left:10px"  href="/laundry_ukl//owner/member/histori_owner.php">Histori</i></a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" aria-current="page" style="color:#243A73;font-size:16px;margin-left:10px"  href="/laundry_ukl/logout.php">Logout</i></a>
              </li>
              <li class="nama" style="margin-left:540px; border-radius:10px;">
                <a class="nav-link" aria-current="page" style="color:#7C3E66; font-weight:700; font-size:23px" href="#">OWNER</a>
              </li>
            </ul>
          </div>
      </div>
    </nav>
    <script src="https://kit.fontawesome.com/9c74db1b34.js" crossorigin="anonymous"></script>

