<?php
include ("connection.php");

$id_sewa = $_GET["id_sewa"];
date_default_timezone_set('Asia/Jakarta');
$tgl_kembali = date_create(date("Y-m-d H:i:s"));
$tgl_kembali_fix = date("Y-m-d H:i:s");
# denda = selisih tgl_kembali dan tgl_sewa
# jika selisih hari > 7, maka selisih hari - 7 * 1000
# else denda = 0

$sql = "select * from sewa where id_sewa='$id_sewa'";

$hasil = mysqli_query($connect, $sql);
$sewa = mysqli_fetch_array($hasil);

$tgl_sewa = date_create($sewa["tgl_sewa"]);
#menghitung selisih 2 tanggal
$selisih = date_diff($tgl_kembali, $tgl_sewa);
# mengkonversi hasil selisih format jumlah hari
$selisih_hari = $selisih->format("%a");


if ($selisih_hari > 7) {
    $denda = ($selisih_hari -7)*1000;
}else {
    $denda = 0;
}

$total_bayar = $selisih_hari

$sql = "insert into penyewaan values
('','$id_sewa','$tgl_kembali_fix','$denda')";

if (mysqli_query($connect, $sql)) {
    header("Location:list-sewa.php");
}else{
    echo mysqli_error($connect);
}

?>