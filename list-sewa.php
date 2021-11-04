<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sewa</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">
                    Daftar Sewa
                </h4>
            </div>

            <div class="card-body">
                <ul class="list-group">
                    <?php
                    include "connection.php";
                    $sql = "select 
                    sewa.*,pelanggan.*,karyawan.*,mobil.*
                    from 
                    sewa inner join pelanggan 
                    on sewa.id_pelanggan=pelanggan.id_pelanggan
                    inner join karyawan
                    on sewa.id_karyawan=karyawan.id_karyawan
                    left outer join mobil
                    on sewa.id_mobil=mobil.id_mobil";

                    $hasil = mysqli_query($connect, $sql);
                    while ($sewa = mysqli_fetch_array($hasil)) {
                        ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">ID Sewa</small>
                                    <h5><?=($sewa["id_sewa"])?></h5>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">Pelanggan</small>
                                    <h5><?=($Sewa["nama_pelanggan"])?></h5>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">Karyawan</small>
                                    <h5><?=($pinjam["nama_karyawan"])?></h5>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">Tgl. Sewa</small>
                                    <h5><?=($pinjam["tgl_sewa"])?></h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <h5>
                                        Status:
                                        <?php if ($pinjam["id_sewa" == null]) {?>
                                            <div class="badge badge-warning">
                                                Masih Dipinjam
                                            </div>
                                            <a href="process-sewa.php?id_sewa<?=($sewa["id_sewa"])?>" onclick="return confirm('Anda yakin ingin menyewa')">
                                                <button class="btn btn-sm btn-success mx-2">
                                                    Disewakan
                                                </button>
                                            </a>

                                        <?php } else { ?>
                                            <div class="badge badge-success">
                                                Sudah disewakan
                                            </div>
                                            <div class="badge badge-info">
                                                Harga : Rp <?=(number_format($Sewa["total_bayar"],2))?>
                                            </div>
                                        <?php } ?>
                                    </h5>
                                </div>
                            </div>

                            <small class="text-success">
                                List Mobil Yang Di Disewakan
                            </small>
                            <ul>
                            <?php
                            $id_sewa = $pinjam["id_sewa"];
                            $sql = "select * from sewa
                            inner join mobil
                            on sewa.id_mobil = mobil.id_mobil
                            where id_sewa = '$id_sewa'";

                            $hasil_mobil = mysqli_query($connect, $sql);
                            while ($mobil = mysqli_fetch_array($hasil_buku)) {
                                ?>
                                <li>
                                    <small>
                                        <?=($mobil["merk_mobil"])?>

                                        <i class="text-primary">
                                            (Disewa oleh <?=($pelanggan["nama_pelanggan"])?>)
                                        </i>
                                    </small>
                                </li>
                                <?php
                            }
                            ?>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>