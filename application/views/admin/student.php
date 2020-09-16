<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-4 pb-3">
            <div class="card">
                <div class="card-body bg-warning text-light shadow p-3 mb-0 rounded text-center">
                    <div class="col-12">
                        <h5 class="display-5">jumlah siswa tidak lulus: <?php echo $tidaklulus; ?><i
                                class="far fa-frown pl-3"></i>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 pb-3">
            <div class="card">
                <div class="card-body bg-success text-light shadow p-3 mb-0 rounded text-center">
                    <div class="col-12">
                        <h5 class="display-5">jumlah siswa lulus : <?php echo $SiswaKet; ?> <i
                                class="fas fa-user-graduate pl-5"></i>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 pb-3">
            <div class="card">
                <div class="card-body bg-primary text-light shadow p-3 mb-0 rounded text-center">
                    <div class="col-12">
                        <h5 class="display-5">jumlah siswa terdaftar : <?php echo $terdaftar; ?> <i
                                class="fas fa-users pl-3"></i>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="row">

        <div class="col-lg-6 pb-sm-3 pt-0 mb-0">
            <div class="card">
                <div class="card-body col-12 bg-gradient-light text-md-center shadow p-3 mb-0 rounded">
                    <h5 class="card-title text-dark display-5">Data Siswa yang Telah Registrasi</h5>
                    <hr class="pb-0">
                    <a href="#">
                        <h5 class="text-left pb-2">cetak</h5>
                    </a>
                    <table class="table table-hover table-responsive text-light pl-2 text-md-center">
                        <thead>

                            <tr class="text-dark">
                                <th scope="col">No</th>
                                <th scope="col">Nisn</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal Registrasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($User as $u) : ?>
                            <tr>
                                <th class="text-dark" scope="row"><?= $i; ?></th>
                                <td class="text-dark"><?= $u['nisn']; ?></td>
                                <td class="text-dark"><?= $u['name']; ?></td>
                                <td class="text-dark"><?= date('d F Y', $u['date_created']); ?></td>
                                <td class="text-dark">
                                    <a href="#">ubah</a>|<a href="#">Delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6 pt-0 pb-2 mb-5">
            <div class="card">
                <div class="card-body bg-gradient-light text-md-center pb-sm-2 shadow p-3 mb-0 rounded">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="card-title text-primary">Data Kelulusan Siswa</h5>
                            <hr>
                            <a href="<?= base_url('admin/preview'); ?>">
                                <h5 class="text-left pb-2">cetak</h5>
                            </a>
                            <table class="table table-hover table-responsive text-dark pl-2 text-md-center">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nisn</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Keterangan</th>
                                        <td scope="col">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($Siswa as $s) : ?>
                                    <tr class="text-dark">
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $s['nisn']; ?></td>
                                        <td><?= $s['name']; ?></td>

                                        <?php if ($s['keterangan'] == "lulus") : ?>
                                        <td class="text-success"><strong><?= $s['keterangan'] ?></strong></td>
                                        <?php elseif ($s['keterangan']  == "tidak lulus") : ?>
                                        <td class="text-danger"><strong><?= $s['keterangan'] ?></strong></td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="#">Ubah</a>|<a href="#">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->