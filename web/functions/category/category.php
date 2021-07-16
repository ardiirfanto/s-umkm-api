<?php

include_once("../config/sql.php");

class Category {
    
    public $sql;

    function __construct()
    {
        $this->sql = new Sql();
    }
    function view_cat()
    {


        try {
            $get = $this->sql->query("SELECT * FROM categories")->fetch_all(MYSQLI_ASSOC);

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

    function get_cat($id)
    {
        try {
            $get = $this->sql->query("SELECT * FROM categories WHERE category_id ='$id'")->fetch_assoc();

            return $get;
        } catch (Exception $e) {
            return $e;
        }
    }

}