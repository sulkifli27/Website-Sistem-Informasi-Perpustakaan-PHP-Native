<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
include_once("../layouts/global.php");
include_once("../koneksi.php");

$query = mysqli_query($koneksi, "SELECT*FROM peminjaman");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>
<div class="row">
    <div class="col-md-12 text-right"> <a href="add.php" class="btn btn-primary">Pinjam Buku</a> </div>
</div> <br>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th><b>Kode Peminjaman</b></th>
                    <th><b>Kode Buku</b></th>
                    <th><b>Kode Anggota</b></th>
                    <th><b>Tanggal Peminjaman</b></th>

                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $results) : ?>
                    <tr>
                        <td> <?php echo $results['kode_peminjaman'] ?></td>
                        <td><?php echo $results['kode_buku'] ?></td>
                        <td><?php echo $results['kode_anggota'] ?> </td>
                        <td><?php echo $results['tanggal_peminjaman'] ?> </td>
                        <td><a href="edit.php?kode=<?php echo $results['kode_peminjaman'] ?>"><button class="btn btn-info">Edit</button></a>
                            <a href="delete.php?kode_peminjaman=<?= $results['kode_peminjaman'] ?>" onclick="return confirm('Yakin menghapus ?')"><button class="btn btn-danger">Hapus</button></a>
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