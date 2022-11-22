<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
</head>
<body>

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
                    
                       
                    <label for="">Member</label>
                    <input type="hidden" name="id_member"  value="<?php echo $data_member['id_member']?>">
                    <input type="text" name="nama_member" value="<?php echo $data_member['nama_member']?>" id="" class="form-control" readonly>

                    <label for="">alamat</label>
                    <input type="text" name="alamat" value="<?php echo $data_member['alamat']?>" id="" class="form-control" readonly>

                    <label for="">no telp</label>
                    <input type="text" name="tlp" value="<?php echo $data_member['tlp']?>" id="" class="form-control" readonly>

                    <label for="">Tanggal Beli</label>
                    
                    <input type="text" name="tgl" value="<?php echo $tgl?>" id="" class="form-control" readonly>
                    <input type="hidden" name="id_user"  value="<?php echo $_SESSION['id_member']?>">

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

                    <!-- <label for="">Harga</label>
                    <input type="text" name="nama" value="" id="" class="form-control" readonly> -->
                        <div class="row mx-1">
                            <label for="">Banyak</label>
                            <input type="number" name="qty" class="form-control col-3" value="1">
                           
                        </div>
                    <!-- <label for="">Total</label>
                    <input type="text" name="nama" value="" id="" class="form-control" readonly> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Masukkan Keranjang</button>
                    
                </div>
                </form>
                </div>
            </div>
            </div>
</body>
</html>