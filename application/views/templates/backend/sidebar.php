<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">

            <!-- QUERY MENU -->
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
            <!-- LOOPING MENU -->
            <?php foreach ($menu as $m) : ?>
                <li><a><?= $m['menu']; ?></a>
                </li>

                <!-- SUB MENU SESUAI MENU -->


                <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
FROM `user_sub_menu` JOIN `user_menu`
ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
WHERE `user_sub_menu`.`menu_id` = $menuId
AND `user_sub_menu`.`is_active` = 1
";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
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

                <?php endforeach; ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                        <i class="fa fa-sign-out"></i>
                        <span>Keluar</span></a>
                </li>

                <!-- Divider -->

                <!-- Sidebar Toggler (Sidebar) -->
                </li>
        </ul>
    </div>
</div>
</div>
</div>