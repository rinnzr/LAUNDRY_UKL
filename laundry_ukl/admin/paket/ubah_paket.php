<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="../style1.css">
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
        $qry_get_paket=mysqli_query($conn,"select * from paket where id_paket = '".$_GET['id_paket']."'");
        $dt_paket=mysqli_fetch_array($qry_get_paket);
        ?>
        <h3 align="center">Ubah <span>Paket</span></h3>
        <form action="proses_ubah_paket.php" method="post">
            <input type="hidden" name="id_paket" value= "<?=$dt_paket['id_paket']?>">
                <b>Jenis :</b>
                <input type="text" name="jenis" value= "<?=$dt_paket['jenis']?>" class="form-control">
                <b>Harga : </b>
                <input type="int" name="harga" value="<?=$dt_paket['harga']?>" class="form-control"><br>
                <input type="submit" name="simpan" value="Ubah Paket" class="btn">
        </form>
    </div>
</div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
     crossorigin="anonymous"></script>
</body>
</html>
