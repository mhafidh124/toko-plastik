<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id_barang       =$_POST['id_barang'];
$kd_barang       =$_POST['kd_barang'];
$nama_barang     =$_POST['nama_barang'];
$harga           =$_POST['harga'];
$qty             =$_POST['qty'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE tabel_barang SET kd_barang = '$kd_barang', nama_barang = '$nama_barang', harga = '$harga', qty = '$qty' WHERE id_barang = '$id_barang'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>