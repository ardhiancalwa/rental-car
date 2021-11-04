<?php
# menguhubungkan ke file connection.php
include ("connection.php");
$id_pelanggan = $_GET["id_pelanggan"];
$sql = "delete from pelanggan where id_pelanggan = '".$id_pelanggan."'";
# eksekusi perintah sql
$result = mysqli_query($connect, $sql);

if ($result) {
    # jika hasil benar maka akan langsung menghapus dan kembali ke list-pelanggan.php
    header('location:list-pelanggan.php');
} else {
    # jika hasil salah maka akan gagal dan muncul error
    printf('Gagal'.mysqli_error($connect));
    exit();
}

?>