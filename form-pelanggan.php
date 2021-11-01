<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pelanggan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-success">
                <h4 class="text-white">
                    Form Pelanggan
                </h4>
            </div>

            <div class="card-body">
                <?php
                if (isset($_GET["id_pelanggan"])) {
                    include "connection.php";
                    $id_pelanggan = $_GET["id_pelanggan"];
                    $sql = "select * from pelanggan 
                    where id_pelanggan='$id_pelanggan'";

                    $hasil = mysqli_query($connect, $sql);
                    $petugas = mysqli_fetch_array($hasil);
                ?>
                    <form action="process-pelanggan" method="post">
                        ID Petugas
                        <input type="text" name="id_pelanggan"
                        value="<?=($petugas["id_pelanggan"])?>"
                        class="form-control mb-2" readonly />

                        Nama Petugas
                        <input type="text" name="nama_pelanggan"
                        value="<?=($petugas["nama_pelanggan"])?>"
                        class="form-control mb-2" required />

                        Kontak
                        <input type="text" name="kontak"
                        value="<?=($petugas["kontak"])?>"
                        class="form-control mb-2" required />
                        
                        Alamat
                        <input type="text" name="alamat_pelanggan"
                        value="<?=($petugas["alamat_pelanggan"])?>"
                        class="form-control mb-2" required />

                        <button type="submit" name="update_petugas"
                        class="btn btn-success btn-block">
                            Simpan
                        </button>
                    </form>
                <?php
                } else {
                    # insert
                    ?>
                    <form action="process-pelanggan.php" method="post">
                        
                        Nama Pelanggan
                        <input type="text" name="nama_pelanggan"
                        class="form-control mb-2" required />

                        Kontak
                        <input type="text" name="kontak"
                        class="form-control mb-2" required />

                        Alamat
                        <input type="text" name="alamat_pelanggan"
                        class="form-control mb-2" required />

                        <button type="submit" name="save_pelanggan"
                        class="btn btn-success btn-block">
                            Simpan
                        </button>
                    </form>
                    <?php
                }
                
                ?>
            </div>
        </div>
    </div>
</body>
</html>