<!-- Sweet Alert -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

include "../../../config/sql.php";
$sql = new Sql();

$tmp = $_FILES['foto']['tmp_name'];
$location = "../../assets/doc/logos/";

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$pemilik = $_POST['pemilik'];
try {

    $q_user = $sql->query(
        "INSERT INTO users(username,password,role) VALUES('$username','$password','pelaku')"
    );

    $get_user = $sql->query("SELECT * FROM users WHERE role='pelaku' ORDER BY user_id DESC LIMIT 1")->fetch_assoc();

    $foto = $_FILES['foto']['name'];
    $ex_foto = explode(".", $foto);
    $format = strtolower(end($ex_foto));
    $tgl = date("YmdHis");

    $nama_file = "UMKM_" . $tgl . "." . $format;

    if (move_uploaded_file($tmp, $location . $nama_file)) {

        $q = $sql->query(
            "INSERT INTO umkm(user_id,umkm_name,umkm_address,umkm_logo,owner,phone)
            VALUES(
                '$get_user[user_id]',
                '$nama',
                '$alamat',
                '$nama_file',
                '$pemilik',
                '$hp'
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
    }
} catch (Exception $e) {
    echo $e;
}
?>