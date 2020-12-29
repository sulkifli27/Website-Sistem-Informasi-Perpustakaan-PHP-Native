<?php
include_once('../koneksi.php');

$kode_pengembalian = $_POST['kode_peminjaman'];
$t_pengembalian = $_POST['tgl_pengembalian'];
$denda = $_POST['denda'];





mysqli_query($koneksi, "INSERT INTO pengembalian VALUES('','$kode_pengembalian','$t_pengembalian','$denda')");
header("location:index.php");
