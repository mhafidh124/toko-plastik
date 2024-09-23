<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$kd_barang       =$_POST['kd_barang'];
$nama_barang     =$_POST['nama_barang'];
$harga           =$_POST['harga'];
$qty             =$_POST['qty'];

//check kd_barang
$query_check = "SELECT * FROM tabel_barang WHERE kd_barang = '$kd_barang'";
$result = $connection->query($query_check);

if ($result->num_rows > 0) {
    //Jika kode barang sudah ada
    $error_message = "ERROR: Kode barang '$kd_barang' sudah ada. Gunakan kode lain.";
    header("Location: tambah-barang.php?error=" . urlencode($error_message));
    exit();
} else {
    //Jika tidak ada duplikasi, lakukan INSERT
    $query = "INSERT INTO tabel_barang (kd_barang, nama_barang, harga, qty) VALUES ('$kd_barang', '$nama_barang', '$harga', '$qty')";   
    
    //kondisi pengecekan apakah berhasil dimasukkan atau tidak
    if($connection->query($query)) {
    
        //redirect ke halaman index.php
        header("location: index.php");
    
    } else {
    
        //pesan error gagal insert data
        echo "Data Gagal Disimpan!";
    
    }
}


?>