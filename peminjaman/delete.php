<?php
$kode_peminjaman = $_GET['kode_peminjaman'];

include_once('../koneksi.php');

$delete = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE kode_peminjaman='$kode_peminjaman'");

header("location:index.php");
