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
<!-- <?php include("home.php") ?> -->
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">
                    Form Pelanggan
                </h4>
            </div>

            <div class="card-body">
                <?php
                if (isset($_GET["id_pelanggan"])) {
                    # memeriksa ketika load file ini, apakah membawa data GET dgn nama "id_pelanggan" jika true, form pelanggan digunakan untuk edit

                    # mengakses data pelanggan dari id_pelanggan yang dikirim
                    include("connection.php");
                    $id_pelanggan = $_GET["id_pelanggan"];
                    $sql = "select * from pelanggan where id_pelanggan='$id_pelanggan'";

                    # eksekusi perintah sql
                    $hasil = mysqli_query($connect, $sql);

                    # konversi hasil query ke bentuk array
                    $pelanggan = mysqli_fetch_array($hasil);
                ?>

                    <form action="process-pelanggan.php" method="post"
                    onsubmit="return confirm('Apakah anda benar ingin mengedit data ini?')">
                    
                        ID Pelanggan
                        <input type="text" name="id_pelanggan"
                        class="form-control mb-2" required
                        value="<?=$pelanggan["id_pelanggan"];?>" readonly>

                        Nama Pelanggan
                        <input type="text" name="nama_pelanggan"
                        class="form-control mb-2" required
                        value="<?=$pelanggan["nama_pelanggan"];?>">

                        Alamat Pelanggan
                        <input type="date" name="alamat_pelanggan"
                        class="form-control mb-2" required
                        value="<?=$pelanggan["alamat_pelanggan"];?>">

                        Kontak Pelanggan
                        <input type="number" name="kontak"
                        class="form-control mb-2" required
                        value="<?=$pelanggan["kontak"];?>">

                        <button type="submit" class="btn btn-success btn-block"
                        name="edit_pelanggan">
                            Save
                        </button>
                    </form>
                <?php
                }else{
                    # jika false, menggunakan ini untuk insert
                ?>
                    <form action="process-pelanggan.php" method="post">
    
                        Nama Pelanggan
                        <input type="text" name="nama_pelanggan"
                        class="form-control mb-2" required>

                        Alamat Pelanggan
                        <input type="text" name="alamat_pelanggan"
                        class="form-control mb-2" required>

                        Kontak Pelanggan
                        <input type="text" name="kontak"
                        class="form-control mb-2" required>

                        <button type="submit" class="btn btn-success btn-block"
                        name="simpan_pelanggan">
                            Save
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