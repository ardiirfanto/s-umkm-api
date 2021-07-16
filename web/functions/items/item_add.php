<!-- Sweet Alert -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

include "../../../config/sql.php";
$sql = new Sql();

$tmp = $_FILES['foto']['tmp_name'];
$location = "../../assets/doc/items/";

$umkm_id = $_POST['umkm_id'];
$cat_id = $_POST['cat_id'];
$nama = $_POST['nama'];
$desc = $_POST['desc'];
try {

    $foto = $_FILES['foto']['name'];
    $ex_foto = explode(".", $foto);
    $format = strtolower(end($ex_foto));
    $tgl = date("YmdHis");

    $nama_file = "ITEMS_" . $tgl . "." . $format;

    if (move_uploaded_file($tmp, $location . $nama_file)) {

        $q = $sql->query(
            "INSERT INTO items(umkm_id,category_id,item_name,item_desc,item_img)
            VALUES(
                '$umkm_id',
                '$cat_id',
                '$nama',
                '$desc',
                '$nama_file'
            )
            "
        );

        if ($q) {
?>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: "success",
                        title: "Proses Berhasil",
                        showConfirmButton: false,
                        timer: 1500,
                    }).then(function() {
                        window.location.replace("../../home?p=barang");
                    });
                });
            </script>
        <?php
        } else {
        ?>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        text: "Proses Gagal",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1500,
                    }).then(function() {
                        window.location.replace("../../home?p=barang_add");
                    });
                });
            </script>
<?php
        }
    }
} catch (Exception $e) {
    echo $e;
}
?>