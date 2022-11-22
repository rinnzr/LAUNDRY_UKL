<?php
include '../header.php';
$id_user = @$_SESSION['id_user'];
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../style1.css">
    <title></title>
</head>
<body>

<div class="container col-15">
    <div class="col-md- py-2">
        <h3 align="center">Tambah Transaksi</h3>
        <form action="proses_tambah_keranjang.php" method="post" >
            
        <div class="mb-3">
          <!-- <label for="id_user" class="form-label">Nama Petugas</label> -->
          <input type="hidden" name="id_user" class="form-control" value="<?= $id_user ?>">
          <?php
          include "../../koneksi.php";
          ?>

            <b>Nama Member :</b>
            <?php 
            include "../../koneksi.php";
            $qry_get_member=mysqli_query($conn,"select * from member where id_member = '".$_GET['id_member']."'");
            $dt_member=mysqli_fetch_array($qry_get_member);
            ?>
            <input type="hidden" name="id_member" value= "<?=$dt_member['id_member']?>" class="form-control" >
            <input type="text" name="nama_member" value= "<?=$dt_member['nama_member']?>" class="form-control">

            <b>Alamat :</b>
            <?php 
            include "../../koneksi.php";
            $qry_get_member=mysqli_query($conn,"select * from member where id_member = '".$_GET['id_member']."'");
            $dt_member=mysqli_fetch_array($qry_get_member);
            ?>
            <input type="text" name="alamat" value= "<?=$dt_member['alamat']?>" class="form-control">

            <b>Telepon :</b>
            <?php 
            include "../../koneksi.php";
            $qry_get_member=mysqli_query($conn,"select * from member where id_member = '".$_GET['id_member']."'");
            $dt_member=mysqli_fetch_array($qry_get_member);
            ?>
            <input type="text" name="tlp" value= "<?=$dt_member['tlp']?>" class="form-control">

            <b>Nama Outlet :</b>
            <select name="id_outlet" class="form-control">
            <option></option>
            <?php
            include "../../koneksi.php";
            $get_outlet = mysqli_query($conn, "SELECT * FROM outlet");
            while ($data_outlet = mysqli_fetch_array($get_outlet)) {
                echo "<option value='" . $data_outlet['id_outlet'] . "'>" . $data_outlet['nama_outlet'] . "</option>";
            }
            ?>
            </select>

            <b>Tanggal Order :</b>
            <input type="date" name="date" value="" class="form-control" required>

            <b>Nama Paket :</b>
            <select name="id_paket" class="form-control">
            <option></option>
            <?php
            include "../../koneksi.php";
            $get_paket = mysqli_query($conn, "SELECT * FROM paket");
            while ($data_paket = mysqli_fetch_array($get_paket)) {
                echo "<option value='" . $data_paket['id_paket'] . "'>" . $data_paket['jenis'] . "</option>";
            }
            ?>
            </select>

            <b>Berat Barang /Kg :</b>
            <input type="text" name="qty" value="" class="form-control" required>

            <!-- <legend class="col-form-label col-sm-2 pt-0"> <b>Status Bayar : </b></legend>
                <select name="status_bayar" class="form-control">
                <?php
                    $arr_dibayar = array('belum_dibayar' => 'Belum dibayar', 'dibayar' => 'Dibayar');
                    ?>
                        <option></option>
                        <?php foreach ($arr_dibayar as $key_dibayar => $val_dibayar) :
                        if ($key_dibayar == $dt_transaksi['dibayar']) {
                            $selek = "selected";
                        } else {
                            $selek = "";
                        }
                        ?>
                        <option value="<?= $key_dibayar ?>" <?= $selek ?>><?= $val_dibayar ?></option>
                        <?php endforeach ?>
                    </select>
                     -->
                

           <br>
            <input type="submit" name="simpan" value="KERANJANG" class="btn" style="background-color:#251B37;color:white">
        
        </form>
    </div>
</div>        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

