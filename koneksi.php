<?php
$koneksi = mysqli_connect("localhost", "root", "", "final_web");

if (!$koneksi) {
    echo "koneksi eror silahkan periksa";
}
