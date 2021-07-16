<?php
include_once("../config/sql.php");

class Item {
    
    public $sql;

    function __construct()
    {
        $this->sql = new Sql();
    }
    function view()
    {


        try {

            if($_SESSION['role']=='admin'){
                $get = $this->sql->query("SELECT * FROM items a JOIN categories b ON a.category_id = b.category_id JOIN umkm c ON a.umkm_id = c.umkm_id")->fetch_all(MYSQLI_ASSOC);
            } else {
                $get = $this->sql->query("SELECT * FROM items a JOIN categories b ON a.category_id = b.category_id JOIN umkm c ON a.umkm_id = c.umkm_id WHERE c.umkm_id='$_SESSION[umkm_id]'")->fetch_all(MYSQLI_ASSOC);
            }


            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

    function get($id)
    {
        try {
            $get = $this->sql->query("SELECT * FROM items a JOIN categories b ON a.category_id = b.category_id JOIN umkm c ON a.umkm_id = c.umkm_id WHERE a.item_id ='$id'")->fetch_assoc();

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

}