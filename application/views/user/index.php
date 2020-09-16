<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>
<div class="container">

    <div class="card mb-3" style="max-width: 540px;">
        <?php echo $this->session->flashdata('message') ?>
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Name : <?= $user['name']; ?></h5>
                    <p class="card-text">Nisn : <?= $user['nisn']; ?></p>
                    <p class="card-text"><small class="text-muted">Member since :
                            <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 ml-6">

            <form action="<?= base_url('user/cek_kelulusan'); ?>">
                <div class="form-group">
                    <label for="nisn">Your Nisn</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $user['nisn']; ?>"
                        readonly>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Check</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->