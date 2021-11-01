<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pelanggan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">
                    Daftar Pelanggan
                </h4>
            </div>

            <div class="card-body">
                <form action="list-pelanggan.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-2"
                    placeholder="Pencarian">
                </form>

                <ul class="list-group">
                    <?php
                    include "connection.php";
                    if (isset($_GET["search"])) {
                        $search = $_GET["search"];
                        $sql = "select * from pelanggan
                        where nama_pelanggan like '%$search%'
                        or kontak like '%$search%'
                        or alamat_pelanggan '%$search%'";
                    } else {
                        $sql = "select * from pelanggan";
                    }
                    
                    $hasil = mysqli_query($connect, $sql);
                    while ($petugas = mysqli_fetch_array($hasil)) {
                        ?>
                        <li class="list-group-item mb-2">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h4>
                                        <?=($pelanggan["nama_pelanggan"])?>
                                    </h4>
                                    <h6>Kontak: <?=($pelanggan["kontak"])?></h6>
                                </div>

                                <div class="col-lg-3">
                                    <a href="form-pelanggan?id_pelanggan=<?=($pelanggan["id_pelangan"])?>">
                                        <button class="btn btn-primary btn-block mb-2">
                                            Edit
                                        </button>
                                    </a>

                                    <a href="process-pelanggan.php?id_pelanggan=<?=($pelanggan["id_pelanggan"])?>" onclick="return confirm('SERIUSS???')">
                                        <button class="btn btn-danger btn-block mb-2">
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

                <!-- button tambah data -->
                <a href="form-pelanggan">
                    <button class="btn btn-success">
                        Tambahkan Data Pelanggan
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>