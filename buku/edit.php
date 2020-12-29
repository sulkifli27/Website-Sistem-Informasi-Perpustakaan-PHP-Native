<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../login/index.php?pesan=belum_login");
}
include_once("../layouts/global.php");

include_once('../koneksi.php');

$kode_buku = $_GET['kode_buku'];

$query = mysqli_query($koneksi, "SELECT * FROM buku  WHERE kode_buku='$kode_buku'LIMIT 1");
$menampilkan = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<div class="row">
    <div class="col-md-8">
        <form action="update.php" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
            <label for="kode_buku">Kode Buku</label> <br>
            <input type="hidden" name="kode_buku" value="<?php echo $menampilkan['0']['kode_buku'] ?>">
            <input id="kode_buku" value="<?php echo $menampilkan['0']['kode_buku'] ?>" type="text" class="form-control " name="kode_buku" placeholder="kode buku" disabled>
            <br>
            <label for="judul">Judul</label> <br>
            <input id="judul" value="<?php echo $menampilkan['0']['judul'] ?>" type="text" class="form-control " name="judul" placeholder="judul buku">
            <br>
            <label for="penerbit">Penerbit</label>
            <input id="penerbit" value="<?php echo $menampilkan['0']['penerbit'] ?>" type="text" class="form-control " name="penerbit" placeholder="penerbit buku">
            <br>
            <label for="tahun_terbit">Tahun Terbit</label>
            <input id="tahun_terbit" value="<?php echo $menampilkan['0']['tahun_terbit'] ?>" type="text" class="form-control " name="tahun_terbit" placeholder="tahun terbit buku">
            <br>
            <label for="sampul">Sampul</label><br>
            <?php if ($menampilkan['0']['sampul']) : ?>
                <img src="../file/<?php echo $menampilkan['0']['sampul'] ?> " width="96px" />
            <?php endif; ?>
            <br><br>
            <input id="sampul" type="file" class="form-control" name="file">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah sampul</small>
            <br> <br>
            <button class="btn btn-primary" name="kirim">Update</button>
        </form>
    </div>
</div>
<?php
include_once("../layouts/bawah.php");
?>