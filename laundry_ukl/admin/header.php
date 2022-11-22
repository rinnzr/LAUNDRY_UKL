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
    <link rel="stylesheet" href="style1.css">
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

    .container-fluid{
      display:hidden;
    }
    .navbar-brand span{
        font-weight:bold;
        color:#08BCEC;
    }
    .nav-link {
        color:#243A73;
        display:hidden;
    }
    .navbar-brand{
      font-size:25px;
    }
    .navbar-nav .nama{
      font-size:20px;
    }
    /* .nav-item:hover{
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
    } */
    /* .container-fluid{
      display: flex;
      justify-content: space-around;
    }
    @media only screen and (max-width: 1200px) {
        .navbar-nav{
            display:none;
        }
    } */
    /* @media only screen and (max-width: 2000px) {
        .navbar-nav{
            display:none;
        }} */

    ul{
      list-style-type: none;
    } 
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light " style="color:#243A73;">
      <div class="container-fluid" >
        <a class="navbar-brand" style="color:#243A73;" href="#"><b>LAUNDRY </b><span>LAB</span> </a>
          <div class="menubar" id="navbarNav" style="margin-right:45px ;">
            <ul class="navbar-nav">
              <li class="nav-item" >
                <a class="nav-link active" aria-current="page"style="color:#243A73; font-size:16px" href="/laundry_ukl/admin/home.php">Home</i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" style="color:#243A73; font-size:16px; " href="/laundry_ukl/admin/paket/paket.php">Paket</a>
              </li><li class="nav-item">
                <a class="nav-link" aria-current="page" style="color:#243A73; font-size:16px;" href="/laundry_ukl/admin/outlet/tampil_outlet.php">Outlet</i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" style="color:#243A73;font-size:16px; "  href="/laundry_ukl/admin/user/tampil_user.php">User</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" aria-current="page" style="color:#243A73;font-size:16px; "  href="/laundry_ukl/admin/user/kasir/tampil_kasir.php">Kasir</a> -->
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" style="color:#243A73; font-size:16px; "  href="/laundry_ukl/admin/member/tampil_member.php">Member</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" style="color:#243A73;font-size:16px; "  href="/laundry_ukl/admin/member/histori_pembelian.php">Histori</i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" style="color:#243A73;font-size:16px;"  href="/laundry_ukl/logout.php">Logout</i></a>
              </li> </ul>
              </div><ul>
              <li class="nama" style=" border-radius:10px;">
                <a class="nav-link" aria-current="page" style="color:#7C3E66; font-weight:700; font-size:23px" href="#">ADMIN</a>
              </li></ul>
           
          
      </div>
    </nav>
    <script src="https://kit.fontawesome.com/9c74db1b34.js" crossorigin="anonymous"></script>