<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url("/") ?>">#</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url("/") ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("/karyawan") ?>">Karyawan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("/kriteria") ?>">Kriteria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("/periode") ?>">Periode</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("/kriteriaperiode") ?>">Kriteria - Periode</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("/penilaian") ?>">Penilaian</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("/laporan") ?>">Laporan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>