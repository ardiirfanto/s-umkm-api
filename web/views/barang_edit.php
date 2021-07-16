<?php

include "functions/umkm/umkm.php";
include "functions/category/category.php";
include "functions/items/item.php";

$umkm = new Umkm();
$cat = new Category();
$item = new Item();

$data = $item->get($_GET['id']);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <b class="text-primary">Ubah Data Barang</b>
            </div>
            <div class="card-body">
                <form action="functions/items/item_edit" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-md-3">Gambar Barang</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-8">
                            <input type="file" name="foto" accept=".jpg,.png">
                            <p>*Kosongkan jika tidak ingin merubah Gambar</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Nama Barang</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-8">
                            <input value="<?= $data['item_id'] ?>" type="hidden" name="item_id" class="form-control" required>
                            <input value="<?= $data['item_name'] ?>" type="text" name="nama" class="form-control" required>
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
                                    <option value="<?= $v['category_id'] ?>" <?php if ($v['category_id'] == $data['category_id']) {
                                                                                    echo "SELECTED";
                                                                                } ?>><?= $v['category_name'] ?></option>
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
                                        <option value="<?= $v['umkm_id'] ?>" <?php if ($v['umkm_id'] == $data['umkm_id']) {
                                                                                    echo "SELECTED";
                                                                                } ?>><?= $v['umkm_name'] ?></option>
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
                            <textarea name="desc" class="form-control" rows="5" required><?= $data['item_desc'] ?></textarea>
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