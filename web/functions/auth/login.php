<?php

session_start();
include "../../../config/sql.php";
$sql = new Sql();

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $get = $sql->query("SELECT * FROM users WHERE username = '$username'")->fetch_assoc();

    if ($get) {

        if (password_verify($password, $get['password'])) {

            $_SESSION['token'] = hash('sha512',date('YmdHis'));
            $_SESSION['user_id'] = $get['user_id'];
            $_SESSION['username'] = $get['username'];
            $_SESSION['role'] = $get['role'];

            if($get['role']=='pelaku'){
                $get_pelaku = $sql->query("SELECT * FROM umkm WHERE user_id = '$get[user_id]'")->fetch_assoc();
                $_SESSION['umkm_id'] = $get_pelaku['umkm_id'];
            }

            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 2;
    }
} catch (Exception $e) {
    echo $e;
}
