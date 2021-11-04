<?php
# menghubungkan ke file connection.php
include("connection.php");
$id_karyawan=$_GET["id_karyawan"];
$sql = "delete from karyawan where id_karyawan= '".$id_karyawan."'";
# eksekusi perintah sql
$result = mysqli_query($connect, $sql);

if ($result) {
    # jika hasil benar maka langsung di hapus akan kembali ke list-karyawan.php
    header('location:list-karyawan.php'); 
} else {
    # jika hasil salah maka akan gagal dan muncul error
    printf('Gagal'.mysqli_error($connect)); 
    exit(); 
}



?>