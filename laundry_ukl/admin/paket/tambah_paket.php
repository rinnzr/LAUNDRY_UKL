<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
        <h3 align="center">Tambah <span>Paket</span></h3>
        <form action="proses_tambah_paket.php" method="post">
            Jenis Paket :
            <input type="text" name="jenis" value="" class="form-control" required>
            Harga : 
            <input type="int" name="harga" value="" class="form-control"> <br>
            <input type="submit" name="simpan" value="Tambah Paket" class="btn" href = "tambah_paket.php"> 
        </form>
</div>
</div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
    </html>



