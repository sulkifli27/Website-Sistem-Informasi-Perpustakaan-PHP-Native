<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
include_once("../layouts/global.php");
include_once("../koneksi.php");

$query = mysqli_query($koneksi, "SELECT*FROM buku");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>
<div class="row">
    <div class="col-md-12 text-right"> <a href="add.php" class="btn btn-primary">Tambah Buku</a> </div>
</div> <br>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th><b>Kode Buku</b></th>
                    <th><b>Judul</b></th>
                    <th><b>Penerbit</b></th>
                    <th><b>Tahun Terbit</b></th>
                    <th><b>Sampul</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $results) : ?>
                    <tr>
                        <td> <?php echo $results['kode_buku'] ?></td>
                        <td><?php echo $results['judul'] ?></td>
                        <td><?php echo $results['penerbit'] ?> </td>
                        <td><?php echo $results['tahun_terbit'] ?> </td>
                        <td>
                            <?php if ($results['sampul']) : ?>
                                <img src="../file/<?php echo $results['sampul'] ?> " width="48px" /></td>
                    <?php
                            else : ?>
                        No Image
                    <?php endif; ?>
                    <td><a href="edit.php?kode_buku=<?= $results['kode_buku'] ?>"><button class="btn btn-info">Edit</button></a>
                        <a href="delete.php?kode_buku=<?= $results['kode_buku'] ?>" onclick="return confirm('Yakin menghapus ?')"><button class="btn btn-danger">Hapus</button></a>
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