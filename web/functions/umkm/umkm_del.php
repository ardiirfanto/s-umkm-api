<?php

include "../../../config/sql.php";
$sql = new Sql();

$location = "../../assets/doc/logos/";
try {

    $getData = $sql->query("SELECT * FROM umkm WHERE user_id ='$_POST[user_id]'")->fetch_assoc();

    $file_available = glob($location . $getData['umkm_logo']);
    foreach ($file_available as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }

    $q_del = $sql->query(
        "DELETE FROM users WHERE user_id='$_POST[user_id]'"
    );

    if ($q_del) {
        echo 1;
    } else {
        echo 0;
    }
} catch (Exception $e) {
    echo $e;
}
