<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style1.css">
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
    include "../../../koneksi.php";
    $qry_get_user=mysqli_query($conn,"select * from user where id_user = '".$_GET['id_user']."' ");
    $dt_user=mysqli_fetch_array($qry_get_user);

    



//     $qry_get_user=mysqli_query($conn,"select * u.id_user, u.nama_user, u.username,u.role, u.id_outlet, o.id_outlet, o.nama_outlet from user u join outlet o on o.id_outlet=u.id_outlet where u.id_user = '".$_GET['id_user']."' ");
// $dt_user=mysqli_fetch_array($qry_get_user);



    // $qry_get_outlet = mysqli_query($conn, "SELECT o.id_outlet, o.nama_outlet, u.nama_user,u.id_user,u.username,u.id_outlet FROM outlet o JOIN user u ON u.id_user=o.id_outlet WHERE u.id_user= '".$_GET['id_user']."'   ");
    // $dt_user=mysqli_fetch_array($qry_get_outlet);


    // $qry_get_outlet=mysqli_query($conn,"select * from outlet where id_outlet = '".$_GET['id_outlet']."'");
    //     $dt_outlet=mysqli_fetch_array($qry_get_outlet); 
    ?>
    <div class="container col-15">
        <div class="col-md- py-5">
            <h3 align="center">Ubah <span>Kasir</span></h3>
            <form action="proses_ubah_kasir.php" method="post">
                <input type="hidden" name="id_user" value= "<?=$dt_user['id_user']?>">
                Nama User :
                <input type="text" name="nama_user" value= "<?=$dt_user['nama_user']?>" class="form-control">
                Username : 
                <input type="text" name="username" value="<?=$dt_user['username']?>" class="form-control" required>
                Password : 
                <input type="password" name="password" value="" class="form-control">
                Outlet :
                <select name="outlet" id=""  class="form-control">
                        <?php
                        $qry_get_outlet=mysqli_query($conn,"select * from outlet ");
                            while($outlet = mysqli_fetch_array($qry_get_outlet)){
                            $id_outlet = $outlet['id_outlet'];
                            $nama_outlet = $outlet['nama_outlet'];

                        ?>
                            <option value="<?php echo $id_outlet?>"><?php echo $nama_outlet?></option>
                        <?php
                    }
                    ?>
                    </select>
                    
                Role : 
                <?php 
                $arr_role=array
                ('admin'=>'admin',
                'kasir'=>'kasir',
                'owner'=>'owner');
                ?>
                <select name="role" class="form-control">
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

