<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?= Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Daftar Mahasiswa</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                    Tambah Data
                </button>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?= BASEURL; ?>mahasiswa/cari" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari mahasiswa.." name="keyword" id="keyword" autocomplete="off">
                            <button class="btn btn-primary" type="submit" id="button-search">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $mhs['nama']; ?>
                        <div>
                            <a href="<?= BASEURL; ?>mahasiswa/detail/<?= $mhs['id']; ?>" class="badge bg-primary rounded-pill">detail</a>
                            <a href="<?= BASEURL; ?>mahasiswa/getubah/<?= $mhs['id']; ?>" class="badge bg-success rounded-pill edit" data-bs-toggle="modal" data-bs-target="#addModal" data-id="<?= $mhs['id']; ?>">ubah</a>
                            <a href="<?= BASEURL; ?>mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge bg-danger rounded-pill" onclick="return confirm('yakin menghapus?');">hapus</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Tambah Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>mahasiswa/tambah" method="post">
                    <input type="hidden" id="id" name="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="number" class="form-control" id="nim" name="nim" placeholder="Masukkan Nama">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Nama">
                    </div>
                    <!-- <select class="form-select" aria-label="Default select example">
                        <option selected>Jurusan</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Ilmu Komputer">Ilmu Komputer</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                    </select> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>