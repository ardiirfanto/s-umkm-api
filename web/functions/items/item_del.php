<?php

include "../../../config/sql.php";
$sql = new Sql();

$location = "../../assets/doc/items/";
try {

    $getData = $sql->query("SELECT * FROM items WHERE item_id ='$_POST[item_id]'")->fetch_assoc();

    $file_available = glob($location . $getData['item_img']);
    foreach ($file_available as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }

    $q_del = $sql->query(
        "DELETE FROM items WHERE item_id='$_POST[item_id]'"
    );

    if ($q_del) {
        echo 1;
    } else {
        echo 0;
    }
} catch (Exception $e) {
    echo $e;
}
