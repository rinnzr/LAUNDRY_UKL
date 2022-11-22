<?php
if($_POST){
    $id_user=$_POST['id_user'];
    $id_outlet=$_POST['outlet'];
    $nama=$_POST['nama_user'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];

        include "../../../koneksi.php";
        if(empty($password)){
            $update_user=mysqli_query($conn,"update user set nama_user='".$nama ."', username='".$username."', password='".md5($password)."', role='".$role."', id_outlet='".$id_outlet."' where id_user = '".$id_user."' ") or die(mysqli_error($conn));
            mysqli_error($conn);
            if($update_user){
                echo "<script>alert('Sukses update user');location.href='tampil_kasir.php';</script>";
            } else {
                echo "<script>alert('Gagal update user');location.href='ubah_kasir.php?id_user=".$id_user."';</script>";
            }
        } else {
            $update_user=mysqli_query($conn,"update user set nama_user='".$nama ."', username='".$username."', password='".md5($password)."', role='".$role."', id_outlet='".$id_outlet."' where id_user = '".$id_user."'") or die(mysqli_error($conn));
            if($update_user){
                echo "<script>alert('Sukses update user');location.href='tampil_kasir.php';</script>";
            } else {
                echo "<script>alert('Gagal update user');location.href='ubah_kasir.php?id_user=".$id_user."';</script>";
            }
        }
    }
    ?>