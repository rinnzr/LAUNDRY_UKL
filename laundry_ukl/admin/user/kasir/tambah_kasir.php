<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style1.css">
    <title></title>
</head>
<?php
    include '../../../koneksi.php'; 
    $qry_outlet = mysqli_query($conn, "SELECT *FROM outlet");
    // $qry_owner = mysqli_query($conn, "SELECT *FROM user where role='owner'");
    ?>
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
        <h3 align="center">Tambah <span>Kasir</span></h3>
        <form action="proses_tambah_kasir.php" method="post">
            Nama user :
            <input type="text" name="nama_user" value="" class="form-control" required>
            Username : 
            <input type="text" name="username" value="" class="form-control" required>
            Password :  
            <input type="password" name="password" value="" class="form-control" required>
            Role :
            <?php 
                    $arr_role=array('admin'=>'admin','kasir'=>'kasir','owner'=>'owner');
                    ?>
                    <select name="role" class="form-control">
                        <option></option>
                        <?php foreach ($arr_role as $key_role => $val_role):
                            if($key_role==$dt_user['role']){
                                $selek="selected";
                            } else {
                                $selek="";
                            }
                        ?>
                        <option value="<?=$key_role?>" <?=$selek?>><?=$val_role?></option>
                        <?php endforeach ?>
                    </select>
                    <?php
            // if (@$_SESSION['role'] != 'kasir') {
                ?>
            Outlet :
                <select name="outlet" id="" class="form-control">
                    <option value="">Pilih outlet</option>
                        <?php
                            while($outlet = mysqli_fetch_array($qry_outlet)){
                            $id_outlet = $outlet['id_outlet'];
                            $nama_outlet = $outlet['nama_outlet'];

                        ?>
                            <option value="<?php echo $id_outlet?>"><?php echo $nama_outlet?></option>
                        <?php
                    }
                // }
                    ?>
                    </select>
           <br>
            <input type="submit" name="simpan" value="SUBMIT" class="btn" style="background-color:#251B37;color:white">
        </form>
    </div>
</div>        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
