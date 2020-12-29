<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../login/index.php?pesan=belum_login");
}
include_once("../layouts/global.php");

include_once('../koneksi.php');

$kode_anggota = $_GET['kode_anggota'];

$query = mysqli_query($koneksi, "SELECT * FROM anggota  WHERE kode_anggota='$kode_anggota'LIMIT 1");
$menampilkan = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<div class="row">
    <div class="col-md-8">
        <form action="update.php" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
            <input type="hidden" name="kode_anggota" value="<?php echo $menampilkan['0']['kode_anggota'] ?>">
            <label for="kode_anggota">Kode anggota</label> <br>
            <input id="kode_anggota" value="<?php echo $menampilkan['0']['kode_anggota'] ?>" type="text" class="form-control " name="kode_anggota" placeholder="kode anggota" disabled>
            <br>
            <label for="nama">Nama</label> <br>
            <input id="nama" value="<?php echo $menampilkan['0']['nama'] ?>" type="text" class="form-control " name="nama" placeholder="nama anggota">
            <br>
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" class="form-control" id="jk">
                <option value="L" <?php echo ($menampilkan['0']['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-Laki</option>
                <option value="P" <?php echo ($menampilkan['0']['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
            <br>
            <label for="alamat">Alamat</label>
            <input id="alamat" value="<?php echo $menampilkan['0']['alamat'] ?>" type="text" class="form-control " name="alamat" placeholder="alamat anggota">
            <br>
            <label for="foto">Foto</label><br>
            <?php if ($menampilkan['0']['foto']) : ?>
                <img src="../file/<?php echo $menampilkan['0']['foto'] ?> " width="96px" />
            <?php endif; ?>
            <br>
            <input id="foto" type="file" class="form-control" name="file">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah sampul</small>
            <br><br>
            <button class="btn btn-primary" name="kirim">Simpan</button>

        </form>
    </div>
</div>

<?php
include_once("../layouts/bawah.php");
?>