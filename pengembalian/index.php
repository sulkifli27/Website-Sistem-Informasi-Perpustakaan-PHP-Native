<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
include_once("../layouts/global.php");
include_once("../koneksi.php");

$query = mysqli_query($koneksi, "SELECT*FROM pengembalian");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>
<div class="row">
    <div class="col-md-12 text-right"> <a href="add.php" class="btn btn-primary">Pengembalian Buku</a> </div>
</div> <br>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th><b>Kode Pminjaman</b></th>
                    <th><b>Tanggal Pengembalian</b></th>
                    <th><b>Denda</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $results) : ?>
                    <tr>
                        <td> <?php echo $results['kode_peminjaman'] ?></td>
                        <td><?php echo $results['tgl_pengembalian'] ?></td>
                        <td><?php echo $results['denda'] ?> </td>
                        <td>
                            <a href="delete.php?kode_peminjaman=<?= $results['id'] ?>" onclick="return confirm('Yakin menghapus ?')"><button class="btn btn-danger">Hapus</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>

<?php
include_once("../layouts/bawah.php");
?>