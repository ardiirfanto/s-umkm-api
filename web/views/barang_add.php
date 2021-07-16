<?php

include "functions/umkm/umkm.php";
include "functions/category/category.php";

$umkm = new Umkm();
$cat = new Category();

?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <b class="text-primary">Tambah Data Barang</b>
            </div>
            <div class="card-body">
                <form action="functions/items/item_add" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-md-3">Gambar Barang</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-8">
                            <input type="file" name="foto" accept=".jpg,.png" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Nama Barang</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-8">
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Kategori Barang</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-8">
                            <select name="cat_id" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                <?php
                                foreach ($cat->view_cat() as $k => $v) {
                                ?>
                                    <option value="<?= $v['category_id'] ?>"><?= $v['category_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <?php if ($_SESSION['role'] == 'admin') { ?>
                    <div class="row form-group">
                        <div class="col-md-3">Pilih UMKM</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-8">
                            <select name="umkm_id" class="form-control" required>
                                <option value="">Pilih UMKM</option>
                                <?php
                                foreach ($umkm->view() as $k => $v) {
                                ?>
                                    <option value="<?= $v['umkm_id'] ?>"><?= $v['umkm_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <?php } else { ?>
                    <input type="hidden" name="umkm_id" value="<?= $_SESSION['umkm_id'] ?>">
                    <?php } ?>
                    <div class="row form-group">
                        <div class="col-md-3">Deskripsi Barang</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-8">
                            <textarea name="desc" class="form-control" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>