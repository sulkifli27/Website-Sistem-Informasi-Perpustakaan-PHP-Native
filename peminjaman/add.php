<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}

include_once('../koneksi.php');
$query = mysqli_query($koneksi, "SELECT kode_buku FROM buku");
$tampilkans = mysqli_fetch_all($query, MYSQLI_ASSOC);

$querys = mysqli_query($koneksi, "SELECT kode_anggota FROM anggota");
$tampils = mysqli_fetch_all($querys, MYSQLI_ASSOC);
include_once("../layouts/global.php");
?>

<div class="row">
    <div class="col-md-8">
        <form action="store.php" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
            <label for="kode_peminjaman">Kode Peminjaman</label> <br>
            <input id="kode_pimanjaman" value="" type="text" class="form-control " name="kode_peminjaman" placeholder="kode peminjaman">
            <br>
            <label for="jk">Kode Buku</label>
            <select name="kode_buku" class="form-control" id="jk">
                <?php foreach ($tampilkans as $tampilkan) : ?>
                    <option value="<?php echo $tampilkan['kode_buku'] ?>"><?php echo $tampilkan['kode_buku'] ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="kode_anggota">Kode Anggota</label>
            <select name="kode_anggota" class="form-control" id="ka">
                <?php foreach ($tampils as $tampil) : ?>
                    <option value="<?php echo $tampil['kode_anggota'] ?>"><?php echo $tampil['kode_anggota'] ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
            <input id="tanggal_peminjaman" value="<?php echo date('Y-m-d') ?>" type="text" class="form-control " name="tanggal_peminjaman" placeholder="Tanggal pengembalian">
            <br>
            <button class="btn btn-primary">Simpan</button>

        </form>
    </div>
</div>
<?php
include_once("../layouts/bawah.php");
?>