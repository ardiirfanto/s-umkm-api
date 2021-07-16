
<?php

include "../config/sql.php";
include "json_response.php";

$sql = new Sql();
$json = new JSONResponse();
try {

    $get = $sql->query(
        "SELECT * FROM items a JOIN categories b ON a.category_id = b.category_id JOIN umkm c ON a.umkm_id = c.umkm_id ORDER BY item_id DESC LIMIT 10"
    )->fetch_all(MYSQLI_ASSOC);

    if ($get) {
        echo $json->success($get);
    } else {
        echo $json->failed(0);
    }
} catch (Exception $e) {
    echo $json->failed(0);
}

?>