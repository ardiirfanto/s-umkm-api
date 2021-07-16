<?php

include "../../../config/sql.php";
$sql = new Sql();

$cat_id = $_POST['cat_id'];
$cat = $_POST['cat'];
try {

    $q = $sql->query(
        "UPDATE categories SET category_name='$cat' WHERE category_id='$cat_id'"
    );

    if ($q) {
        echo 1;
    } else {
        echo 0;
    }
} catch (Exception $e) {
    echo $e;
}

