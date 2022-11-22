<?php
if($_POST){
    $id_member=$_POST['id_member'];
    $nama=$_POST['nama_member'];
    $alamat=$_POST['alamat'];
    $jenis_kelamin=$_POST['jenis_kelamin'];
    $telp=$_POST['tlp'];

        include "../../koneksi.php";
        if(empty($password)){
            $update=mysqli_query($conn,"update member set nama_member='".$nama ."', alamat='".$alamat."', jenis_kelamin='".$jenis_kelamin."', tlp='".$telp."' where id_member = '".$id_member."' ") or die(mysqli_error($conn));
            mysqli_error($conn);
            if($update){
                echo "<script>alert('Sukses update member');location.href='tampil_member.php';</script>";
            } else {
                echo "<script>alert('Gagal update member');location.href='ubah_member.php?id_member=".$id_member."';</script>";
            }
        } else {
            $update=mysqli_query($conn,"update member set nama_member='".$nama ."', alamat='".$alamat."', jenis_kelamin='".$jenis_kelamin."', tlp='".$telp."' where id_member = '".$id_member."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update member');location.href='tampil_member.php';</script>";
            } else {
                echo "<script>alert('Gagal update member');location.href='ubah_member.php?id_member=".$id_member."';</script>";
            }
        }
    }
    ?>