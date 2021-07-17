<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <b class="text-primary">Tambah Data UMKM</b>
            </div>
            <div class="card-body">
                <form action="functions/umkm/umkm_add" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-md-3">Logo UMKM</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-8">
                            <input type="file" name="foto" accept=".jpg,.png" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Akun UMKM</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-4">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Nama UMKM</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-8">
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Alamat UMKM</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-8">
                            <textarea name="alamat" class="form-control" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Nomor Handphone</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-8">
                            <input type="number" name="hp" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Nama Pemilik</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-8">
                            <input type="text" name="pemilik" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Latitude</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-4">
                            <input type="text" name="lat" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Longitude</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-4">
                            <input type="text" name="lng" class="form-control" required>
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