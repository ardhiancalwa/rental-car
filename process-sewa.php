<?php
include("connection.php");
# menampung data yang dikirim
$id_sewa = $_POST["id_sewa"];
$tgl_sewa = $_POST["tgl_sewa"];
$id_pelanggan = $_POST["id_pelanggan"];
$id_karyawan = $_POST["id_karyawan"];
$total_bayar = $_POST["total_bayar"]; 
$mobil = $_POST["id_mobil"]; //array

# perintah SQL untuk insert ke table sewa
$sql = "insert into sewa values
('','$id_karyawan','$id_pelanggan','$tgl_sewa','$total_bayar')";

if (mysqli_query($connect, $sql)) {
    # jika berhasil insert ke tabel sewa
    # insert ke tabel detail sewa
    for ($i=0; $i < count($mobil); $i++) { 
        $id_mobil = $mobil[$i];
        $sql = "insert into detail_sewa values
        ('$id_sewa','$id_mobil')";
        if (mysqli_query($connect, $sql)) {
            # jika berhasil insert ke table detail_sewa

        }else {
            # jika gaga insert ke table detail_sewa
            echo mysqli_error($connect);
            exit;
        }
    }
    header('Location:list-sewa.php');
}else{
    # jia gagal insert tabel sewa
    echo mysqli_error($connect);
}
?>