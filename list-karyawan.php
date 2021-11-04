<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Karyawan</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white text-center">
                    Data Karyawan Rental
                </h4>
                <a href="form-karyawan.php">
                    <button class="btn btn-success form-control">
                        Add Karyawan
                    </button>
                </a>
            </div>

            <div class="card-body">
                <form action="list-karyawan.php" method="get">
                    <input type="text" name="search" class="form-control mb-2"
                    placeholder="Search" required>
                </form>

                <ul class="list-group">
                <?php
                include("connection.php");
                if (isset($_GET["search"])) {
                    $search = $_GET["search"];

                    $sql = "select * from karyawan where id_karyawan like'%$search%'
                    or nama_karyawan like '%$search%'
                    or alamat_karyawan like '%$search%'
                    or kontak like '%$search%'
                    or username like '%$search'";
                }else{
                    $sql = "select * from karyawan";
                }

                # eksekusi perintah SQL
                $query = mysqli_query($connect, $sql);
                while ($karyawan = mysqli_fetch_array($query)) {
                ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-9 col-md-10">
                                <!-- deskripsi -->
                                <h4><b><?php echo $karyawan["nama_karyawan"];?></b></h4>
                                <h6>ID : <?php echo $karyawan["id_karyawan"];?></h6>
                                <h6>Username : <?php echo $karyawan["username"];?></h6>
                                <h6>Kontak : <?php echo $karyawan["kontak"];?></h6>
                                <h6>Alamat : <?php echo $karyawan["alamat_karyawan"];?></h6>
                            </div>

                            <div class="col-lg-3 col-md-2">
                                <!-- edit -->
                                <a href="form-karyawan.php?id_karyawan=<?php echo $karyawan["id_karyawan"];?>">
                                    <button class="btn btn-block btn-primary mb-2">
                                        Edit
                                    </button>
                                </a>

                                <!-- hapus -->
                                <a href="hapus-karyawan.php?id_karyawan=<?=$karyawan["id_karyawan"];?>"
                                    onclick="return confirm('Apakah anda benar ingin menghapus data ini')">
                                    <button class="btn btn-block btn-danger">
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