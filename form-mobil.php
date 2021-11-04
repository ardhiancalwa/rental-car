
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form mobil</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">
                    Form Mobil
                </h4>
            </div>

            <div class="card-body">
            <?php
                if (isset($_GET["id_mobil"])) {
                    # memeriksa ketika load file ini, apakah membawa data GET dengan nama "id_mobil". jika true, form pelanggan digunakan untuk edit

                    # mengakses data mobil dari id_mobil yang dikirim
                    include("connection.php");
                    $id_mobil = $_GET["id_mobil"];
                    $sql = "select * from mobil where id_mobil='$id_mobil'";

                    #eksekusi perintah sql
                    $hasil = mysqli_query($connect, $sql);

                    #konversi hasil query ke array
                    $mobil = mysqli_fetch_array($hasil);
            ?>
                        <form action="process-mobil.php" method="post"
                        enctype="multipart/form-data">

                            ID Mobil
                            <input type="text" name="id_mobil"
                            class="form-control mb-2" required
                            value="<?=$mobil["id_mobil"];?>" readonly>

                            Nomor Mobil
                            <input type="text" name="nomor_mobil"
                            class="form-control mb-2" required
                            value="<?=$mobil["nomor_mobil"];?>">

                            Merk
                            <input type="text" name="merk"
                            class="form-control mb-2" required
                            value="<?=$mobil["merk"];?>">

                            Jenis
                            <input type="text" name="jenis"
                            class="form-control mb-2" required
                            value="<?=$mobil["jenis"];?>">

                            Warna
                            <input type="text" name="warna"
                            class="form-control mb-2" required
                            value="<?=$mobil["warna"];?>">

                            Tahun Pembuatan
                            <input type="text" name="tahun_pembuatan"
                            class="form-control mb-2" required
                            value="<?=$mobil["tahun_pembuatan"];?>">

                            Biaya Sewa
                            <input type="text" name="biaya_sewa"
                            class="form-control mb-2" required
                            value="<?=$mobil["biaya_sewa"];?>">

                            Image <br>
                            <img src="image/<?=$mobil["image"]?>" width="50%" alt="">
                            <input type="file" name="image"
                            class="form-control mb-2">

                            <button type="submit" class="btn btn-info btn-block"
                            name="update_mobil">
                                Simpan
                            </button>
                        </form>
            <?php
                }else{
                    # jika salah, menggunakan ini untuk insert
            ?>
                    <form action="process-mobil.php" method="post"
                    enctype="multipart/form-data">

                        Nomor Mobil
                        <input type="text" name="nomor_mobil"
                        class="form-control mb-2" required>

                        Merk
                        <input type="text" name="merk"
                        class="form-control mb-2" required>

                        Jenis
                        <input type="text" name="jenis"
                        class="form-control mb-2" required>

                        Warna
                        <input type="text" name="warna"
                        class="form-control mb-2" required>

                        Tahun Pembuatan
                        <input type="text" name="tahun_pembuatan"
                        class="form-control mb-2" required>

                        Biaya Sewa
                        <input type="text" name="biaya_sewa"
                        class="form-control mb-2" required>

                        Image 
                        <input type="file" name="image"
                        class="form-control mb-2" required>

                        <button type="submit" class="btn btn-info btn-block"
                        name="simpan_mobil">
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