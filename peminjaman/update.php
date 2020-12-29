<?php

$kode_peminjam = $_POST['kode_peminjam'];
$koneksi = mysqli_connect("localhost", "root", "", "final_web");
$kode_peminjaman = $_POST['kode_peminjaman'];
$kode_buku = $_POST['kode_buku'];
$kode_anggota = $_POST['kode_anggota'];
$t_peminjaman = $_POST['tanggal_peminjaman'];

$insert = mysqli_query($koneksi, "UPDATE peminjaman SET kode_buku='$kode_buku',kode_anggota='$kode_anggota', tanggal_peminjaman='$t_peminjaman' WHERE kode_peminjaman='$kode_peminjam'");
if ($insert) {
    header("location:index.php");
}
