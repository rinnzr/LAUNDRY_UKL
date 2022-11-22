<?php 
// session_start();
// include "../../koneksi.php";
// $cart=@$_SESSION['cart'];

// $alamat = $_POST['alamat'];
// $tlp = $_POST['tlp'];
// $date = $_POST['date'];
// $id_paket = $_POST['id_paket'];
// $berat = $_POST['berat'];

// if(count($cart) >0){
//     $status = 'baru';
//     $tgl_bayar=2; //satuanhari
//     $tgl_harus_bayar=date('Y-m-d',mktime(0,0,0,date('m'),(date('d')+$tgl_bayar),date('Y')));
//     $query = mysqli_query($conn, "INSERT INTO transaksi (id_transaksi, id_member, tgl, batas_waktu, tgl_bayar, status, dibayar, id_user) value ('".@$_SESSION['id_transaksi']."'  '".@$_SESSION['id_member']."','".date('y-m-d')."','".$tgl_harus_bayar."','".date('Y-m-d')."','baru','belum_dibayar','".$_SESSION['id_user']."')");
//     $id=mysqli_insert_id($conn);
//     foreach($cart as $key_produk => $val_produk){
//         mysqli_query($conn, "INSERT INTO detail_transaksi(id_transaksi,id_paket,qty) VALUE ('".$id."','".$val_produk['id_paket']."','".$val_produk['qty']."')");
//     }
//     unset($_SESSION['cart']); 
//         echo '<script>alert("Pembelian berhasil");location.href="histori_pembelian.php"</script>';
// }else{
//     // echo '<script>alert("Belum diisi semua");location.href="pesan.php"</script>';
// }
// 


    session_start();
    
    // print_r($_SESSION);
    include "../../koneksi.php";
    $cart=@$_SESSION['cart'];
    $id_user=@$_SESSION['id_user'];


    if(count($cart)>0){     
        $status='baru';
        $pembayaran='belum_dibayar';
        $lama_laundry=3; //satuan hari
        $tgl_selesai=date('Y-m-d',mktime(0,0,0,date('m'),(date('d')+$lama_laundry),date('Y')));
        
        
        foreach ($cart as $key_paket => $val_paket) {
            // print_r($val_paket);
            // echo "id_user" . $val_paket['id_user'];

            $query1 = mysqli_query($conn,"INSERT INTO transaksi (id_member,id_outlet,tgl,batas_waktu,status,status_bayar,id_user) value('".$val_paket['id_member']."','".$val_paket['id_outlet']."','".date('Y-m-d')."','".$tgl_selesai."','".$status."','".$pembayaran."','".$id_user."')");
            $id=mysqli_insert_id($conn);
            $subtotal=$val_paket['qty'] * $val_paket['harga'];
            $id=mysqli_insert_id($conn);
            
            $query2 = mysqli_query($conn,"insert into detail_transaksi (id_transaksi,id_paket,qty) value('".$id."','".$val_paket['id_paket']."','".$val_paket['qty']."')");
            $id=mysqli_insert_id($conn);   
        }
        unset($_SESSION['cart']);
        echo '<script>alert("Anda berhasil checkout");location.href="histori_pembelian.php"</script>';
    }

       
    
    ?>