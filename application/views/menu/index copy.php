    <!-- Modal -->
    <form method="POST" action="<?= base_url('menu'); ?>">
        <div class="modal fade" id="MenuModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content shadow">
                    <div class="modal-header">
                        <h5 class="header-title mb-0">Add Menu</h5>
                    </div>
                    <div class="modal-body text-center pr-4 pl-4">

                        <div class="form-group text-left">
                            <input type="text" name="menu" id="menu" class="form-control text-center" placeholder="Menu name">
                        </div>
                        <div class="form-group text-left">
                            <input type="text" name="description" id="description" class="form-control text-center" placeholder="Menu description">
                        </div>

                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-default btn-rounded btn-block col">SAVE</button>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal -->

    <div class="wrapper">
        <!-- header -->
        <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <button class="btn  btn-link text-dark menu-btn"><i class="material-icons">menu</i><span class="new-notification"></span></button>
                </div>
                <div class="col text-center"><img src="<?= base_url(); ?>assets/img/logo-header.png" alt="" class="header-logo"></div>
                <div class="col-auto">
                    <a href="notification.html" class="btn  btn-link text-dark position-relative"><i class="material-icons">notifications_none</i><span class="counts">9+</span></a>
                </div>
            </div>
        </div>
        <!-- header ends -->

        <div class="container">
            <div class="row mt-3">
                <div class="col-12 px-0">
                    <center>
                        <button class="btn btn-default btn-rounded-54 shadow" data-toggle="modal" data-target="#MenuModal"><i class="material-icons">add</i></button>
                    </center><br>

                    <?= form_error('menu', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>', '</div>'); ?>
                    <?= $this->session->flashdata('message'); ?>
                    <ul class="list-group list-group-flush mb-4">
                        <?php foreach ($menu as $m) { ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="text-dark mb-1"><?php echo $m['menu']; ?></h6>
                                        <p class="text-secondary mb-0 small"><?php echo $m['description']; ?></p>
                                    </div>
                                    <div class="col-2 pl-0 align-self-center text-right">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch<?php echo $m['id']; ?>" checked>
                                            <label class="custom-control-label" for="customSwitch<?php echo $m['id']; ?>"></label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>