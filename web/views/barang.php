<?php
include 'functions/items/item.php';

$u = new Item();
?>
<!-- Table Data -->
<div class="row">
    <div class="col-md-12">
        <a href="?p=barang_add" class="btn btn-primary">Tambah Barang</a>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5 class="font-16 mt-0">Data Barang</h5>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>UMKM Pemilik</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                foreach ($u->view() as $k => $v) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <img style="border-radius: 20px;" width="100px" src="assets/doc/items/<?= $v['item_img'] ?>" alt="">
                                        </td>
                                        <td><?= $v['item_name'] ?></td>
                                        <td><?= $v['umkm_name'] ?></td>
                                        <td><?= $v['category_name'] ?></td>
                                        <td><?= $v['item_desc'] ?></td>
                                        <td>
                                            <a href="home?p=barang_edit&id=<?= $v['item_id'] ?>" type="button" class="btn btn-info">Edit</a>
                                            <button onclick="del(<?= $v['item_id'] ?>)" type="button" class="btn btn-danger">
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
    function del(item_id) {

        let url = "functions/items/item_del";

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
                            'item_id': item_id
                        },
                        dataType: "html",
                        success: function(res) {
                            console.log(res)
                            if (res == 1) {
                                processSuccess("Proses Berhasil", "home?p=barang");
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