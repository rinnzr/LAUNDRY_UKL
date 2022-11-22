<?php
if($_POST){
    $id=$_POST['id_outlet'];
    $nama=$_POST['nama_outlet'];
    $alamat=$_POST['alamat'];
    $tlp=$_POST['telp'];
    $id_owner=$_POST['owner'];

    if(empty($nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='ubah_outlet.php';</script>";
    } elseif(empty($alamat)){
        echo "<script>alert('alamat tidak boleh kosong');location.href='ubah_outlet.php';</script>";
    } else {
        include "../../koneksi.php";  
        $update=mysqli_query($conn,"update outlet set nama_outlet='".$nama."',alamat='".$alamat."',telp='".$tlp."',id_owner='".$id_owner."' where id_outlet = '".$id."'")
             or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update outlet');location.href='tampil_outlet.php';</script>";
            } else {
                echo "<script>alert('Gagal update outlet');location.href='ubah_outlet.php?id=".$id."';</script>";
                
            }
        }
        
    } 
?>