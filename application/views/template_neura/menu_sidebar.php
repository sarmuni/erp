<!-- Left Sidebar -->
<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">
            <ul>
            <?php 
            $role_id = $this->session->userdata('role_id');
            $queryMenu = " SELECT `auth_menu`.`id`, `menu`,icon,description
            FROM `auth_menu` JOIN `auth_user_access_menu`
              ON `auth_menu`.`id` = `auth_user_access_menu`.`menu_id`
           WHERE `auth_user_access_menu`.`role_id` = $role_id
        ORDER BY `auth_user_access_menu`.`menu_id` DESC";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <?php foreach ($menu as $m) : ?>
                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="<?= $m['icon']; ?>"></i>
                        <span> <?= $m['description']; ?> </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!-- SIAPKAN SUB-MENU SESUAI MENU -->
                        <?php 
                        $menuId = $m['id'];
                        $querySubMenu = "SELECT *
                                        FROM `auth_sub_menu` JOIN `auth_menu` 
                                            ON `auth_sub_menu`.`menu_id` = `auth_menu`.`id`
                                        WHERE `auth_sub_menu`.`menu_id` = $menuId
                                            AND `auth_sub_menu`.`is_active` = 1
                                    ";
                        $subMenu = $this->db->query($querySubMenu)->result_array();
                        ?>
                    
                    <ul class="list-unstyled">
                    <?php foreach ($subMenu as $sm) : ?>
                        <li>
                            <a href="<?= base_url($sm['url']); ?>"><?= $sm['title']; ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
             <?php endforeach; ?>
            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>
<!-- End Sidebar -->