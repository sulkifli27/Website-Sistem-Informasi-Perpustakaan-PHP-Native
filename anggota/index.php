<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
include_once("../layouts/global.php");
include_once("../koneksi.php");

$query = mysqli_query($koneksi, "SELECT*FROM anggota");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>
<div class="row">
    <div class="col-md-12 text-right"> <a href="add.php" class="btn btn-primary">Tambah Anggota</a> </div>
</div> <br>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th><b>Kode anggota</b></th>
                    <th><b>Nama</b></th>
                    <th><b>Jenis Kelmain</b></th>
                    <th><b>Alamat</b></th>
                    <th><b>Foto</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $results) : ?>
                    <tr>
                        <td> <?php echo $results['kode_anggota'] ?></td>
                        <td><?php echo $results['nama'] ?></td>
                        <td><?php echo $results['jenis_kelamin'] ?> </td>
                        <td><?php echo $results['alamat'] ?> </td>
                        <td>
                            <?php if ($results['foto']) : ?>
                                <img src="../file/<?php echo $results['foto'] ?> " width="48px" /></td>
                    <?php
                            else : ?>
                        No Image
                    <?php endif; ?>
                    <td><a href="edit.php?kode_anggota=<?= $results['kode_anggota'] ?>"><button class="btn btn-info">Edit</button></a>
                        <a href="delete.php?kode_anggota=<?= $results['kode_anggota'] ?>" onclick="return confirm('Yakin menghapus ?')"><button class="btn btn-danger">Hapus</button></a>
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