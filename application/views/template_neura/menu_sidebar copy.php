<!-- Left Sidebar -->
<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">
            <ul>
                <?php
                $role_id = $this->session->userdata('role_id');
                $query_menu = "SELECT 
                a.id,
                a.menu,
                a.judul_menu,
                a.url,
                a.icon,
                a.description,
                a.is_active,
                b.add,
                b.edit,
                b.delete,
                b.view,
                b.print
                FROM auth_menu a  
                JOIN auth_user_access_menu b ON a.id = b.menu_id
                WHERE b.role_id=$role_id
                ORDER BY b.menu_id ASC";
                $menu = $this->db->query($query_menu)->result_array();
                ?>

                <?php foreach ($menu as $mu) : ?>
                    <?php if ($title == $mu['judul_menu']) {
                        $a = "active";
                    } else {
                        $a = '';
                    } ?>

                    <li class="submenu">
                        <a class="<?php echo $a; ?>" href="<?= base_url($mu['url']); ?>">
                            <i class="<?= $mu['icon']; ?>"></i>
                            <span><?= $mu['judul_menu']; ?> </span>
                        </a>
                    </li>

                    <?php
                    $menuID = $mu['id'];
                    $query_submenu = "                
                            SELECT 
                                        a.*
                                        FROM auth_sub_menu a
                                        JOIN auth_menu b ON a.menu_id = b.id
                                        JOIN auth_user_access_menu c ON a.`id`=c.menu_sub_id
                                        WHERE a.menu_id=$menuID AND a.is_active=1";
                    $submenu = $this->db->query($query_submenu)->result_array();
                    ?>
                    <?php foreach ($submenu as $smu) : ?>
                        <li>
                            <a href="<?= base_url($smu['url']); ?>">
                                <?= $smu['judul_sub_menu']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <!-- 
                <li class="submenu">
                    <a href="#">
                        <i class="fas fa-address-book"></i>
                        <span>Data Kurir </span>
                    </a>
                </li>

                <li class="submenu">
                    <a href="users.html">
                        <i class="fas fa-user"></i>
                        <span>Data Agen </span>
                    </a>
                </li>


                <li class="submenu">
                    <a href="blog.html">
                        <i class="fas fa-file-alt"></i>
                        <span>Master Daftar Harga </span>
                    </a>
                </li>

                <li class="submenu">
                    <a href="mail-all.html">
                        <span class="label radius-circle bg-danger float-right">18</span>
                        <i class="fas fa-envelope"></i>
                        <span> Master Barang </span>
                    </a>
                </li>

                <li class="submenu">
                    <a href="slider.html">
                        <i class="fas fa-photo-video"></i>
                        <span> Pengirim </span>
                    </a>
                </li>

                <li class="submenu">
                    <a href="charts.html">
                        <i class="fas fa-chart-line"></i>
                        <span> Penerima </span>
                    </a>
                </li>

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-table"></i>
                        <span> Barang </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="tables-basic.html">Barang Masuk</a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">Barang Keluar</a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">History Barang</a>
                        </li>
                    </ul>
                </li>



                <li class="submenu">
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <span> Acount User</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="ui-alerts.html">User Kurir</a>
                        </li>
                        <li>
                            <a href="ui-buttons.html">User Agen</a>
                        </li> -->
                <!-- <li>
                                    <a href="ui-cards.html">Cards</a>
                                </li>
                                <li>
                                    <a href="ui-carousel.html">Carousel</a>
                                </li>
                                <li>
                                    <a href="ui-collapse.html">Collapse</a>
                                </li>
                                <li>
                                    <a href="ui-icons.html">Icons</a>
                                </li>
                                <li>
                                    <a href="ui-modals.html">Modals</a>
                                </li>
                                <li>
                                    <a href="ui-tooltips.html">Tooltips and Popovers</a>
                                </li> -->
                <!-- </ul>
                </li>
                <li class="submenu">
                    <a target="_blank" href="http://localhost/template_neura/">
                        <i class="fas fa-th"></i>
                        <span> Nura24 Free Suite </span>
                    </a>
                </li> -->

                <!-- <li class="submenu">
                            <a href="#">
                                <i class="fab fa-wpforms"></i>
                                <span> Forms </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="forms-general.html">General Elements</a>
                                </li>
                                <li>
                                    <a href="forms-select2.html">Select2</a>
                                </li>
                                <li>
                                    <a href="forms-validation.html">Form Validation</a>
                                </li>
                                <li>
                                    <a href="forms-text-editor.html">Text Editors</a>
                                </li>
                                <li>
                                    <a href="forms-upload.html">Multiple File Upload</a>
                                </li>
                                <li>
                                    <a href="forms-datetime-picker.html">Date and Time Picker</a>
                                </li>
                                <li>
                                    <a href="forms-color-picker.html">Color Picker</a>
                                </li>
                            </ul>
                        </li> -->

                <!-- <li class="submenu">
                            <a href="#">
                                <i class="fas fa-file-image"></i>
                                <span> Multimedia </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="media-fancybox.html">
                                        <span class="label radius-circle bg-danger float-right">cool</span> Fancybox
                                    </a>
                                </li>
                                <li>
                                    <a href="media-masonry.html">Masonry</a>
                                </li>
                                <li>
                                    <a href="media-lightbox.html">Lightbox</a>
                                </li>
                                <li>
                                    <a href="media-owl-carousel.html">Owl Carousel</a>
                                </li>
                                <li>
                                    <a href="media-image-magnifier.html">Image Magnifier</a>
                                </li>
                            </ul>
                        </li> -->

                <!-- <li class="submenu">
                            <a href="#">
                                <i class="fas fa-star"></i>
                                <span> Plugins </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="star-rating.html">Star Rating</a>
                                </li>
                                <li>
                                    <a href="range-sliders.html">Range Sliders</a>
                                </li>
                                <li>
                                    <a href="tree-view.html">Tree View</a>
                                </li>
                                <li>
                                    <a href="sweetalert.html">SweetAlert</a>
                                </li>
                                <li>
                                    <a href="calendar.html">Calendar</a>
                                </li>
                                <li>
                                    <a href="counter-up.html">Counter-Up</a>
                                </li>
                            </ul>
                        </li> -->

                <!-- <li class="submenu">
                            <a href="#">
                                <i class="far fa-copy"></i>
                                <span> Example Pages </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="page-pricing-tables.html">Pricing Tables</a>
                                </li>
                                <li>
                                    <a href="page-timeline.html">Timeline</a>
                                </li>
                                <li>
                                    <a href="page-invoice.html">Invoice</a>
                                </li>
                                <li>
                                    <a href="page-blank.html">Blank Page</a>
                                </li>
                            </ul>
                        </li> -->

                <!-- <li class="submenu">
                            <a href="#">
                                <span class="label radius-circle bg-primary float-right">9</span>
                                <i class="fas fa-indent"></i>
                                <span> Menu Levels </span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <span>Second Level</span>
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="#">
                                        <span>Third Level</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span>Third Level Item</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>Third Level Item</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        <li class="submenu">
                            <a class="pro" href="pro.html">
                                <i class="fas fa-shopping-cart"></i>
                                <span> PRO Version </span>
                            </a>
                        </li>

                        

                        </li> -->

            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>
<!-- End Sidebar -->