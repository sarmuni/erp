<!-- Quick Info -->
<div class="row">
<?php $role = $this->db->get_where('auth_role',['id !=' => 1])->result_array();?>
    <?php foreach ($role as $key => $value) { ?>
        
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
    <a href="">
        <div class="card-box noradius noborder bg-danger">
            <i class="fa fa-shopping-cart float-right text-white"></i>
            <h5 class="text-white text-uppercase m-b-20"><?php echo $value['role']; ?></h5>
            <br>
            <br>
            <span class="text-white">More Information</span>
        </div>
    </a>
    </div>

    
    
    <?php }?>
</div>
<!-- end Quick Info -->
