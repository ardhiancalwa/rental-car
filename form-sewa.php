<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sewa Mobil</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">
                    Form Penyewaan Mobil
                </h4>
            </div>

            <div class="card-body">
                <form action="process-sewa.php" method="post">
                
                <!-- Tgl sewa dibuat otomatis -->
                <?php
                date_default_timezone_set('Asia/Jakarta');
                ?>
                Tanggal sewa
                <input type="text" name="tgl_sewa"
                class="form-control mb-2"
                value="<?=(date("Y-m-d H:i:s"))?>">
                <!-- pilih pelanggan dengan nama -->
                Nama
                <select name="id_pelanggan" class="form-control">
                <?php
                include("connection.php");
                $sql = "select * from pelanggan";
                $hasil = mysqli_query($connect, $sql);
                while($pelanggan = mysqli_fetch_array($hasil)){
                    ?>
                    <option value="<?=($pelanggan["id_pelanggan"])?>">
                        <?=($pelanggan["nama_pelanggan"])?>
                    </option>
                    <?php
                }
                ?>
                </select>
                
                
                <!-- karyawan ambil dari data login -->
                <input type="hidden" name="id_karyawan"
                value="<?=($_SESSION["karyawan"]["id_karyawan"])?>">

                Karyawan
                <input type="text" name="nama_karyawan"
                class="form-control mb-2"
                value="<?=($_SESSION["karyawan"]["nama_karyawan"])?>" readonly>

                <!-- tampilan pilihan mobil yang akan disewa -->
                Pilih Mobil yang Akan disewa
                <select name="id_mobil[]" class="form-control mb-2" required multiple="multiple">
                    <?php
                    $sql = "select * from mobil";
                    $hasil = mysqli_query($connect, $sql);
                    while ($mobil = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?=($mobil["id_mobil"])?>">
                            <?=($mobil["merk_mobil"])?>
                        </option>
                        <?php
                    }
                    ?>
                </select>

                <!-- Pilih durasi -->
                <input type="number" name="durasi"
                class="form-control mb-2" required>


                <button type="submit" class="btn btn-block btn-dark">
                    sewa
                </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>