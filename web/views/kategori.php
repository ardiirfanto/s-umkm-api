<?php
include 'functions/category/category.php';

$cat = new Category();
if (isset($_GET['edit'])) {
    $data = $cat->get_cat($_GET['edit']);
}
?>
<!-- Form Add/Edit -->
<div class="row">
    <div class="col-md-12">
        <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="block block-bordered block-rounded mb-2">
                <div class="block-header" role="tab" id="accordion_h1">
                    <a class="font-w600" data-toggle="collapse" data-parent="#accordion" href="#accordion_q1" aria-expanded="true" aria-controls="accordion_q1">
                        <?= (isset($_GET['edit'])) ? 'Ubah' : 'Tambah' ?> Data
                    </a>
                </div>
                <div id="accordion_q1" class="collapse <?= (isset($_GET['edit'])) ? 'show' : '' ?>" role="tabpanel" aria-labelledby="accordion_h1" data-parent="#accordion">
                    <div class="block-content">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="">Nama Kategori</label>
                                <input value="<?= $data['category_id'] ?? '' ?>" type="hidden" id="cat_id">
                                <input value="<?= $data['category_name'] ?? '' ?>" id="cat" type="text" class="form-control">
                                <br>
                                <button onclick="save()" class="btn btn-primary btn-block" type="button">
                                    Simpan Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table Data -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5 class="font-16 mt-0">Data Kategori Barang</h5>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Kategori</th>
                                    <th class="text-center">AKsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                foreach ($cat->view_cat() as $k => $v) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $v['category_name'] ?></td>
                                        <td>
                                            <a href="home?p=kategori&edit=<?= $v['category_id'] ?>" type="button" class="btn btn-info">Edit</a>
                                            <button onclick="del(<?= $v['category_id'] ?>)" type="button" class="btn btn-danger">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function save() {

        let url = "functions/category/category_<?= (isset($_GET['edit'])) ? 'edit' : 'add' ?>";

        let cat_id = $("#cat_id").val()
        let cat = $("#cat").val()

        console.log(url);

        $.ajax({
            url: url,
            method: "POST",
            data: {
                'cat_id': cat_id,
                'cat': cat
            },
            success: function(res) {
                console.log(res)
                if (res == 1) {
                    processSuccess("Proses Berhasil", "home?p=kategori");
                } else if (res == 2) {
                    processFailed("Gagal Memproses Data")
                } else if (res == 0) {
                    processFailed("Gagal Memproses Data")
                } else {
                    processFailed(res)
                }
            }
        })



    }

    function del(cat_id) {

        let url = "functions/category/category_del";

        swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Data yang terhapus akan hilang secara permanen!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Iya, Hapus",
                cancelButtonText: "Batal",
                confirmButtonClass: "btn btn-success",
                cancelButtonClass: "btn btn-primary"
            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST', // Metode pengiriman data menggunakan POST
                        url: url, // File yang akan memproses data
                        data: {
                            'cat_id': cat_id
                        },
                        dataType: "html",
                        success: function(res) {
                            console.log(res)
                            if (res == 1) {
                                processSuccess("Proses Berhasil", "home?p=kategori");
                            } else if (res == 0) {
                                processFailed("Proses Gagal")
                            } else {
                                processFailed(res)
                            }
                        }
                    });
                }
            })
    }
</script>