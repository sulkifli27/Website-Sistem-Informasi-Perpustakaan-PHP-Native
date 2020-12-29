<?php


include_once("../koneksi.php");
include_once("../layouts/global.php");



$k = $_GET['kode'];


$query = mysqli_query($koneksi, "SELECT * FROM peminjaman where kode_peminjaman ='$k'");
$menampilkan = mysqli_fetch_all($query, MYSQLI_ASSOC);

$querys = mysqli_query($koneksi, "SELECT kode_anggota FROM anggota");
$tampils = mysqli_fetch_all($querys, MYSQLI_ASSOC);

$query = mysqli_query($koneksi, "SELECT kode_buku FROM buku");
$tampilkans = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<div class="row">
    <div class="col-md-8">
        <form action="update.php" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
            <label for="kode_peminjaman">Kode Peminjaman</label> <br>
            <input type="hidden" name="kode_peminjam" value="<?php echo $menampilkan['0']['kode_peminjaman'] ?>">
            <input id="kode_pimanjaman" value="<?php echo $menampilkan['0']['kode_peminjaman'] ?>" type="text" class="form-control " name="kode_peminjaman" placeholder="kode peminjaman" disabled>
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
            <input id="tanggal_peminjaman" value="<?php echo $menampilkan['0']['tanggal_peminjaman'] ?>" type="text" class="form-control " name="tanggal_peminjaman" placeholder="Tanggal pengembalian">
            <br>
            <button class="btn btn-primary">Simpan</button>

        </form>
    </div>
</div>
<?php
include_once("../layouts/bawah.php");
?>