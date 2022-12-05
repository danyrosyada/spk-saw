<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content'); ?>

<div class="container">
    <h1>Kriteria</h1>
    <a class="btn btn-primary" href="<?= base_url("/kriteria/add") ?>" role="button"> Tambah Data Kriteria Baru</a>
    <br><br>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col">
            <table id="kriteria" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kriteria</th>
                        <th>Tipe</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($kriteria as $key) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $key['nama_kriteria']; ?></td>
                            <td><?= $key['tipe']; ?></td>
                            <td><a href="/kriteria/ubah/<?= $key['id_kriteria']; ?>" class="btn btn-warning">edit</a>
                                <form action="/kriteria/<?= $key['id_kriteria']; ?>" method="post" class="d-inline">
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
        $('#kriteria').DataTable();
    });
</script>
<?= $this->endSection(); ?>