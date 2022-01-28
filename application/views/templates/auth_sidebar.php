<div class="sidebar">
    <div class="mt-4 mb-3">
        <div class="row">
            <div class="col-auto">
                <figure class="avatar avatar-60 border-0"><img src="<?= base_url('assets/img/') . $user['image']; ?>" alt="<?= $user['fullname']; ?>"></figure>
            </div>
            <div class="col pl-0 align-self-center">
                <h5 class="mb-1">
                    <?= $user['fullname']; ?>
                </h5>
                <p class="text-mute small"><?= $user['email']; ?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="list-group main-menu">

                <?php
                $role_id = $this->session->userdata('role_id');
                $query_menu = "SELECT auth_menu.id,menu
                                    FROM auth_menu JOIN auth_user_access_menu
                                    ON auth_menu.id = auth_user_access_menu.menu_id
                                    WHERE auth_user_access_menu.role_id=$role_id
                                    ORDER BY auth_user_access_menu.menu_id ASC";
                $menu = $this->db->query($query_menu)->result_array();
                ?>
                <?php foreach ($menu as $mu) : ?>
                    <!-- <?php echo $mu['menu']; ?> -->

                    <?php
                    $menuID = $mu['id'];
                    $query_submenu = "SELECT *
                                    FROM auth_sub_menu JOIN auth_menu
                                    ON auth_sub_menu.menu_id = auth_menu.id
                                    WHERE auth_sub_menu.menu_id=$menuID
                                    AND auth_sub_menu.is_active=1";
                    $submenu = $this->db->query($query_submenu)->result_array();
                    ?>

                    <?php foreach ($submenu as $smu) : ?>

                        <?php if ($title == $smu['judul_menu']) {
                            $a = "active";
                        } else {
                            $a = '';
                        } ?>

                        <a href="<?= base_url($smu['url']); ?>" class="list-group-item list-group-item-action <?php echo $a; ?> "><i class="material-icons icons-raised"><?= $smu['icon']; ?></i><?= $smu['judul_menu']; ?></a>
                    <?php endforeach; ?>

                <?php endforeach; ?>

                <!-- <a href="<?= base_url('user'); ?>" class="list-group-item list-group-item-action active"><i class="material-icons icons-raised">home</i>Home</a> -->
                <!-- <a href="notification.html" class="list-group-item list-group-item-action"><i class="material-icons icons-raised">notifications</i>Notification <span class="badge badge-dark text-white">2</span></a> -->
                <!-- <a href="alltransactions.html" class="list-group-item list-group-item-action"><i class="material-icons icons-raised">find_in_page</i>History</a> -->
                <!-- <a href="controls.html" class="list-group-item list-group-item-action"><i class="material-icons icons-raised">view_quilt<span class="new-notification"></span></i>Pages Controls</a> -->
                <!-- <a href="setting.html" class="list-group-item list-group-item-action"><i class="material-icons icons-raised">important_devices</i>Settings</a> -->
                <!-- <a href="javascript:void(0)" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#colorscheme"><i class="material-icons icons-raised">color_lens</i>Color scheme</a> -->
                <a href="<?= base_url('auth/logout'); ?>" class="list-group-item list-group-item-action"><i class="material-icons icons-raised bg-danger">power_settings_new</i>Logout</a>
            </div>
        </div>
    </div>
</div>
<a href="javascript:void(0)" class="closesidemenu"><i class="material-icons icons-raised bg-dark ">close</i></a>