<!-- Left Sidebar -->
<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

            <!-- <div class="card-body text-center">
                <div class="row">
                    <div class="lg-12">
                        <img alt="avatar" class="img-fluid" src="<?php echo base_url(); ?>uploads/avatar/<?php echo $user['image']; ?>">
                    </div>
                </div>

            </div>
    <hr> -->

        <div id="sidebar-menu">
            <ul>
            <?php 
            $role_id = $this->session->userdata('role_id');
            $queryMenu = " SELECT `auth_menu`.`id`, `menu`,icon,description
            FROM `auth_menu` JOIN `auth_user_access_menu`
              ON `auth_menu`.`id` = `auth_user_access_menu`.`menu_id`
           WHERE `auth_user_access_menu`.`role_id` = $role_id AND auth_menu.`id` !=25 AND auth_menu.type !=2
        ORDER BY `auth_menu`.`urutan` ASC";
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
                    <?php
                    $url = $this->uri->segment(1);
                     foreach ($subMenu as $sm) : ?>
                        <?php if ($url == $sm['url']) {
                            $active ="class='active'";
                        }else{
                            $active ="class=''";
                        } ?>

                        <li>
                            <a <?php echo $active; ?>href="<?= base_url($sm['url']); ?>"><?= $sm['title']; ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
             <?php endforeach; ?>
             <li class="submenu">
                        <a <?php echo $this->uri->segment(1) == 'logout' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('auth/logout'); ?>">
                            <i class="fas fa-power-off tombol-logout"></i>
                            <span>Exit</span>
                        </a>
                    </li>
            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>
<!-- End Sidebar -->