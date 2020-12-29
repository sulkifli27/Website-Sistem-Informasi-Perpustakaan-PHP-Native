<?php
include_once('../koneksi.php');
$kode = $_POST['kode_buku'];
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$tahun_terbit = $_POST['tahun_terbit'];
$ekstensi_diperbolehkan    = array('png', 'jpg');

$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran    = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];
$nama = $_FILES['file']['name'];
if ($nama == true) {
    if ((in_array($ekstensi, $ekstensi_diperbolehkan) === true)) {
        move_uploaded_file($file_tmp, '../file/' . $nama);
    }
} else {
    if ($ukuran > 9044070) {
        echo 'UKURAN FILE TERLALU BESAR';
    }
}
$insert = mysqli_query($koneksi, "UPDATE buku SET judul='$judul',penerbit='$penerbit',tahun_terbit='$tahun_terbit', sampul='$nama' WHERE kode_buku='$kode'");
if ($insert) {
    header("location:index.php");
}
