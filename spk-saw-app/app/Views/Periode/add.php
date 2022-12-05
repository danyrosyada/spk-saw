<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container mt-3 mb-3">
    <h1>Input Data Periode</h1>

    <div class="col">
        <form action="<?= base_url("/periode/simpan") ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row mb-3">
                <label for="nama_kriteria" class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-8">
                    <div class="col-sm-8">
                        <select class="form-control" name="tahun">
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022" selected="selected">2022</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a href="/periode" class="btn btn-danger">Batal</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>