<?php
include_once('../koneksi.php');
$kode = $_POST['kode_anggota'];

$nama_anggota = $_POST['nama'];
$jkl = $_POST['jk'];
$alamat = $_POST['alamat'];
$ekstensi_diperbolehkan    = array('png', 'jpg');
$nama = $_FILES['file']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran    = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];

if ($nama == true) {
    if ((in_array($ekstensi, $ekstensi_diperbolehkan) === true)) {
        move_uploaded_file($file_tmp, '../file/' . $nama);
    }
} else {
    if ($ukuran > 9044070) {
        echo 'UKURAN FILE TERLALU BESAR';
    }
}

$insert = mysqli_query($koneksi, "UPDATE anggota SET nama='$nama_anggota',jenis_kelamin='$jkl',alamat='$alamat', foto='$nama' WHERE kode_anggota='$kode'");
if ($insert) {
    header("location:index.php");
}
