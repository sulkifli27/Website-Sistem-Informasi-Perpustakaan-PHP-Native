<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
include_once("../layouts/global.php");
include_once("../koneksi.php");

$query = mysqli_query($koneksi, "SELECT p.kode_buku, b.judul, p.tanggal_peminjaman, d.nama FROM peminjaman p join buku b 
on p.kode_buku = b.kode_buku join anggota d on p.kode_anggota=d.kode_anggota");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>


<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th><b>Kode Buku</b></th>
                    <th><b>Judul</b></th>
                    <th><b>Tanggal Peminjaman</b></th>
                    <th><b>Nama</b></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $results) : ?>
                    <tr>
                        <td> <?php echo $results['kode_buku'] ?></td>
                        <td><?php echo $results['judul'] ?></td>
                        <td><?php echo $results['tanggal_peminjaman'] ?> </td>
                        <td><?php echo $results['nama'] ?> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>

<?php
include_once("../layouts/bawah.php");
?>