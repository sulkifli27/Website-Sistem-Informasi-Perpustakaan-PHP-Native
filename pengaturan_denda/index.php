<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
include_once("../layouts/global.php");
include_once("../koneksi.php");

$query = mysqli_query($koneksi, "SELECT*FROM Denda");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th><b>Batas Waktu Peminjaman</b></th>
                    <th><b>Denda</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $results) : ?>
                    <tr>
                        <td> <?php echo $results['b_waktu_peminjaman'] ?> hari</td>
                        <td><?php echo $results['denda'] ?> hari</td>
                        <td>
                            <a href="edit.php"><button class="btn btn-info">Edit</button></a>
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