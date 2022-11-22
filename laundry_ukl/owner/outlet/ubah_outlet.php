
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="../style3.css">
    <title></title>
</head>
<style>
    h3{
        color: #243A73;
    }
    h3 span{
        color:#0E75A6;
    }
    .btn{
        background:#7C3E66;
        color: white;
    }
</style>
<body>
<div class="container col-15">
    <div class="col-md- py-5">
        <?php 
        include "../../koneksi.php";
        $qry_get_outlet=mysqli_query($conn,"select * from outlet where id_outlet = '".$_GET['id_outlet']."'");
        $dt_outlet=mysqli_fetch_array($qry_get_outlet); 

        // $qry_owner = mysqli_query($conn, "SELECT *FROM user where role='owner'");
        // $owner=mysqli_fetch_array($qry_owner);

        ?>
        <h3 align="center">Ubah <span>Outlet</span></h3>
        <form action="proses_ubah_outlet.php" method="post">
            <input type="hidden" name="id_outlet" value= "<?=$dt_outlet['id_outlet']?>">
                Nama Outlet :
                <input type="text" name="nama_outlet" value="<?=$dt_outlet['nama_outlet']?>" class="form-control">
                Owner :
                <select name="owner" id="" value="<?=$owner['nama_user']?>"class="form-control">
                        <?php
                            $qry_owner = mysqli_query($conn, "SELECT *FROM user where role='owner'");
                            while($owner = mysqli_fetch_array($qry_owner)){
                            $id_owner = $owner['id_user'];
                            $nama_owner = $owner['nama_user'];

                        ?>
                            <option value="<?php echo $id_owner?>"><?php echo $nama_owner?></option>
                        <?php
                    }
                    ?>
                    </select>
                Alamat : 
                <input type="text" name="alamat" value="<?=$dt_outlet['alamat']?>" class="form-control">
                No Telp : 
                <input type="number" name="telp" value="<?=$dt_outlet['telp']?>" class="form-control"><br>
                <input type="submit" name="simpan" value="Ubah Outlet" class="btn ">
        </form>
    </div>
</div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
     crossorigin="anonymous"></script>
</body>
</html>
