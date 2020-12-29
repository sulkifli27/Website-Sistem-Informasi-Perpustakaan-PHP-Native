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
            <label for="kode_anggota">Kode anggota</label> <br>
            <input id="kode_anggota" value="" type="text" class="form-control " name="kode_anggota" placeholder="kode anggota">
            <br>
            <label for="nama">Nama</label> <br>
            <input id="nama" value="" type="text" class="form-control " name="nama" placeholder="nama anggota">
            <br>
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" class="form-control" id="jk">
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
            <br>
            <label for="alamat">Alamat</label>
            <input id="alamat" value="" type="text" class="form-control " name="alamat" placeholder="alamat anggota">
            <br>
            <label for="foto">Foto</label>
            <input id="foto" type="file" class="form-control" name="file">
            <br>
            <button class="btn btn-primary" name="kirim">Simpan</button>

        </form>
    </div>
</div>
<?php
include_once("../layouts/bawah.php");
?>