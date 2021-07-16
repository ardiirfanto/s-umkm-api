
<?php

include "../config/sql.php";
include "json_response.php";

$sql = new Sql();
$json = new JSONResponse();
try {

    $res = [];

    $get = $sql->query(
        "SELECT * FROM categories"
    )->fetch_all(MYSQLI_ASSOC);

    foreach($get as $k => $v){

        $item = $sql->query(
            "SELECT * FROM items a 
            JOIN categories b ON a.category_id = b.category_id 
            JOIN umkm c ON a.umkm_id = c.umkm_id
            WHERE a.category_id='$v[category_id]'"
        )->fetch_all(MYSQLI_ASSOC);
        
        $data = $v;
        $data['items'] = $item;

        $res[] = $data;


    }

    if ($res) {
        echo $json->success($res);
    } else {
        echo $json->failed(0);
    }
} catch (Exception $e) {
    echo $json->failed(0);
}

?>