<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content'); ?>

<div class="container">
    <h1>Periode</h1>
    <a class="btn btn-primary" href="<?= base_url("/periode/add") ?>" role="button"> Tambah Data Periode Baru</a>
    <br><br>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col">
            <table id="periode" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($periode as $key) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $key['tahun']; ?></td>
                            <td><a href="/periode/ubah/<?= $key['id_periode']; ?>" class="btn btn-warning">edit</a>
                                <form action="/periode/<?= $key['id_periode']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Mau Menghapus Data Ini !!!')">hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#periode').DataTable();
    });
</script>
<?= $this->endSection(); ?>