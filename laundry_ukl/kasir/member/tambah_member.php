<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../style2.css">
    <title></title>
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
</head>
<body>
<div class="container col-15">
    <div class="col-md- py-5">
        <h3 align="center">Tambah <span>Member</span></h3>
        <form action="proses_tambah_member.php" method="post">
            Nama Member :
            <input type="text" name="nama_member" value="" class="form-control" required>
            Alamat : 
            <textarea name="alamat" class="form-control" rows="4" required></textarea>
            Jenis Kelamin : 
            <select name="jenis_kelamin" class="form-control">
                <option></option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            No Telp :
            <input type="number" name="tlp" value="" class="form-control" required> <br>
            <input type="submit" name="simpan" value="SUBMIT" class="btn" style="color:white">
        </form>
    </div>
</div>        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
