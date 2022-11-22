<?php
    session_start();
    if($_POST){
        include "../../koneksi.php";
        echo $_POST['id_member'];
        echo $_POST['id_outlet'];
        $qty= $_POST['qty'];
        $harga= $dt_paket['harga'];
        $total = $harga * $qty;


        $qry_get_paket=mysqli_query($conn,"select * from paket where id_paket = '".$_POST['jenis']."'");
        $dt_paket=mysqli_fetch_array($qry_get_paket);
        // $qry_get_outlet=mysqli_query($conn,"select * from outlet where id_outlet = '".$_POST['nama_outlet']."'");
        // $dt_outlet=mysqli_fetch_array($qry_get_outlet);
        // $qry_get_transaksi=mysqli_query($conn,"select * from outlet where status_bayar = '".$_POST['status_bayar']."'");
        // $dt_transaksi=mysqli_fetch_array($qry_get_transaksi);


        $_SESSION['cart'][]=array(
            'id_user'=>$_SESSION['id_user'],
            'id_member'=>$_POST['id_member'],
            'nama_member'=>$_POST['nama_member'],
            // 'alamat'=>$_POST['alamat'],
            // 'tlp'=>$_POST['tlp'],
            'id_outlet'=>$_POST['id_outlet'],
            'id_paket'=>$dt_paket['id_paket'],
            'jenis'=>$dt_paket['jenis'],
            'harga'=>$dt_paket['harga'],
            'qty' => $_POST['qty'],
            // 'status_bayar'=>$dt_transaksi['status_bayar'],

        );
        $_SESSION['id_user']=$_POST['id_user'];
        header('location:keranjang.php');
    }

    

// session_start();
//     if($_POST){
//         include "../../koneksi.php";
//         $qry_get_paket=mysqli_query($konn,"select * from paket where id_paket='$_POST[jenis_paket]'");
//         $dt_paket=mysqli_fetch_array($qry_get_paket);
//         $qty= $_POST['qty'];
//         $harga= $dt_paket['harga'];
//         $total = $harga * $qty;
//         $_SESSION['cart'][]=array(
//             'id_pelanggan'=>$_POST['id'],
//             'nama_pelanggan'=>$_POST['nama'],
//             'id_paket'=>$dt_paket['id_pkt'],
//             'jenis'=>$dt_paket['jenis'],
//             'qty'=>$_POST['qty'],
//             'harga'=>$dt_paket['harga'],
//             'total'=>$total,


//         );
//         $_SESSION['id_pelanggan']=$_POST['id'];
//         header('location: keranjang.php');
//     }



?>