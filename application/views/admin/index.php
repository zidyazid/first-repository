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
        <div class="col-lg-4 pb-4">
            <div class="card">
                <div class="card-body bg-gradient-info shadow p-3 mb-0 rounded pb-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('admin/index'); ?>" method="POST">
                                <h5 class="text-light">Input Data Kelulusan Siswa</h5>
                                <hr>
                                <div class="form-group">
                                    <label for="nisn" class="text-light">Nisn</label>
                                    <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Nisn">
                                    <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="text-light">Full Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="ket" class="text-light">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan"
                                        placeholder="Keterangan kelulusan siswa">
                                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 pb-4">
            <div class="card">
                <div class="card-body bg-gradient-light shadow p-3 mb-0 rounded pb-3 text-center">
                    Selamat Datang<br>
                    <h4> Diwebsite Sistem Informasi Kelulusan Ujian Nasional <br> ( walaupun UN ditiadakan :V) SMK Mana
                        Ajalah
                        Pekanbaru </h4>
                    <hr>

                    <p class="text-justify">
                        Pada Halaman ini Admin dapat melakukan penambahan data siswa yang berhasil atau yang gagal dalam
                        ujian nasional
                    </p>


                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->