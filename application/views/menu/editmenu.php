<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">

            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>


            <?= $this->session->flashdata('message'); ?>


            <div class="row">
                <div class="col-lg-4">
                    <?php foreach ($subMenu as $sm) : ?>
                    <form action="<?= base_url('menu/edit_menu'); ?>" method="POST">
                        <label for="id">id</label>
                        <input type="text" id="id" name="id" value="<?= $sm['id']; ?>" class="form-control">
                        <label for="title">title</label>
                        <input type="text" id="title" name="title" class="form-control">
                        <label for="menu_id">menu id</label>
                        <input type="text" id="menu_id" name="menu_id" class="form-control">
                        <label for="url">url</label>
                        <input type="text" id="url" name="url" class="form-control">
                        <label for="icon">icon</label>
                        <input type="text" id="icon" name="icon" class="form-control">
                        <label for="is_active">is aktif</label>
                        <input type="text" id="is_active" name="is_active" class="form-control">
                    </form>
                    <?php endforeach; ?>
                </div>
            </div>


        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->


<!-- end modal -->

<!-- editmenumodal -->