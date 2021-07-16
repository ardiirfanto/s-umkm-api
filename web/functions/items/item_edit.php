<!-- Sweet Alert -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include "../../../config/sql.php";
$sql = new Sql();

$tmp = $_FILES['foto']['tmp_name'];
$location = "../../assets/doc/items/";

$item_id = $_POST['item_id'];
$umkm_id = $_POST['umkm_id'];
$cat_id = $_POST['cat_id'];
$nama = $_POST['nama'];
$desc = $_POST['desc'];
try {

    if (!$tmp) {
        $q = $sql->query(
            "UPDATE items SET
            umkm_id='$umkm_id',
            category_id='$cat_id',
            item_name='$nama',
            item_desc='$desc'
            WHERE item_id='$item_id'
            "
        );
    } else {

        $getData = $sql->query("SELECT * FROM items WHERE item_id ='$item_id'")->fetch_assoc();

        $file_available = glob($location . $getData['item_img']);
        foreach ($file_available as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        $foto = $_FILES['foto']['name'];
        $ex_foto = explode(".", $foto);
        $format = strtolower(end($ex_foto));
        $tgl = date("YmdHis");

        $nama_file = "ITEMS_" . $tgl . "." . $format;

        if (move_uploaded_file($tmp, $location . $nama_file)) {

            $q = $sql->query(
                "UPDATE items SET
                umkm_id='$umkm_id',
                category_id='$cat_id',
                item_name='$nama',
                item_desc='$desc',
                item_img='$nama_file'
                WHERE item_id='$item_id'
            "
            );
        }
    }

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
} catch (Exception $e) {
    echo $e;
}
?>