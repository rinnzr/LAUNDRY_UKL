<?php
include "../../koneksi.php";
$get_order = mysqli_query($conn, "select * from transaksi where id_transaksi = '" . $_GET['id_transaksi'] . "'");
$status = mysqli_fetch_array($get_order);
if ($status['status'] != NULL) {
    $update_status = mysqli_query($conn, "update transaksi set status ='" . $_GET['status'] . "' where id_transaksi = '" . $_GET['id_transaksi'] . "'");
    echo "<script>alert('Sukses mengupdate status Paket');location.href='histori_pembelian.php';</script>";
} else {
    echo "<script>alert('Gagal mengupdate status Paket');location.herf='/histori_pembelian.php';</script>";
}
