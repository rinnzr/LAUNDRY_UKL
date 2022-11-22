<?php
include "../header.php"; 
?>
<head>
    <link rel="stylesheet" href="../style1.css">
</head>
<style>
.btn-tambah{
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
</style>
<div class="container rounded">
    <div class="nama">
        <h3 align="center" style="margin:0px 0 35px">Outlet <b>LAUNDRY <span>LAB</span></b> </h3>
    </div>    
    <form method="post" style="margin:30px 30px 10px" action="tampil_outlet.php" class="d-flex">
        <input class="form-control" type="search" name="cari" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type ="submit">Search</button>
    </form>
    <table class="table" style="background-color:#251B37;color:white">
        <thead style="background-color:#FFCACA;color:#251B37 ">
            <tr>
                <th>NO</th>
                <th>NAMA OUTLET</th>
                <th>PEMILIK</th>
                <th >ALAMAT</th>
                <th>TELEPONE</th><th></th>
                <th>AKSI</th>
            </tr>
        </thead>
<div class="row">   
        <?php
            include "../../koneksi.php";
            if(isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $qry_outlet=mysqli_query($conn, "SELECT o.id_outlet, o.nama_outlet, u.nama_user, o.alamat, o.telp FROM outlet o JOIN user u ON u.id_user=o.id_owner where o.id_outlet = '$cari' or o.nama_outlet like '%$cari%' or u.nama_user like '%$cari%' or o.alamat like '%$cari%' or o.telp like '%$cari%' ");
            }
            else{
                // $qry_outlet = mysqli_query($conn, "SELECT o.id_outlet, o.nama_outlet, u.nama_user, o.alamat, o.telp FROM outlet o JOIN user u ON o.id_outlet=u.id_outlet WHERE role='owner'");
                $qry_outlet = mysqli_query($conn, "SELECT o.id_outlet, o.nama_outlet, u.nama_user, o.alamat, o.telp FROM outlet o JOIN user u ON u.id_user=o.id_owner WHERE role='owner'");
                // $qry_owner = mysqli_query($conn, "select * from user ");

            }
            $no = 0;
            // while($owner = mysqli_fetch_array($qry_owner)){
            //     $id_owner = $owner['id_outlet'];
            //     $nama_owner = $owner['nama_user'];
            while ($dt_outlet = mysqli_fetch_array($qry_outlet)) {
                // while ($dt_user = mysqli_fetch_array($qry_user)) {
                
                
                    $no++; 

        ?>
        
            <tr>            
                <td><?=$no?></td>
                <td><?=$dt_outlet['nama_outlet']?></td>
                <td><?=$dt_outlet['nama_user']?></td> 
                <td><?=$dt_outlet['alamat']?></td>
                <td><?=$dt_outlet['telp']?></td><th></th>
                <td><a href="ubah_outlet.php?id_outlet=<?=$dt_outlet['id_outlet']?>" class="btn btn-success">Ubah<a> 
                    <a href="hapus_outlet.php?id_outlet=<?=$dt_outlet['id_outlet']?>" 
                    onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
            </tr>
        <?php
        }
    // }
        ?>
</div>
    </table>
    <div>
        <br>
        <a href="tambah_outlet.php" class="btn-tambah ">Tambah Outlet</a>
    </div>
    </div>
<?php
include "../../footer.php";
?>  