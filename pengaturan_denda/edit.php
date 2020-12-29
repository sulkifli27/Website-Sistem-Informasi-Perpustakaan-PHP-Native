<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
include_once("../koneksi.php");
include_once("../layouts/global.php");

$query = mysqli_query($koneksi, "SELECT * FROM denda");
$menampilkan = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>


<div class="row">
    <div class="col-md-8">
        <form action="update.php" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
            <label for="w_peminjaman">Batas Waktu Peminjaman</label> <br>
            <input id="w_peminjaman" value="<?php echo $menampilkan['0']['b_waktu_peminjaman'] ?>" type="text" class="form-control " name="b_waktu_peminjaman">
            <br>
            <label for="denda">Denda</label> <br>
            <input id="denda" value="<?php echo $menampilkan['0']['denda'] ?>" type="text" class="form-control " name="denda">
            <br>
            <button class="btn btn-primary">Update</button>

        </form>
    </div>
</div>
<?php
include_once("../layouts/bawah.php");
?>