<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content'); ?>

<div class="container">
    <h1>Karyawan</h1>
    <a class="btn btn-primary" href="<?= base_url("/karyawan/add") ?>" role="button"> Tambah Data Karyawan Baru</a>
    <br><br>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col">
            <table id="karyawan" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($karyawan as $key) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $key['nip']; ?></td>
                            <td><?= $key['nama']; ?></td>
                            <td><?= $key['jns_kel']; ?></td>
                            <td><?= $key['no_hp']; ?></td>
                            <td><?= $key['alamat']; ?></td>
                            <td><a href="/karyawan/ubah/<?= $key['id_karyawan']; ?>" class="btn btn-warning">edit</a>
                                <form action="/karyawan/<?= $key['id_karyawan']; ?>" method="post" class="d-inline">
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
        $('#karyawan').DataTable();
    });
</script>
<?= $this->endSection(); ?>