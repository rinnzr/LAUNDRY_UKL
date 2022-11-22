<?php
    include "../header.php";
    ?>
<!DOCTYPE html>
<link rel="stylesheet" href="../style3.css">
<style>
   
    .table-secondary{
        margin:0 100px;
        width: 90%;
    }

 
</style>
<body style="
margin:20px;
">
    <h2 align="center"><strong>Histori Pemesanan Laundry</strong></h2>
    <table class="table" style="background-color:#F2EBE9;">
        <br>
        <thead style="background-color: #243A73; color:wheat">
            <tr>
                <th>NO</th>
                <th>  Member</th>
                <th>  User</th>
                <th>  Outlet</th>
                <th>Paket Laundry - Qty </th>
                <th>Total Harga</th>
                <th>Tanggal</th>
                <th>Tanggal Bayar</th>
                <th>Status Bayar</th>
                <th>Status Paket</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody >
            <?php
            include "../../koneksi.php";
            $qry_histori = mysqli_query($conn, "select transaksi.*, member.nama_member, user.nama_user, outlet.nama_outlet from transaksi join user ON user.id_user = transaksi.id_user join member ON member.id_member = transaksi.id_member join outlet ON outlet.id_outlet = transaksi.id_outlet  where transaksi.id_outlet = '".$_GET['id_outlet']."' order by id_transaksi desc");
            $no = 0;
            while ($dt_histori = mysqli_fetch_array($qry_histori)) {
                $total = 0;

                $no++;
                $paket_dipesan = "<ol>";
                $qry_paket = mysqli_query($conn, "select * from  detail_transaksi join paket on paket.id_paket=detail_transaksi.id_paket where id_transaksi = '" . $dt_histori['id_transaksi'] . "'");
                while ($dt_paket = mysqli_fetch_array($qry_paket)) {
                    $subtotal = 0;
                    $subtotal += $dt_paket['harga'] * $dt_paket['qty'];
                    $paket_dipesan .= "<li class = 'paket'>" . $dt_paket['jenis'] . "&nbsp;&nbsp;-&nbsp;&nbsp;" . $dt_paket['qty']  . "</li>";
                    $total += $dt_paket['harga'] * $dt_paket['qty'];
                        $button_cetak_detail="<a href='cetak.php?id=".$dt_histori['id_transaksi']."' class='btn btn-warning'>Cetak Detail</a>";
                }
                $paket_dipesan .= "</ol>";
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $dt_histori['nama_member'] ?></td>
                    <td><?= $dt_histori ['nama_user'] ?></td>
                    <td><?= $dt_histori['nama_outlet'] ?></td>
                    <td><?= $paket_dipesan ?></td>
                    <td> <?php
                            echo "Rp. " . number_format($total, 2, ',', '.') . "";
                            ?>
                    </td>
                    <td><?= $dt_histori['tgl'] ?></td>
                    <td><?= $dt_histori['tgl_bayar'] ?></td>
                    <td><?= $dt_histori['status_bayar'] ?></td>
                    <td><?= $dt_histori['status'] ?></td>
                    <td>
                        <!-- Status Bayar -->
                        <?php
                        if ($dt_histori['status_bayar'] == "belum_dibayar") {
                        ?>
                           <img src="../../blm.jpg" width="40px"  alt="belum bayar"> |
                        <?php
                        } else {
                        ?>
                             <img src="selesai.png" alt=""> |
                        <?php
                        }
                        ?>

                                <!-- Status Paket -->
                                <?php
                                if ($dt_histori['status'] == "baru") {
                                ?>
                                 <img src="../../blm.jpg" width="40px"  alt="belum bayar">
                                <?php
                                } elseif ($dt_histori['status'] == "proses") {
                                ?>
                                 <img src="../../blm.jpg" width="40px"  alt="belum bayar">
                                <?php
                                } elseif ($dt_histori['status'] == "selesai") {
                                ?>
                                   <img src="../../blm.jpg" width="40px"  alt="belum bayar">
                                <?php
                                } elseif ($dt_histori['status'] == "diambil") {
                                    ?><img src="selesai.png" alt="">

                        <!-- Status Bayar -->
                        <?php
                        if($dt_histori['status_bayar'] == "dibayar"){
                        ?>

                 
                        <?php
                        }}
                        ?>
                    </td>
                </tr>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>