<!-- Sweet Alert -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../../../config/sql.php";
$sql = new Sql();

$tmp = $_FILES['foto']['tmp_name'];
$location = "../../assets/doc/logos/";

$user_id = $_POST['user_id'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$pemilik = $_POST['pemilik'];
try {

    if ($password != '') {
        $s_user = "UPDATE users SET username ='$username', password='$password' WHERE user_id='$user_id'";
    } else {
        $s_user = "UPDATE users SET username ='$username' WHERE user_id='$user_id'";
    }

    $q_user = $sql->query($s_user);

    if (!$tmp) {
        $q = $sql->query(
            "UPDATE umkm SET
            umkm_name='$nama',
            umkm_address='$alamat',
            phone='$hp',
            owner='$pemilik'
            WHERE user_id='$user_id'
            "
        );
    } else {

        $getData = $sql->query("SELECT * FROM umkm WHERE user_id ='$user_id'")->fetch_assoc();

        $file_available = glob($location . $getData['umkm_logo']);
        foreach ($file_available as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        $foto = $_FILES['foto']['name'];
        $ex_foto = explode(".", $foto);
        $format = strtolower(end($ex_foto));
        $tgl = date("YmdHis");

        $nama_file = "UMKM_" . $tgl . "." . $format;

        if (move_uploaded_file($tmp, $location . $nama_file)) {

            $q = $sql->query(
                "UPDATE umkm SET
                umkm_name='$nama',
                umkm_address='$alamat',
                phone='$hp',
                owner='$pemilik',
                umkm_logo='$nama_file'
                WHERE user_id='$user_id'
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
                    window.location.replace("../../home?p=umkm");
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
                    window.location.replace("../../home?p=umkm_add");
                });
            });
        </script>
<?php
    }
} catch (Exception $e) {
    echo $e;
}
?>