<?php
include_once('../koneksi.php');
$kode_anggota = $_POST['kode_anggota'];
$nama_anggota = $_POST['nama'];
$jk = $_POST['jk'];
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
    } else {
        if ($ukuran > 9044070) {
            echo 'UKURAN FILE TERLALU BESAR';
        }
    }
}

$insert = mysqli_query($koneksi, "INSERT INTO anggota SET kode_anggota='$kode_anggota',nama='$nama_anggota',jenis_kelamin='$jk',alamat='$alamat',foto='$nama'");
if ($insert) {
    header("location:index.php");
}
