    <!-- Left Sidebar admin-->
    <div class="left main-sidebar">
        <div class="sidebar-inner leftscroll">
            <div id="sidebar-menu">
                <ul>
                    <li class="submenu">
                        <a <?php echo $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('dashboard'); ?>">
                            <i class="fas fa-bars"></i>
                            <span>DASHBOARD</span>
                        </a>
                    </li>

                    <li class="submenu">
                            <a href="#">
                                <span class="label radius-circle bg-primary float-right">0</span>
                                <i class="fas fa-indent"></i>
                                <span> MACHINERY </span>
                            </a>
                            <ul>
                                <li>
                                <a <?php echo $this->uri->segment(1) == 'machinery' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('machinery'); ?>">
                                        <span>- List Machinery</span>
                                    </a>
                                </li>
                                
                                <!-- <li>
                                <a <?php echo $this->uri->segment(1) == 'import_machinery' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('import_machinery'); ?>">
                                        <span>- Import Machinery</span>
                                    </a>
                                </li> -->

                                <!-- <li>
                                <a <?php echo $this->uri->segment(1) == 'machinery' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('machinery'); ?>">
                                        <span>- Vendor</span>
                                    </a>
                                </li> -->
                                <!-- <li class="submenu">
                                    <a href="#">
                                        <span># Pre Requisition Form</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span>- Submit & Form Request</span>
                                            </a>
                                        </li>
                                        <li>
                                        <a <?php echo $this->uri->segment(1) == 'pre_requisition' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('pre_requisition'); ?>">
                                                <span>- Submit & Form Request</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>- Status</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li> -->

                                <!-- <li class="submenu">
                                    <a href="#">
                                        <span># Machinery Receipt</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span>- Purchase Order</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>- List Machinery Receipt</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>- Machinery Receipt Slip</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li> -->
                            </ul>
                    </li>

                    <li class="submenu">
                            <a href="#">
                                <span class="label radius-circle bg-primary float-right">0</span>
                                <i class="fas fa-indent"></i>
                                <span> SPARE PART </span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <span>- Vendor</span>
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="#">
                                        <span># Pre Requisition Form</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span>- Submit & Form Request</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>- Status</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="submenu">
                                    <a href="#">
                                        <span># Spare part Receipt</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span>- Purchase Order</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>- List Spare Part Receipt</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>- Spare Part Receipt Slip</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="submenu">
                                    <a href="#">
                                        <span># Spare Part Issue</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span>- Inventory Order</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>- List Inventory Order</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>- Spare Part Issue Slip</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                    </li>



                    <li class="submenu">
                            <a href="#">
                                <span class="label radius-circle bg-primary float-right">0</span>
                                <i class="fas fa-indent"></i>
                                <span> MATERIAL </span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <span>- Vendor</span>
                                    </a>
                                </li>
                                <li class="submenu">
                                    <a href="#">
                                        <span># Inventory Request</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span>- Submit & Form Request</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>- Status</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="submenu">
                                    <a href="#">
                                        <span># Material Receipt</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span>- Purchase Order</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>- Item Identity Tag</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>- Form Put Away</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <span>- Material Receipt Slip</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="submenu">
                                    <a href="#">
                                        <span># Transfer To Production</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span>- Process Order</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>- Tag Pallet Material</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>- Form Put Away</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                    </li>

                    <li class="submenu">
                            <a href="#">
                                <span class="label radius-circle bg-primary float-right">0</span>
                                <i class="fas fa-indent"></i>
                                <span> PURCHASE REQUEST</span>
                            </a>
                            <ul>
                                
                                <li>
                                    <a href="#">
                                        <span>- Add Requisition List</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <span>- Purchase Requisition List</span>
                                    </a>
                                </li>

                            </ul>
                    </li>


                    <li class="submenu">
                            <a href="#">
                                <span class="label radius-circle bg-primary float-right">0</span>
                                <i class="fas fa-indent"></i>
                                <span> PURCHASE ORDER </span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <span>- Add Purchase Order</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>- Purchase Orders List</span>
                                    </a>
                                </li>
                            </ul>
                    </li>

                    <li class="submenu">
                            <a href="#">
                                <span class="label radius-circle bg-primary float-right">0</span>
                                <i class="fas fa-indent"></i>
                                <span> DELIVERY ORDER </span>
                            </a>
                            <ul>
                                <!-- <li>
                                    <a href="#">
                                        <span>- Add Delivery Order</span>
                                    </a>
                                </li> -->
                                <li>
                                    <a href="#">
                                        <span>- List Delivery Order</span>
                                    </a>
                                </li>
                            </ul>
                    </li>

                    <li class="submenu">
                            <a href="#">
                                <span class="label radius-circle bg-primary float-right">0</span>
                                <i class="fas fa-indent"></i>
                                <span> STOCK </span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <span>- Add Item Stock</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>- Restock Items</span>
                                    </a>
                                </li>
                            </ul>
                    </li>

                    <li class="submenu">
                            <a href="#">
                                <span class="label radius-circle bg-primary float-right">0</span>
                                <i class="fas fa-indent"></i>
                                <span> DISPATCH </span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <span>- Dispatch Items</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>- View Dispatches</span>
                                    </a>
                                </li>
                            </ul>
                    </li>

                    <li class="submenu">
                            <a href="#">
                                <span class="label radius-circle bg-primary float-right">0</span>
                                <i class="fas fa-indent"></i>
                                <span> SALES ORDER </span>
                            </a>
                            <ul>
                                <!-- <li>
                                    <a href="#">
                                        <span>- Add Sales Order</span>
                                    </a>
                                </li> -->
                                <li>
                                    <a href="#">
                                        <span>- List Sales Order</span>
                                    </a>
                                </li>
                            </ul>
                    </li>

                    <li class="submenu">
                            <a href="#">
                                <span class="label radius-circle bg-primary float-right">0</span>
                                <i class="fas fa-indent"></i>
                                <span> PRODUCTS </span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <span>- Add Product</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>- View Stock Item</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <span>- Data File</span>
                                    </a>
                                </li>
                            </ul>
                    </li>

                    <li class="submenu">
                            <a href="#">
                                <span class="label radius-circle bg-primary float-right">0</span>
                                <i class="fas fa-indent"></i>
                                <span> PRODUCT CATEGORY</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <span>- Add Category</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>- View Categories</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <span>- Production Category</span>
                                    </a>
                                </li>
                            </ul>
                    </li>

                    <li class="submenu">
                        <a id="tables" href="#">
                                <i class="fas fa-indent"></i>
                                <span> LOCATION </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="list-unstyled">
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'ref_location_factory' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('ref_location_factory'); ?>">- Factory Location </a>
                            </li>
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'ref_zone_division' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('ref_zone_division'); ?>">- Zone</a>
                            </li>                          
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'ref_area_zone' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('ref_area_zone'); ?>">- Area</a>
                            </li>
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'ref_room_zone' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('ref_room_zone'); ?>">- Room</a>
                            </li>
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'ref_rack_location' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('ref_rack_location'); ?>">- Rack Location</a>
                            </li>
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'ref_rack_level' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('ref_rack_level'); ?>">- Rack Level</a>
                            </li>

                            </ul>
                    </li>

                    <li class="submenu">
                        <a id="tables" href="#">
                            <i class="fas fa-indent"></i>
                            <span> SUPPLIERS </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="list-unstyled">
                            <!-- <li>
                                <a <?php echo $this->uri->segment(1) == 'barang_masuk' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('barang_masuk'); ?>">- Add Supplier</a>
                            </li> -->
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'suppliers' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('suppliers'); ?>">- List Suppliers</a>
                            </li>
                        </ul>
                    </li>


                    <li class="submenu">
                        <a id="tables" href="#">
                            <i class="fas fa-indent"></i>
                            <span> INVOICE </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="list-unstyled">
                            <!-- <li>
                                <a <?php echo $this->uri->segment(1) == 'barang_masuk' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('barang_masuk'); ?>">- Add Invoice</a>
                            </li> -->
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'barang_keluar' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('barang_keluar'); ?>">- List Invoice</a>
                            </li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a id="tables" href="#">
                            <i class="fas fa-indent"></i>
                            <span> PAYMENTS</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="list-unstyled">
                            <!-- <li>
                                <a <?php echo $this->uri->segment(1) == 'barang_masuk' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('barang_masuk'); ?>">- Add Payments</a>
                            </li> -->
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'payment_credits' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('payment_credits'); ?>">- List Payments</a>
                            </li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a id="tables" href="#">
                            <i class="fas fa-indent"></i>
                            <span> PERMIT IN OUT</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="list-unstyled">
                            <!-- <li>
                                <a <?php echo $this->uri->segment(1) == 'barang_masuk' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('barang_masuk'); ?>">- Add Payments</a>
                            </li> -->
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'permit_in_out' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('permit_in_out'); ?>">- List Permit In Out</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="submenu">
                        <a id="tables" href="#">
                            <i class="fas fa-indent"></i>
                            <span> DEPARTMENTS</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="list-unstyled">
                            <!-- <li>
                                <a <?php echo $this->uri->segment(1) == 'barang_masuk' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('barang_masuk'); ?>">- Add Department</a>
                            </li> -->
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'departments' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('departments'); ?>">- Department & Buget</a>
                            </li>
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'employee' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('employee'); ?>">- List Employee</a>
                            </li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a id="tables" href="#">
                            <i class="fas fa-indent"></i>
                            <span> MASTER DATA </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="list-unstyled">
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'barang_masuk' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('barang_masuk'); ?>">- Machinery</a>
                            </li>
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'barang_keluar' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('barang_keluar'); ?>">- Spare Part</a>
                            </li>
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'ref_materials' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('ref_materials'); ?>">- Materials</a>
                            </li>
                            <li>
                                <a href="#">- Finished Product</a>
                            </li>
                            <li>
                                <a href="#">- Supplier</a>
                            </li>
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'ref_driver' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('ref_driver'); ?>">- Driver</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="submenu">
                        <a id="tables" href="#">
                            <i class="fas fa-indent"></i>
                            <span> REPORTS </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">- Report Machinery</a>
                            </li>
                            <li>
                                <a href="#">- Report Spare Part</a>
                            </li>
                            <li>
                                <a href="#">- Report Material</a>
                            </li>
                            <li>
                                <a href="#">- Report Purchase</a>
                            </li>
                            <li>
                                <a href="#">- Report Products</a>
                            </li>
                            <li>
                                <a href="#">- Report Delivery</a>
                            </li>
                            <li>
                                <a href="#">- Report Stock</a>
                            </li>
                            <li>
                                <a href="#">- Report Orders</a>
                            </li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#">
                            <i class="fas fa-indent"></i>
                            <span> ACCOUNTS USERS</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">- Users Departments</a>
                            </li>
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'account_user' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('account_user'); ?>">- Users Accounts</a>
                            </li>
                            <li>
                                <a <?php echo $this->uri->segment(1) == 'menu' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('menu'); ?>">- Menu Accounts</a>
                            </li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a <?php echo $this->uri->segment(1) == 'logout' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> href="<?php echo base_url('auth/logout'); ?>">
                            <i class="fas fa-power-off tombol-logout"></i>
                            <span>EXIT </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar admin-->
