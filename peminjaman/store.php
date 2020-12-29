<?php
$koneksi = mysqli_connect("localhost", "root", "", "final_web");
$kode_peminjaman = $_POST['kode_peminjaman'];
$kode_buku = $_POST['kode_buku'];
$kode_anggota = $_POST['kode_anggota'];
$t_peminjaman = $_POST['tanggal_peminjaman'];

mysqli_query($koneksi, "INSERT INTO peminjaman VALUES('$kode_peminjaman','$t_peminjaman','$kode_buku','$kode_anggota')");

header("location:index.php");
