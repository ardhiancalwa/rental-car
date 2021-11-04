<?php
session_start(); //ini harus ada pada baris pertama
# session -> tempat penyimpanan data di sisi server
# yang dapat diakses secara global pada halaman web yang membutuhkan
include("connection.php");
if (isset($_POST["login"])) {
    # menampung data username dan password
    $username = $_POST["username"];
    $password = sha1($_POST["password"]);

    # ambil data karyawan sesuai password dan username
    $sql = "select * from karyawan where
    username = '$username' and password = '$password'";

    $hasil = mysqli_query($connect, $sql);

    # cek hasil query
    # mysqli_num_rows untuk jumlah baris
    if (mysqli_num_rows($hasil)>0) {
        # login berhasil
        # data disimpan ke dalam session
        $karyawan = mysqli_fetch_array($hasil);
        $_SESSION["karyawan"] = $karyawan;
        echo "<script>alert('Login Berhasil!');window.location='../sewa/list-sewa.php'</script>";
        
    }else{
        # login gagal
        echo "<script>alert('Login gagal!');history.go(-1);</script>";
    }
}
?>