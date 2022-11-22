<?php
include '../../koneksi.php';
include '../header.php';
$id_user = @$_SESSION['id_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style1.css">
    <title>Document</title>
</head>
<body>
<div class="container rounded" style="margin-top:15px">
    <h2 align="center">Keranjang Pembelian</h2>
        <form action="histori_pembelian.php?id_paket=<?= $dt_paket['id_paket'] ?>" method="post">
            <table class="table table-secondary table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Member</th>
                            <th>Outlet</th>
                            <th>Paket</th>
                            <th>Harga</th>
                            <th>Berat/Kg</th>
                            <th>Total</th>
                            <!-- <th>Status</th> -->
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        if (isset ($_SESSION ['cart'])){
                            $no=0;
                            include "../../koneksi.php";
            
                        foreach ($_SESSION['cart'] as $index => $value) {
                            // echo  $value['id_outlet'];
                            $qry_get_outlet=mysqli_query($conn,"select * from outlet where id_outlet = '".$value['id_outlet']."'");
                            $dt_outlet=mysqli_fetch_array($qry_get_outlet);
                            $subtotal = $value['qty'] * $value['harga'];
                            $total += $subtotal;
                            $no++;
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?= $value['nama_member']?></td>
                                <td><?= $dt_outlet['nama_outlet']?></td>
                                <td><?= $value['jenis'] ?></td>
                                <td><?= $value['harga'] ?></td>
                                <td><?= $value['qty'] ?></td>
                                <td><?= $subtotal ?></td>
                                <!-- <td><?= $value['status_bayar'] ?></td> -->
                                <td><a href="hapus_keranjang.php?id=<?= $index ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger"><strong>Hapus</strong></a></td>
                            </tr>
                        <?php
                        }
                        }
                        ?>

                        <tr>
                            <td colspan="5">Total</td>
                            <td></td>
                            <td><?= $total ?></td>
                            <td colspan="3">
                        </tr>

                    </tbody>
                </table>
                <!-- <legend class="col-form-label col-sm-2 pt-0"> Dibayar : </legend>
                <select name="status_bayar" class="form-control">
                <?php
                    $arr_dibayar = array('belum_dibayar' => 'Belum dibayar', 'dibayar' => 'Dibayar');
                    ?>
                        <option></option>
                        <?php foreach ($arr_dibayar as $key_dibayar => $val_dibayar) :
                        if ($key_dibayar == $dt_transaksi['status_bayar']) {
                            $selek = "selected";
                        } else {
                            $selek = "";
                        }
                        ?>
                        <option value="<?= $key_dibayar ?>" <?= $selek ?>><?= $val_dibayar ?></option>
                        <?php endforeach ?>
                    </select> -->
                </form><br>
                <form action="checkout1.php" method="post">
                    <input type="submit" name="checkout" value="Check Out" class="btn " style="background-color:#733773; color:white;" />
                </form><br>
                <!-- <form action="tampil_member.php" method="post">
                    <input type="submit" name="checkout" value="Tambah" class="btn " style="background-color:#733773; color:white;" />
                </form><br>
                 -->
                   


        </div>
    </div>
    
</body>
</html>