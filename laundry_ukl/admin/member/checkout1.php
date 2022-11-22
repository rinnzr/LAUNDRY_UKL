<?php 
// session_start();
// include "../koneksi.php";
// $cart=@$_SESSION['cart'];
// $id_member = $_POST['id_member'];
// if(count($cart)>0 and $id_member != NULL){
//     $tgl_bayar=2; //satuanhari
//     $tgl_harus_bayar=date('Y-m-d',mktime(0,0,0,date('m'),(date('d')+$tgl_bayar),date('Y')));
//     mysqli_query($conn, "insert into transaksi(id_member, tgl, batas_waktu, tgl_bayar, status_order, status_bayar, id_user) value ('".$id_member."','".date('Y-m-d')."','".$tgl_harus_bayar."','".date('Y-m-d')."','baru','belum_dibayar','".$_SESSION['id_user']."')");
//     $id=mysqli_insert_id($conn);
//     foreach($cart as $key_produk => $val_produk){
//         mysqli_query($conn, "insert into detail_transaksi(id_transaksi,id_paket,qty) value ('".$id."','".$val_produk['id_paket']."','".$val_produk['qty']."')");
//     }
//     unset($_SESSION['cart']);
// echo '<script>alert("Pembelian berhasil");location.href="histori_pembelian.php"</script>';
// }else{
    // echo '<script>alert("Belum diisi semua");location.href="pesan.php"</script>';
// }


// include "../../koneksi.php";
//     include "../../koneksi.php";
//     $tgl = date('d-m-y');
//     $lama_hari = '3';
//     $batas_waktu=date('d-m-y',mktime(0,0,0,date('m'),(date('d')+$lama_hari),date('Y')));
//     $cart=@$_SESSION['cart'];
//     $id_member=@$_SESSION['cart'][0]['id_member'];
//     $id_user=$_SESSION['id_user'];
//     $id_outlet=$_SESSION['id_outlet']; 
//     // echo $id_member;
//     if(($cart)!=null){
//         mysqli_query($conn,"insert into transaksi (id_member,id_outlet,tgl,batas_waktu,id_user) value ('$id_member','$id_outlet','$tgl','$batas_waktu','$id_user')")  or die (mysqli_error($konn));
//          $id=mysqli_insert_id($conn);
//         foreach ($cart as $key_produk => $val_produk) {
//             mysqli_query($conn,"insert into detail_transaksi(id_transaksi,id_paket,qty) value('".$id."','".$val_produk['id_paket']."','".$val_produk['qty']."')") or die (mysqli_error($konn));
//         }
//         unset($_SESSION['cart']);
//         header('location: histori_pembelian.php');
//     }


// session_start();
// include "../../koneksi.php";
// $cart=@$_SESSION['cart'];
// $id_member = @$_SESSION['id_user'];
// echo $_SESSION['cart'][0]; 

// if(count($cart)>0 and $id_member != NULL){
//     $tgl_bayar=2; //satuanhari
//     $tgl_harus_bayar=date('Y-m-d',mktime(0,0,0,date('m'),(date('d')+$tgl_bayar),date('Y')));
//     mysqli_query($conn, "insert into transaksi(id_member,id_outlet, tgl, batas_waktu, tgl_bayar, status, status_bayar, id_user) value ('".$id_member."','".$_SESSION['id_outlet']."','".date('Y-m-d')."','".$tgl_harus_bayar."','".date('Y-m-d')."','baru','belum_dibayar','".$_SESSION['id_user']."')");
    
  
//     $id=mysqli_insert_id($conn);
//     foreach($cart as $key_produk => $val_produk){
//         mysqli_query($conn, "insert into detail_transaksi(id_transaksi,id_paket,qty) value ('".$id."','".$val_produk['id_paket']."','".$val_produk['qty']."')");
//     }
//     // unset($_SESSION['cart']);
// // echo '<script>alert("Pembelian berhasil");location.href="histori_pembelian.php"</script>';
// mysqli_error($conn); 
// }else{
//     // echo '<script>alert("Belum diisi semua");location.href="pesan.php"</script>';
// }


session_start();
include "../../koneksi.php";
    $tgl = date('d-m-y');
    $lama_hari = '3';
    $batas_waktu=date('d-m-y',mktime(0,0,0,date('m'),(date('d')+$lama_hari),date('Y')));
    $cart=@$_SESSION['cart'];
    $id_member=@$_SESSION['id_member'];
    $id_user=$_SESSION['id_user'];
    $status='baru';
    $pembayaran='belum_dibayar';
    // echo $id_member;
    echo json_encode($cart);
    if(($cart)!=null){
        foreach ($cart as $key_produk => $val_produk) {
            $id_outlet=$val_produk['id_outlet'];
            $id_member=@$val_produk['id_member'];
        }
        mysqli_query($conn,"insert into transaksi (id_member,id_outlet, tgl,batas_waktu,status,status_bayar,id_user) value ('$id_member','".$id_outlet."','$tgl','$batas_waktu','".$status."','".$pembayaran."','$id_user')")  or die (mysqli_error($conn));
         $id=mysqli_insert_id($conn);
        foreach ($cart as $key_produk => $val_produk) {
            mysqli_query($conn,"insert into detail_transaksi(id_transaksi,id_paket,qty) value('".$id."','".$val_produk['id_paket']."','".$val_produk['qty']."')") or die (mysqli_error($conn));
        }
        unset($_SESSION['cart']);
        header('location: histori_pembelian.php');
    }
?>

