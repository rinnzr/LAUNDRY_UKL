<?php
include "../header.php"; 
$tgl=date('d-m-y');
?>
<head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../style1.css">
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
th{
    text-align:start;
}

</style>
<body>
   <div class="container col-11">

        <div class="col-md ">
        <div class="nama">
        <h3 align="center" >Member <b>LAUNDRY <span>LAB</span></b> </h3>
        </div>
            <div class="mb-2">

        <form method="post" action="tampil_member.php" class="form-inline py-3" style="float: right">
            <input name="cari" class="form-control mr-sm-2" type="search" placeholder="Cari pelanggan" aria-label="Search" 
            <button class="btn btn-outline-success" type ="submit">Search</button>
        </form>

    
        </div>
        <?php
      include "../../koneksi.php";
    if(isset($_POST['cari'])){
      $cari = $_POST['cari'];
      $qry_member = mysqli_query($conn,"select * from member where nama_member = '$cari'");
    }else{
        $qry_member = mysqli_query($conn,"select * from member");
    }
    $row = mysqli_num_rows($qry_member);
    if ($row < 1){
      ?>
     

      <?php
    }else{
        ?>
        <table class="table table-hover">
    <thead style="background-color:#251B37;color:white">
    <tr>

        <th>NO</th>
        <th>NAMA </th>
        <th>ALAMAT</th> 
        <th>JENIS KELAMIN</th>
        <th>TLP</th>
        <th>AKSI</th>
        <th>TRANSAKSI</th>
       
</tr>
    </thead>
    <tbody>
        <?php
        $no=0;
        while($data_member = mysqli_fetch_array($qry_member)){
        $no++;?>
        <tr><td><?=$no?> </td>
        <td> <?=$data_member['nama_member']?> </td>
        <td> <?=$data_member['alamat']?> </td>
        <td> <?=$data_member['jenis_kelamin']?> </td>
        <td> <?=$data_member['tlp']?> </td>
       
        <td>
            <a href="ubah_member.php?id_member=<?=$data_member['id_member']?>" class="btn btn-success">Ubah<a>
            <a href="hapus_member.php?id_member=<?=$data_member['id_member']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
        </td>
        <td>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#transaksi<?php echo $data_member['id_member']?>">
            Buat Transaksi Baru
            </button>   
        </td>
        </tr>


            <!-- Modal Transaski -->
            <div class="modal fade" id="transaksi<?php echo $data_member['id_member']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transaksi Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="proses_tambah_keranjang.php" method="post">
                <div class="modal-body">
                    
                        <?php
                        include "../../koneksi.php";
                        ?>
                            <?php
                            $id_member = $data_member['id_member'];
                            $sql = mysqli_query($conn,"select * from member where id_member='$id_member' ");
                            $member = mysqli_fetch_array($sql);

                            ?>
                                    <?php
                            $jenis = mysqli_query($conn,"select * from paket ");
                            ?>

                    <label for="">Member</label>
                    <input type="hidden" name="id_member"  value="<?php echo $member['id_member']?>">
                    <input type="text" name="nama_member" value="<?php echo $member['nama_member']?>" id="" class="form-control" readonly>

                    <label for="">Alamat</label>
                    <input type="text" name="alamat" value="<?php echo $member['alamat']?>" id="" class="form-control" readonly>

                    <label for="">No telp</label>
                    <input type="text" name="tlp" value="<?php echo $member['tlp']?>" id="" class="form-control" readonly>

                    <label for="">Tanggal Beli</label>
                    
                    <input type="text" name="tgl" value="<?php echo $tgl?>" id="" class="form-control" readonly>
                    <input type="hidden" name="id_user"  value="<?php echo $_SESSION['id_user']?>">

                    <label for="">Outlet</label>
                    <select name="id_outlet" class="form-control">
                    <option></option>
                    <?php
                    include "../../koneksi.php";
                    $get_outlet = mysqli_query($conn, "SELECT * FROM outlet");
                    while ($data_outlet = mysqli_fetch_array($get_outlet)) {
                        echo "<option value='" . $data_outlet['id_outlet'] . "'>" . $data_outlet['nama_outlet'] . "</option>";
                    }
                    ?>
                    </select>

                   

                    <label for="">Jenis Paket</label>
                    <br>
                    <select name="jenis" id="" class="form-control">
                    <option value="">Pilih paket</option>
                        <?php
                            while($paket = mysqli_fetch_array($jenis)){
                            $id = $paket['id_paket'];
                            $JenisPaket = $paket['jenis'];

                        ?>
                            <option value="<?php echo $id?>"><?php echo $JenisPaket?></option>
                        <?php
                    }
                    ?>

                    </select>

                        <div class="row mx-1">
                            <label for="">Banyak</label>
                            <input type="number" name="qty" class="form-control col-3" value="1">
                           
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Masukkan Keranjang</button>
                    
                </div>
                </form>
                <?php
                    }
                }
                ?>
                                </div>
            </tbody>
        </table>
</head>
    <div>
        <br>
        <a href="tambah_member.php" class="btn-tambah">Tambah Member</a>
    </div>
    </div>
    </body>



    