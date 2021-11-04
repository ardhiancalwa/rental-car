
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pelanggan Rental</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white texxt-center">
                    Data Pelanggan Rental Mobil
                </h4>
            </div>

            <div class="card-body">
                <form action="list-anggota.php" method="get">
                    <input type="text" name="search" class="form-control mb-2"
                    placeholder="Search">
                </form>

                
                <ul class="list-group">
                    <?php
                        include("connection.php");
                        if (isset($_GET["search"])) {
                            $search = $_GET["search"];
                            
                            $sql = "select * from pelanggan where id_pelanggan like '%$search%'
                            or nama_pelanggan like '%$search%'
                            or alamat_pelanggan like '%$search%'
                            or kontak like '%$kontak%'";
                        }else {
                            $sql = "select * from pelanggan";
                        }
                        
                        $query = mysqli_query($connect, $sql);
                        while ($pelanggan = mysqli_fetch_array($query)) {
                    ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-9">
                                    <!-- deskripsi -->
                                    <h5><b><?php echo $pelanggan["id_pelanggan"];?></b></h5>
                                    <h4><?php echo $pelanggan["nama_pelanggan"];?></h4>
                                    <h6>Alamat : <?php echo $pelanggan["alamat_pelanggan"];?></h6>
                                    <h6>Kontak : <?php echo $pelanggan["kontak"];?></h6>
                                </div>
                                    
                                    
                                <div class="col-lg-3">
                                    <!-- edit -->
                                    <a href="form-pelanggan.php?id_pelanggan=<?php echo $pelanggan["id_pelanggan"];?>">
                                        <button class="btn btn-block btn-primary mb-2">
                                            Edit
                                        </button>
                                    </a>

                                    <!-- hapus -->
                                    <a href="hapus-pelanggan.php?id_pelanggan=<?=$pelanggan["id_pelanggan"];?>">
                                        <button class="btn btn-block btn-danger">
                                            Delete
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </li>
                            <!-- menambahkan data pelanggan -->
                            <a href="form-pelanggan.php">
                                <button class="btn btn-success">
                                    Add Customer
                                </button>
                            </a>
                    <?php
                }
                ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>