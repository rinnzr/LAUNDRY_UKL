<?php   
    // include "../header.php";
    include "../../koneksi.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="../style1.css">
<style>
    .nota span{
        color:#243A73;
    }
    .penutup h5{
        color:#243A73;
    }
</style>
    </head> 
    <body>    
    
                        <?php 
                            $qry_transaksi=mysqli_query($conn,"select * from transaksi join member on transaksi.id_member = member.id_member join outlet ON outlet.id_outlet = transaksi.id_outlet where transaksi.id_transaksi = '".$_GET['id']."'");
                            $dt_transaksi=mysqli_fetch_array($qry_transaksi);

                            // $qry_histori = mysqli_query($conn, "select transaksi.*, member.nama_member, user.nama_user, outlet.nama_outlet from transaksi join user ON user.id_user = transaksi.id_user join member ON member.id_member = transaksi.id_member join outlet ON outlet.id_outlet = transaksi.id_outlet order by id_transaksi desc");

                            $qry_member = mysqli_query($conn,"select m.nama_member, m.alamat, m.jenis_kelamin, m.tlp from member m join transaksi t on m.id_member = t.id_member where t.id_transaksi='".$_GET['id']."'");
                            $no=0;
                            $dt_member=mysqli_fetch_array($qry_member)
                        ?>
                <center>
                    <div class="nota" style="list-style-type: none">
                        <h3>Selamat Datang di <span><b><?=$dt_transaksi['nama_outlet']?></b></span></h3>
                        <p><li><?=$dt_transaksi['alamat']?></li>
                            <li><?=$dt_transaksi['telp']?></li></p>

                        <!-- <h4 style="margin-left:5px;">Nama Member : <?=$dt_transaksi['nama_member']?></h4>
                        <h6 style="float:right;"><?=$dt_transaksi['tgl']?></h6>
                        -->
                     </div>
                </center>
    <tbody  style="text-align:center; ">
    <table class="table" >                    
                     <h6>
                    <tr>
                        <th>Nama Member </th>
                        <td><?=$dt_member['nama_member']?></td> 
                    </tr><br>
                    <tr>
                        <th>Alamat      </th>
                        <td><?=$dt_member['alamat']?></td> 
                    </tr><br>
                    <tr>
                        <th>Jenis Kelamin </th>
                        <td><?=$dt_member['jenis_kelamin']?></td> 
                    </tr><br>
                    <tr>
                        <th>Telepone</th>
                        <td><?=$dt_member['tlp']?></td> 
                    </tr><br>

                    <!-- Tanggal -->
                    <tr>
                        <th>Tanggal Transaksi </th>
                        <td><?=$dt_transaksi['tgl']?></td>
                    </tr><br>
                    <!-- <tr>
                        <th>Batas Waktu :</th>
                        <td><?=$dt_transaksi['batas_waktu']?></td>
                    </tr><br> -->
                    <tr>
                        <th>Tanggal Bayar </th>
                        <td><?=$dt_transaksi['tgl_bayar']?></td>
                    </tr><br>
                    <!-- <tr>
                        <th>Status </th>
                        <td><?=$dt_transaksi['status']?></td>
                    </tr><br> -->
                    <!-- <tr>
                        <th>Dibayar </th>
                        <td><?=$dt_transaksi['status_bayar']?></td>
                    </tr><br> -->
                    </h6    >   
                    </table>
            </tbody>
            <!-- <table class="table table-striped">
                <thead style="text-align:center;">
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <th>Batas Waktu</th>
                        <th>Tanggal Bayar</th>
                        <th>Status</th>
                        <th>Dibayar</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;">
                    <?php 
                    include "../../koneksi.php";
                    $qry_transaksi=mysqli_query($conn,"select * from transaksi join member on transaksi.id_member = member.id_member where transaksi.id_transaksi = '".$_GET['id']."'");
                    $no=0;
                    while($dt_histori=mysqli_fetch_array($qry_transaksi)){
                        $no++;
                        ?>
                        <tr>              
                            <td><?=$dt_histori['tgl']?></td>
                            <td><?=$dt_histori['batas_waktu']?></td>
                            <td><?=$dt_histori['tgl_bayar']?></td>
                            <td><?=$dt_histori['status']?></td>
                            <td><?=$dt_histori['status_bayar']?></td> 
                        </tr>
                        <?php 
                    }
                    ?>
                </tbody>
            </table> -->

                    
        <table class="table table-striped">
                <thead style="text-align:center;">           
                    <tr>
                        <!-- <th>Nama Member</th> -->
                        <th>Nama Paket</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;">
                    <?php 
                    $qry_detail=mysqli_query($conn,"select * from detail_transaksi join paket on detail_transaksi.id_paket = paket.id_paket where detail_transaksi.id_transaksi = '".$_GET['id']."'");
                   
                    $total = 0;
                    while($dt_detail=mysqli_fetch_array($qry_detail)){
                        ?>
                        <tr>  
                            <!-- <td><?=$dt_transaksi['nama_member']?></td> -->
                            <td><?=$dt_detail['jenis']?></td>
                            <td><?=$dt_detail['qty']?></td>
                            <td><?=$dt_detail['qty'] * $dt_detail['harga']?></td>
                            <?php
                                $total += $dt_detail['harga'] * $dt_detail['qty'];
                            ?> 
                             
                        </tr>
                        <?php 
                    }
                    ?>
                    <tr>
                        <td>Total Pembayaran</td> 
                        <td> <h6 style="float:right;"><?=$dt_transaksi['status_bayar']?></h6></td>
                        <td colspan="3"><?=$total?></td>
                    </tr>

                    
                </tbody>
                
                
            </table>
            <div class="penutup">
                        <h5><b>PERHATIAN : </b></h5>
                    <p>  
                        <ul>
                            <li>Pengambilan barang dibayar tunai</li>
                            <li>Kalau terjadi kehilangan/kerusakan kami hanya mengganti tidak lebih dari 2x ongkos cuciannya</li>
                            <li>Hak claim yang kami terima tidak lebih dari 24 jam dari pengambilan</li>
                            <b>KAMI TIDAK BERTANGGUNG JAWAB</b>
                            <li>Susut/ luntur karena sifat bahannya</li>
                            <li>Cucian yang tidak diambil dalam tempo 1 bulan hilang/rusak</li>
                        </ul>   
                    </p>
                    <h3 align="center" style="color:#08BCEC">Terimakasih telah mempercayai kami untuk melakukan laundry di toko kami</h3>
                    </div> 
          
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script>window.print()</script>
    </body>
</html>