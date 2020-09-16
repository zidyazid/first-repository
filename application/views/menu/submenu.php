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
            <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#MenuModal">Add New
                Submenu</a>


            <table class="table table-hover">
                <thead>
                    <tr>

                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Is Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($subMenu as $sm) : ?>

                    <tr>


                        <td><?= $sm['title']; ?></td>
                        <td><?= $sm['menu']; ?></td>
                        <td><?= $sm['url']; ?></td>
                        <td><?= $sm['icon']; ?></td>
                        <td><?= $sm['is_active']; ?></td>
                        <td>
                            <a href="<?= base_url('menu/edit_menu') . "?=" . $sm['id']; ?>" class="badge badge-warning"
                                data-toggle="modal" data-target="#EditMenuModal">edit</a>|<a class="badge badge-danger"
                                href="#">delete</a>
                        </td>

                    </tr>

                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="MenuModal" tabindex="-1" role="dialog" aria-labelledby="MenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MenuModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="<?= base_url('menu/submenu'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="menu title">
                    </div>
                    <div class="form-group">
                        <select class="custom-select" id="menu_id" name="menu_id">
                            <option selected>Select menu</option>
                            <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control" id="url" name="url" placeholder="menu url">
                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control" id="icon" name="icon" placeholder="menu icon">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="1" id="is_aktive"
                                name="is_active" checked>
                            <label class="custom-control-label" for="is_aktive">Is Active</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- end modal -->

<!-- editmenumodal -->
<div class="modal fade" id="EditMenuModal" tabindex="-1" role="dialog" aria-labelledby="EditMenuModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditMenuModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="<?= base_url('menu/edit_menu'); ?>">
                <?php foreach ($subMenu as $sm) : ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?= $sm['id']; ?>" id="id" name="id"
                            placeholder="menu id">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="menu title">
                    </div>
                    <div class="form-group">
                        <select class="custom-select" id="menu_id" name="menu_id">
                            <option selected>Select menu</option>
                            <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control" id="url" value="<?= $sm['url']; ?>" name="url"
                            placeholder="menu url">
                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control" id="icon" name="icon" placeholder="menu icon">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="1" id="is_aktive"
                                name="is_active" checked>
                            <label class="custom-control-label" for="is_aktive">Is Active</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?php endforeach; ?>
            </form>

        </div>
    </div>
</div>