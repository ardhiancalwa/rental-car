<?php
include "connection.php";

if (isset($_POST["save_pelanggan"])) {
    # insert data petugas
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $kontak = $_POST["kontak"];
    $alamat_pelanggan = $_POST["alamat_pelanggan"];


    $sql = "insert into pelanggan values
    ('','$nama_pelanggan','$kontak','$alamat_pelanggan')";

    if (mysqli_query($connect, $sql)) {
        header("location:list-pelanggan.php");
    }else{
        echo mysqli_error($connect);
    }
} else if(isset($_POST["update_pelanggan"])){
    # edit/update petugas
    $id_pelanggan = $_POST["id_pelanggan"];
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $kontak = $_POST["kontak"];
    $alamat_pelanggan = $_POST["alamat_pelanggan"];

    if (mysqli_query($connect, $sql)) {
        header("location:list-pelanggan.php");
    }else{
        echo mysqli_error($connect);
    }
}
?>