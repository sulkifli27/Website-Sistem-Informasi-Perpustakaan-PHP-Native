<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
include_once("../layouts/global.php");
include_once('../koneksi.php');
$query = mysqli_query($koneksi, "SELECT * FROM peminjaman");
$quer = mysqli_query($koneksi, "SELECT * FROM  denda");

$tampilkanss = mysqli_fetch_all($quer, MYSQLI_ASSOC);
$tampilkans = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>


<div class="row">
    <div class="col-md-8">
        <form action="store.php" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">

            <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
            <input id="tanggal_pengembalian" value="<?php echo date('Y-m-d') ?>" type="text" class="form-control " name="tgl_pengembalian">
            <br>
            <label for="">Kode Peminjaman</label>
            <select class="form-control D" id="kd" name="kode_peminjaman">
                <?php foreach ($tampilkans as $tampilkan) : ?>
                    <option data-id="<?php echo $tampilkan['tanggal_peminjaman'] ?>" value="<?php echo $tampilkan['kode_peminjaman'] ?>"><?php echo $tampilkan['kode_peminjaman'] ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="denda">Denda</label>
            <input id="denda" value="" type="text" class="form-control " name="denda" placeholder="denda">
            <br>
            <button class="btn btn-primary">Simpan</button>

        </form>

    </div>
</div>


<script>
    document.getElementById('kd').addEventListener('change', function() {
        var pengembalian = new Date(document.getElementById('tanggal_pengembalian').value)
        let peminjaman = new Date($(this).find(':selected').data('id'))
        var oneDay = 24 * 60 * 60 * 1000;
        let selisih = Math.round((pengembalian - peminjaman) / oneDay);

        if (selisih > <?php echo $tampilkanss[0]['b_waktu_peminjaman'] ?>) {
            document.getElementById('denda').value = <?php echo $tampilkanss[0]['denda'] ?>
        } else {
            document.getElementById('denda').value = 0
        }
    });
</script>
<?php
include_once("../layouts/bawah.php");

?>