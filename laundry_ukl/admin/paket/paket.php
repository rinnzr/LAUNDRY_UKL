<?php
include "../header.php"; 
?>
<head>
    <link rel="stylesheet" href="../style1.css">
</head>
<style>
.btn-paket{
    background-color:#733773; 
    color:white ; 
    padding:10px 40px; 
    border-radius:20px;
    text-decoration: none;
}
.nama b{
    color:#243A73;
}
.nama span{
    color:#08BCEC;
}
body{
        background:url("/LAUNDRY_UKL/background7.png");
        background-repeat: no-repeat;
  background-size: cover;}
.background{
    background-color: white;
}
</style>
<body>
<div class="container rounded" >
    <div class="nama">
        <h3 align="center" style="margin:0px 0 35px;">Paket <b>LAUNDRY <span>LAB</span></b> </h3>
    </div>
        <form method="post" style="margin:30px 30px 10px" action="paket.php" class="d-flex">
            <input class="form-control" type="search" name="cari" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type ="submit">Search</button>
        </form>
        <div class="background">
        <table class="table" style="background-color:#251B37;color:white">
            <thead style="background-color:#A5BECC ;color:#251B37 ">
                <tr>
                    <th>NO</th>
                    <th>JENIS PAKET</th>
                    <th>HARGA</th><th></th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <div class="row">   
                    <?php
                        include "../../koneksi.php";
                        if(isset($_POST['cari'])){
                            $cari = $_POST['cari'];
                            $qry_paket=mysqli_query($conn, "select * from paket where id_paket = '$cari' or jenis like '%$cari%' ");
                        }
                        else{
                            $qry_paket = mysqli_query($conn, "select * from paket");
                        }
                        $no = 0;
                        while ($dt_paket = mysqli_fetch_array($qry_paket)) {
                            $no++; 
                    ?>
                    
                        <tr>            
                            <td><?=$no?>
                            </td><td><?=$dt_paket['jenis']?></td> 
                            <td><?=$dt_paket['harga']?></td><th></th>
                            <td><a href="ubah_paket.php?id_paket=<?=$dt_paket['id_paket']?>" class="btn btn-success">Ubah<a>
                                |<a href="hapus_paket.php?id_paket=<?=$dt_paket['id_paket']?>" 
                                onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
                        </tr>
                    <?php
                    }
                    ?>
            </div>
        </table>
    </div>
    <div>
        <br>
        <a href="tambah_paket.php" class="btn-paket">Tambah Paket</a>
    </div>
</div>
</body>
<?php
include "../../footer.php";
?>  