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
<div class="container rounded" >
    <div class="nama">
        <h3 align="center" style="margin:0px 0 35px">User <b>LAUNDRY <span>LAB</span></b> </h3>
    </div>
    <form method="post" style="margin:30px 30px 10px" action="tampil_user.php" class="d-flex">
        <input class="form-control" type="search" name="cari" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type ="submit">Search</button>
    </form>
    <table class="table" style="background-color:#251B37;color:white">
        <thead style="background-color:#FFCACA;color:#251B37 ">
            <tr>
                <th>NO</th>
                <th>NAMA USER</th>
                <th>USERNAME</th>
                <!-- <th>OUTLET</th> -->
                <th>ROLE</th> <th></th> 
                <th>AKSI</th>
            </tr>
        </thead>
<div class="row">   
        <?php
            include "../../koneksi.php";
            if(isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $qry_user=mysqli_query($conn, "select * from user where id_user = '$cari' or nama_user like '%$cari%'  or username like '%$cari% '");
            }
            else{   
                // $qry_user = mysqli_query($conn, "SELECT u.nama_user, u.username, u.role, u.id_outlet, o.nama_outlet FROM user u JOIN outlet o ON u.id_user=o.id_outlet WHERE 'u.id_user'  ");

                $qry_user = mysqli_query($conn, "select * from user");
                
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
                <!-- <td><?=$data_user['id_outlet']?></td> -->
                <td><?=$data_user['role']?></td><th></th>
                <td>
                    <a href="ubah_user.php?id_user=<?=$data_user['id_user']?>" class="btn btn-success">Ubah<a>
                    |<a href="hapus_user.php?id_user=<?=$data_user['id_user']?>" 
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
        <a href="tambah_user.php" class="btn-tambah">Tambah User</a>
        <a href="./kasir/tampil_kasir.php" class="btn-tambah">KASIR<a> 
    </div>
    </div>
<?php
include "../../footer.php";
?>  
