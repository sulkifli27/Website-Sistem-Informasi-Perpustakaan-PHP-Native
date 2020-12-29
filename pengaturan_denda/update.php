<?php
include_once("../koneksi.php");

$b_waktu_peminjaman = $_POST['b_waktu_peminjaman'];
$denda = $_POST['denda'];

$insert = mysqli_query($koneksi, "UPDATE denda SET b_waktu_peminjaman='$b_waktu_peminjaman',denda='$denda'");
if ($insert) {
    header("location:index.php");
}
