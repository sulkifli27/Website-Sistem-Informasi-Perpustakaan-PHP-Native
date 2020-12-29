<?php
$kode_anggota = $_GET['kode_anggota'];

include_once('../koneksi.php');

$delete = mysqli_query($koneksi, "DELETE FROM anggota WHERE kode_anggota='$kode_anggota'");

header("location:index.php");
