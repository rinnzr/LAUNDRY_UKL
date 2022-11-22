<?php
if($_POST){
    $nama_user=$_POST['nama_user'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    $outlet=$_POST['outlet'];

    
        include "../../../koneksi.php";
        $insert=mysqli_query($conn,"insert into user (nama_user,username,password,role,id_outlet) value ('".$nama_user."','".$username."','".md5($password)."','".$role."','".$outlet."')");
        
        if($insert){
            echo "<script>alert('Sukses menambahkan user');location.href='tampil_kasir.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan user');location.href='tambah_kasir.php';</script>";
        }
    }
?>