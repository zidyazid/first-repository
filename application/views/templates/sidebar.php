<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a> -->
    <div class="text-center d-none d-md-inline pt-3 text-light">
        <span class="pb-2">Sistem Informasi Kelulusan</span>
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- query menu management -->
    <?php

    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                        FROM `user_menu` JOIN `user_access_menu` 
                          ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                       WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC
                       ";
    $menu = $this->db->query($queryMenu)->result_array();

    ?>



    <!-- Nav Item - Dashboard -->
    <!-- looping menu management -->

    <?php foreach ($menu as $m) : ?>
    <!-- menu -->
    <div class="sidebar-heading">
        <?= $m['menu']; ?>
    </div>
    <!-- sub menu -->
    <?php
        $menu_id = $m['id'];
        $querySubmenu = "SELECT *
                           FROM `user_sub_menu` JOIN `user_menu` 
                             ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                          WHERE `user_sub_menu`.`menu_id` = $menu_id
                            AND `user_sub_menu`.`is_active` = 1 
                          ";
        $subMenu = $this->db->query($querySubmenu)->result_array();
        ?>


    <?php foreach ($subMenu as $sm) : ?>
    <?php if ($title == $sm['title']) : ?>
    <li class="nav-item active">
        <?php else : ?>
    <li class="nav-item">
        <?php endif; ?>

        <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
            <i class="<?= $sm['icon']; ?>"></i>
            <span><?= $sm['title']; ?></span></a>
    </li>
    <?php endforeach; ?>
    <hr class="sidebar-divider mt-3">

    <?php endforeach; ?>
    <!-- end query sub menu -->


    <!-- Divider -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
</ul>
<!-- End of Sidebar -->