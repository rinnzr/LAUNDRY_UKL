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
    <?php 
    include "../../koneksi.php";
    $qry_get_member=mysqli_query($conn,"select * from member where id_member = '".$_GET['id_member']."'");
    $dt_member=mysqli_fetch_array($qry_get_member);
    ?>
    <div class="container col-15">
        <div class="col-md- py-5">
            <h3 align="center">Ubah <span>Member</span></h3>
            <form action="proses_ubah_member.php" method="post">
                <input type="hidden" name="id_member" value= "<?=$dt_member['id_member']?>">
                Nama Member :
                <input type="text" name="nama_member" value= "<?=$dt_member['nama_member']?>" class="form-control">
                Alamat : 
                <textarea name="alamat" class="form-control" rows="4"><?=$dt_member['alamat']?></textarea>
                Jenis Kelamin : 
                <?php 
                $arr_jenis_kelamin=array
                ('Laki-laki'=>'Laki-laki',
                'Perempuan'=>'Perempuan');
                ?>
                <select name="jenis_kelamin" class="form-control">
                    <?php foreach ($arr_jenis_kelamin as $key_jenis_kelamin => $val_jenis_kelamin):
                        if($key_jenis_kelamin==$dt_member['jenis_kelamin']){
                            $selek="selected";
                        } else {
                            $selek="";
                        }
                    ?>                   
                <option value="<?=$key_jenis_kelamin?>" <?=$selek?>><?=$val_jenis_kelamin?></option>
                    <?php endforeach ?>
                </select>
                No telp :
                <input type="number" name="tlp" value= "<?=$dt_member['tlp']?>" class="form-control"> 
                <!-- value untuk menampilkan data dari database  -->

                <div class="col-md- py-5">
                <input type="submit" name="simpan" value="Ubah Member" class="btn" style="color:white">
                </div>
                
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

