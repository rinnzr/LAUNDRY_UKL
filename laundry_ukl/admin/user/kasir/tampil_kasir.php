<?php
include "../../header.php"; 
?>
<head>
    <link rel="stylesheet" href="../../style1.css">
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
<div class="container rounded" >
    <div class="nama">
        <h3 align="center" style="margin:0px 0 35px">Kasir <b>LAUNDRY <span>LAB</span></b> </h3>
    </div>
    <form method="post" style="margin:30px 30px 10px" action="tampil_kasir.php" class="d-flex">
        <input class="form-control" type="search" name="cari" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type ="submit">Search</button>
    </form>
    <table class="table" style="background-color:#251B37;color:white">
        <thead style="background-color:#FFCACA;color:#251B37 ">
            <tr>
                <th>NO</th>
                <th>NAMA USER</th>
                <th>USERNAME</th>
                <th>OUTLET</th>
                <th>ROLE</th> <th></th> 
                <th>AKSI</th>
            </tr>
        </thead>
<div class="row">   
        <?php
            include "../../../koneksi.php";
            if(isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $qry_user=mysqli_query($conn, "SELECT u.id_user,u.nama_user, u.username, u.role, o.nama_outlet FROM user u JOIN outlet o ON u.id_outlet=o.id_outlet WHERE u.id_user = '$cari' or u.nama_user like '%$cari%'  or u.username like '%$cari% '");
            }
            else{   
                $qry_user = mysqli_query($conn, "SELECT u.id_user,u.nama_user, u.username, u.role, o.nama_outlet FROM user u JOIN outlet o ON u.id_outlet=o.id_outlet WHERE role='kasir'  ");

                // $qry_user = mysqli_query($conn, "select * from user where role='kasir'");
                
                // $qry_user = mysqli_query($conn, "select u.* ,o.nama_outlet from user u join outlet o  where id_outlet not null");
                
                // $qry_outlet = mysqli_query($conn, "SELECT o.id_outlet, o.nama_outlet, u.nama_user, o.alamat, o.telp FROM outlet o JOIN user u ON u.id_user=o.id_owner WHERE role='owner'");
            }
            $no = 0;
            while ($data_user = mysqli_fetch_array($qry_user)) {
                $no++; 
        ?>
        
            <tr>            
                <td><?=$no?>
                </td><td><?=$data_user['nama_user']?></td> 
                <td><?=$data_user['username']?></td>
                <td><?=$data_user['nama_outlet']?></td>
                <td><?=$data_user['role']?></td><th></th>
                <td><a href="ubah_kasir.php?id_user=<?=$data_user['id_user']?>" class="btn btn-success">Ubah<a>
                    |<a href="hapus_kasir.php?id_user=<?=$data_user['id_user']?>" 
                    onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                    </td>
            </tr>
        <?php
        }
        ?>
</div>
    </table>
    <div>
        <br>
        <a href="tambah_kasir.php" class="btn-tambah">Tambah Kasir</a>
    </div>
    </div>
<?php
include "../../../footer.php";
?>  
