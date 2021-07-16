<?php
include 'functions/umkm/umkm.php';

$u = new Umkm();
?>
<!-- Table Data -->
<div class="row">
    <div class="col-md-12">
        <a href="?p=umkm_add" class="btn btn-primary">Tambah UMKM</a>
        <hr>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5 class="font-16 mt-0">Data UMKM</h5>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Logo</th>
                                    <th>Username</th>
                                    <th>Nama UMKM</th>
                                    <th>Pemilik</th>
                                    <th>Alamat</th>
                                    <th>Np.HP</th>
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
                                            <img style="border-radius: 20px;" width="100px" src="assets/doc/logos/<?= $v['umkm_logo'] ?>" alt="">
                                        </td>
                                        <td><?= $v['username'] ?></td>
                                        <td><?= $v['umkm_name'] ?></td>
                                        <td><?= $v['owner'] ?></td>
                                        <td><?= $v['umkm_address'] ?></td>
                                        <td><?= $v['phone'] ?></td>
                                        <td>
                                            <a href="home?p=umkm_edit&id=<?= $v['user_id'] ?>" type="button" class="btn btn-info">Edit</a>
                                            <button onclick="del(<?= $v['user_id'] ?>)" type="button" class="btn btn-danger">
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
    function del(user_id) {

        let url = "functions/umkm/umkm_del";

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
                            'user_id': user_id
                        },
                        dataType: "html",
                        success: function(res) {
                            console.log(res)
                            if (res == 1) {
                                processSuccess("Proses Berhasil", "home?p=umkm");
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