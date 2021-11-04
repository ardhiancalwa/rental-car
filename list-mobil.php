
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar mobil</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="text-white text-center">
                    Daftar mobil
                </h3>
                <a href="form-mobil.php">
                    <button class="btn btn-success form-control"> 
                        Tambahkan Mobil
                    </button>
                </a>
            </div>

            <div class="card-body">
                <form action="list-mobil.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-2" placeholder="cari">
                </form>

                <ul class="list-group"> 
                <?php
                include("connection.php");
                if (isset($_GET["search"])) {
                    $cari = $_GET["search"];
                    $sql = "select * from mobil where
                    nomor_mobil like '%$cari%'
                    or merk like '%$cari%'
                    or jenis like '%$cari%'
                    or warna like '%$cari%'
                    or tahun_pembuatan like '%$cari%'
                    or biaya_sewa like '%$cari%'";
                }else{
                    $sql = "select * from mobil";
                }

                # eksekusi SQL
                $hasil = mysqli_query($connect, $sql);
                while ($mobil = mysqli_fetch_array($hasil)) {
                ?>
                    <li class="list-group-item ">
                        <div class="row">
                            <div class="col-lg-4">
                                <!-- untuk gambar -->
                                <img src="image/<?=$mobil["image"]?>" width="50%">
                            </div>

                            <div class="col-lg-6 mb-2">
                                <!-- deskripsi -->
                                <h5><b><?=$mobil["merk"]?></b></h5>
                                <h6>ID : <?=$mobil["id_mobil"]?></h6>
                                <h6>Nomor : <?=$mobil["nomor_mobil"]?></h6>
                                <h6>Merk : <?=$mobil["merk"]?></h6>
                                <h6>Jenis : <?=$mobil["jenis"]?></h6>
                                <h6>Warna : <?=$mobil["jumlah_halaman"]?></h6>
                                <h6>Tahun Pembuatan : <?=$mobil["tahun_pembuatan"]?></h6>
                                <h6>Biaya Sewa Rp : <?=$mobil["biaya_sewa"]?></h6>
                            </div>

                            <div class="col-lg-2">
                                <!-- edit -->
                                <a href="form-mobil.php?id_mobil=<?=$mobil["id_mobil"]?>">
                                    <button class="btn btn-primary btn-block mb-2">
                                        Edit
                                    </button>
                                </a>

                                <!-- hapus -->
                                <a href="hapus-mobil.php?id_mobil=<?=$mobil["id_mobil"]?>"
                                onclick="return confirm('Apakahan anda benar inging menghapus data ini?')">
                                    <button class="btn btn-danger btn-block">
                                        Hapus
                                    </button>
                                </a>
                            </div>
                        </div>
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