<!-- Small Box (Stat card) -->
      <h5 class="mb-2 mt-4">MENU DASHBOARD</h5>
      <div class="row">
      <?php $role = $this->db->get_where('auth_role',['id !=' => 1])->result_array();?>
        <?php foreach ($role as $key => $value) { ?>
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3></h3>

              <p><?php echo strtoupper($value['role']); ?></p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <?php }?>
      </div>
      <!-- /.row -->
