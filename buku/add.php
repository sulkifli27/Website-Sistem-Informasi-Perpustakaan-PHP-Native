<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
include_once("../layouts/global.php");
?>

<div class="row">
    <div class="col-md-8">
        <form action="store.php" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
            <label for="kode_buku">Kode Buku</label> <br>
            <input id="kode_buku" value="" type="text" class="form-control " name="kode_buku" placeholder="kode buku">
            <br>
            <label for="judul">Judul</label> <br>
            <input id="judul" value="" type="text" class="form-control " name="judul" placeholder="judul buku">
            <br>
            <label for="penerbit">Penerbit</label>
            <input id="penerbit" value="" type="text" class="form-control " name="penerbit" placeholder="penerbit buku">
            <br>
            <label for="tahun_terbit">Tahun Terbit</label>
            <input id="tahun_terbit" value="" type="text" class="form-control " name="tahun_terbit" placeholder="tahun terbit buku">
            <br>
            <label for="sampul">Sampul</label>
            <input id="sampul" type="file" class="form-control" name="file">
            <br>
            <button class="btn btn-primary" name="kirim">Simpan</button>

        </form>
    </div>
</div>
<?php
include_once("../layouts/bawah.php");
?>