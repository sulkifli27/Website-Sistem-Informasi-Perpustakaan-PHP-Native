<?php
$kode_buku = $_GET['kode_buku'];

include_once('../koneksi.php');

$delete = mysqli_query($koneksi, "DELETE FROM buku WHERE kode_buku='$kode_buku'");

header("location:index.php");
