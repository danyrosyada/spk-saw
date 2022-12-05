<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container mt-3 mb-3">
    <h1>Input Data Kriteria</h1>

    <div class="col">
        <form action="<?= base_url("/kriteria/simpan") ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row mb-3">
                <label for="nama_kriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control <?= ($validation->hasError('nama_kriteria')) ? 'is-invalid' : '' ?>" id="nama_kriteria" name="nama_kriteria" value="<?= old('nama_kriteria'); ?>">
                    <div id="nama_kriteriaFeedback" class="invalid-feedback"><?= $validation->getError('nama_kriteria'); ?></div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="tipe" class="col-sm-2 col-form-label">Tipe</label>
                <div class="col-sm-8">
                    <select class="form-control" name="tipe">
                        <option value="B">Benefit</option>
                        <option value="C">Cost</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a href="/kriteria" class="btn btn-danger">Batal</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>