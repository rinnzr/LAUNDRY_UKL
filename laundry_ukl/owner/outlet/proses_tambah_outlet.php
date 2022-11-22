<?php
if($_POST){
    $nama=$_POST['nama_outlet'];
    $id_owner=$_POST['owner'];
    $alamat=$_POST['alamat'];
    $tlp=$_POST['telp'];
    if (empty($nama)){
        echo "<script>alert('nama outlet tidak boleh kosong');location.href='tambah_outlet.php';</script>";
    } else {
        include "../../koneksi.php";
        $insert=mysqli_query($conn,"insert into outlet (nama_outlet, alamat, telp,id_owner) value('".$nama."','".$alamat."','".$tlp."','".$id_owner."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan outlet');location.href='tampil_outlet.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan outlet');location.href='tambah_outlet.php';</script>";
        }
    }
}
?>
