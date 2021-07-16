<?php
function menu($page = "main")
{

	$pg = "";
	switch ($page) {

        
		case "kategori":
			$pg = "kategori.php";
			break;
		case "umkm":
			$pg = "umkm.php";
			break;
		case "umkm_add":
			$pg = "umkm_add.php";
			break;
		case "umkm_edit":
			$pg = "umkm_edit.php";
			break;
		case "barang":
			$pg = "barang.php";
			break;
		case "barang_add":
			$pg = "barang_add.php";
			break;
		case "barang_edit":
			$pg = "barang_edit.php";
			break;

		default:
			$pg = "dashboard.php";
	}
	include_once("views/" . $pg);
}
