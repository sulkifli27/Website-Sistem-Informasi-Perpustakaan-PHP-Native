<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
include_once("../layouts/global.php");
include_once("../koneksi.php");

$query = mysqli_query($koneksi, "SELECT tgl_pengembalian, SUM(denda)  from pengembalian group By tgl_pengembalian");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>


<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>

                    <th><b>Tanggal </b></th>
                    <th><b>Total Denda</b></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $results) : ?>
                    <tr>
                        <td><?php echo $results['tgl_pengembalian'] ?> </td>
                        <td><?php echo $results['SUM(denda)'] ?> </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>

<?php
include_once("../layouts/bawah.php");
?>