<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container mt-3 mb-3">
    <h1>Ubah Karyawan</h1>

    <div class="col">
        <form action="<?= base_url("/karyawan/update/". $karyawan['id_karyawan']) ?> " method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row mb-3">
                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : '' ?>" id="nip" name="nip" autofocus value="<?= $karyawan['nip'] ?>">
                    <div id="nipFeedback" class="invalid-feedback"><?= $validation->getError('nip'); ?></div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= $karyawan['nama'] ?>">
                    <div id="namaFeedback" class="invalid-feedback"><?= $validation->getError('nama'); ?></div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="jns_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-8">
                    <select class="form-control" name="jns_kel">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?>" id="alamat" name="alamat" value="<?= $karyawan['alamat'] ?>">
                    <div id="alamatFeedback" class="invalid-feedback"><?= $validation->getError('alamat'); ?></div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="no_hp" class="col-sm-2 col-form-label">NO HP</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : '' ?>" id="no_hp" name="no_hp" value="<?= $karyawan['no_hp'] ?>">
                    <div id="no_hpFeedback" class="invalid-feedback"><?= $validation->getError('no_hp'); ?></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Data</button>
            <a href="/karyawan" class="btn btn-danger">Batal</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>