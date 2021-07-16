<?php

include_once("../config/sql.php");

class Umkm {
    
    public $sql;

    function __construct()
    {
        $this->sql = new Sql();
    }
    function view()
    {


        try {
            $get = $this->sql->query("SELECT * FROM umkm a JOIN users b ON a.user_id = b.user_id")->fetch_all(MYSQLI_ASSOC);

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

    function get($id)
    {
        try {
            $get = $this->sql->query("SELECT * FROM umkm a JOIN users b ON a.user_id = b.user_id WHERE b.user_id ='$id'")->fetch_assoc();

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

}