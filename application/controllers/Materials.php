<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Materials extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('materials_model');
        $this->load->model('ref_driver_model');
        $this->load->model('suppliers_model');
        $this->load->model('ref_location_factory_model');
        $this->load->model('ref_zone_division_model');
        $this->load->model('ref_area_zone_model');
        $this->load->model('ref_room_zone_model');
        $this->load->model('ref_rack_location_model');
        $this->load->model('ref_rack_level_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['materials'] = $this->materials_model->get_all('id', 'asc');
        $data['title'] = ' Materials';

        $data['driver'] = $this->ref_driver_model->get_all_order_by('id', 'asc');
        $data['suppliers'] = $this->suppliers_model->get_all_order_by('id', 'asc');
        $data['factory_location'] = $this->ref_location_factory_model->get_all_order_by('id', 'asc');
        $data['zone_division'] = $this->ref_zone_division_model->get_all_order_by('id', 'asc');
        $data['area_zone'] = $this->ref_area_zone_model->get_all_order_by('id', 'asc');
        $data['room_zone'] = $this->ref_room_zone_model->get_all_order_by('id', 'asc');
        $data['rack_location'] = $this->ref_rack_location_model->get_all_order_by('id', 'asc');
        $data['level_rack'] = $this->ref_rack_level_model->get_all_order_by('id', 'asc');
        
                     
        //Global Location Number
        $kode = 'GLN-MT';
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');
        $d = date('d', strtotime($tanggal));
        $m = date('m', strtotime($tanggal));
        $y = date('y', strtotime($tanggal));
        $yx = date('Y', strtotime($tanggal));

        $last_code = $this->materials_model->get_last_code($d, $m, $yx);
        if ($last_code > 0) {
            $l_code = substr($last_code['gln_mt_in'], -4);
            $count = (int)$l_code + 1;
        } else {
            $count = 1;
        }
        $count = str_pad($count, 4, '0', STR_PAD_LEFT);

        $data['gln_mt_in'] = $kode . $d . $m . $y . '-' . $count;
        //END NO
        

        $this->template->load('template_neura/index', 'materials/index', $data);
    }

    // public function form()
    // {
    //     $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

    //     $data['materials'] = $this->materials_model->get_all_order_by('id', 'asc');
    //     $data['driver'] = $this->ref_driver_model->get_all_order_by('id', 'asc');
        
                     
    //     //Global Location Number
    //     $kode = 'GLN-MC';
    //     date_default_timezone_set('Asia/Jakarta');
    //     $tanggal = date('Y-m-d H:i:s');
    //     $d = date('d', strtotime($tanggal));
    //     $m = date('m', strtotime($tanggal));
    //     $y = date('y', strtotime($tanggal));
    //     $yx = date('Y', strtotime($tanggal));

    //     $last_code = $this->materials_model->get_last_code($d, $m, $yx);
    //     if ($last_code > 0) {
    //         $l_code = substr($last_code['gln_mt_in'], -4);
    //         $count = (int)$l_code + 1;
    //     } else {
    //         $count = 1;
    //     }
    //     $count = str_pad($count, 4, '0', STR_PAD_LEFT);

    //     $data['gln_mt_in'] = $kode . $d . $m . $y . '-' . $count;
    //     $data['title'] = 'Form materials';
    //     //END NO


    //     $this->template->load('template_neura/index', 'materials/form', $data);
    // }

    public function view($id){
        $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['materials'] = $this->materials_model->view($id);
        $data['title'] = 'View Materials';
        $data['title_foto'] = 'View materials';
        $data['title_supplier'] = 'Identitas Supplier';

        $this->template->load('template_neura/index', 'materials/view', $data);

    }

    
    public function add()
    {

        $this->form_validation->set_rules('gln_mt_in', 'Global Location Number', 'required|trim');
        $this->form_validation->set_rules('materials_name', 'Materials Name', 'required|trim');
        $this->form_validation->set_rules('catgeory_type', 'Category Type', 'required|trim');
        $this->form_validation->set_rules('origin', 'Origin', 'required|trim');
        $this->form_validation->set_rules('supplier_id', 'Supplier', 'required|trim');
        $this->form_validation->set_rules('materials_code', 'Materials Code', 'required|trim');
        $this->form_validation->set_rules('unit_of_measurment', 'Unit Of Measurment', 'required|trim');
        $this->form_validation->set_rules('qty', 'Qty', 'required|trim');
        $this->form_validation->set_rules('made_in', 'Made In', 'required|trim');
        $this->form_validation->set_rules('factory_location_id', 'Factory Location', 'required|trim');
        $this->form_validation->set_rules('zone_division_id', 'Zone Division', 'required|trim');
        $this->form_validation->set_rules('area_zone_id', 'Area Zone', 'required|trim');
        $this->form_validation->set_rules('room_area_id', 'Room Zone', 'required|trim');
        $this->form_validation->set_rules('rack_location_id', 'Rack Location', 'required|trim');
        $this->form_validation->set_rules('rack_level_id', 'Rack Level', 'required|trim');
        $this->form_validation->set_rules('packing_list', 'Packing List', 'required|trim');
        $this->form_validation->set_rules('container_number', 'Container Number', 'required|trim');
        $this->form_validation->set_rules('driver_id', 'Driver', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['materials'] = $this->materials_model->get_all_order_by('id', 'desc');
            $data['title'] = 'materials';

            $this->session->set_flashdata('required', 'not complete');
            $this->template->load('template_neura/index', 'materials/index', $data);
        } else {

            $gln_mt_in                = htmlspecialchars($this->input->post('gln_mt_in'));
            $materials_name           = htmlspecialchars($this->input->post('materials_name'));
            $catgeory_type            = htmlspecialchars($this->input->post('catgeory_type'));
            $origin                   = htmlspecialchars($this->input->post('origin'));
            $supplier_id              = htmlspecialchars($this->input->post('supplier_id'));
            $materials_code           = htmlspecialchars($this->input->post('materials_code'));
            $unit_of_measurment       = htmlspecialchars($this->input->post('unit_of_measurment'));
            $qty                      = htmlspecialchars($this->input->post('qty'));
            $made_in                  = htmlspecialchars($this->input->post('made_in'));
            $factory_location_id      = htmlspecialchars($this->input->post('factory_location_id'));
            $zone_division_id         = htmlspecialchars($this->input->post('zone_division_id'));
            $area_zone_id             = htmlspecialchars($this->input->post('area_zone_id'));
            $room_area_id             = htmlspecialchars($this->input->post('room_area_id'));
            $rack_location_id         = htmlspecialchars($this->input->post('rack_location_id'));
            $rack_level_id            = htmlspecialchars($this->input->post('rack_level_id'));
            $packing_list             = htmlspecialchars($this->input->post('packing_list'));
            $container_number         = htmlspecialchars($this->input->post('container_number'));
            $driver_id                = htmlspecialchars($this->input->post('driver_id'));
            $description              = htmlspecialchars($this->input->post('description'));


            // $config['upload_path']          = './uploads/';
            // $config['allowed_types']        = 'gif|jpg|png';
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            // $this->load->library('upload', $config);
            // if (!$this->upload->do_upload('foto')) {
            //     $this->session->set_flashdata('upload', $this->upload->display_errors());
            //     redirect('agen');
            // } else {
            //     $image_data = $this->upload->data();
            //     $imgdata = file_get_contents($image_data['full_path']);
            //     $file_encode = base64_encode($imgdata);

                $data = array(
                    'gln_mt_in'              => $gln_mt_in,
                    'materials_name'         => $materials_name,
                    'catgeory_type'          => $catgeory_type,
                    'origin'                 => $origin,
                    'supplier_id'            => $supplier_id,
                    'materials_code'         => $materials_code,
                    'unit_of_measurment'     => $unit_of_measurment,
                    'qty'                    => $qty,
                    'made_in'                => $made_in,
                    'factory_location_id'    => $factory_location_id,
                    'zone_division_id'       => $zone_division_id,
                    'area_zone_id'           => $area_zone_id,
                    'room_area_id'           => $room_area_id,
                    'rack_location_id'       => $rack_location_id,
                    'rack_level_id'          => $rack_level_id,
                    'packing_list'           => $packing_list,
                    'container_number'       => $container_number,
                    'driver_id'              => $driver_id,
                    'description'            => $description

                    // 'user_admin_dibuat'      => $this->session->role_id,
                    // 'tipe_foto'              => $this->upload->data('file_type'),
                    // 'ukuran_foto'            => $this->upload->data('file_size'),
                    // 'foto'                   => $file_encode,
                    // 'materials_name_foto'    => $this->upload->data('file_name')

                );

                $insert = $this->materials_model->insert($data);
                // unlink($image_data['full_path']);

                if ($insert) {
                    $this->session->set_flashdata('message', 'Success');
                    redirect('materials');
                } else {
                    $this->session->set_flashdata('message', 'Failed');
                    redirect('materials');
                }
            // }
        }
    }


    public function import_excel(){
		if (isset($_FILES["fileExcel"]["name"])) {
			$path           = $_FILES["fileExcel"]["tmp_name"];
			$object         = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow         = $worksheet->getHighestRow();
				// $highestColumn      = $worksheet->getHighestColumn();	
				for($row=2; $row<=$highestRow; $row++)
				{
					$materials_name       = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$catgeory_type        = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$origin               = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$supplier_id          = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$materials_code       = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$unit_of_measurment   = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$qty                  = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$made_in              = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$factory_location_id  = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$zone_division_id     = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$area_zone_id         = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$room_area_id         = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$rack_location_id     = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$rack_level_id        = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
					$packing_list         = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
					$container_number     = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
					$driver_id            = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
					$description          = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                    $date_created         = date('Y-m-d H:i:s');

                     //Global Location Number
                    $kode = 'GLN-MC';
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d H:i:s');
                    $d = date('d', strtotime($tanggal));
                    $m = date('m', strtotime($tanggal));
                    $y = date('y', strtotime($tanggal));
                    $yx = date('Y', strtotime($tanggal));

                    $last_code = $this->materials_model->get_last_code($d, $m, $yx);
                    if ($last_code > 0) {
                        $l_code = substr($last_code['gln_mt_in'], -4);
                        $count = (int)$l_code + 1;
                    } else {
                        $count = 1;
                    }
                    $count = str_pad($count, 4, '0', STR_PAD_LEFT);
                    $gln_mt_in = $kode . $d . $m . $y . '-' . $count;
                    //END NO

					$temp_data[] = array(
						'gln_mt_in'	            => $gln_mt_in,
						'materials_name'	    => $materials_name,
						'catgeory_type'	        => $catgeory_type,
						'origin'	            => $origin,
						'supplier_id'	        => $supplier_id,
						'materials_code'	    => $materials_code,
						'unit_of_measurment'    => $unit_of_measurment,
						'qty'	                => $qty,
						'made_in'	            => $made_in,
						'factory_location_id'	=> $factory_location_id,
						'zone_division_id'	    => $zone_division_id,
						'area_zone_id'	        => $area_zone_id,
						'room_area_id'	        => $room_area_id,
						'rack_location_id'	    => $rack_location_id,
						'rack_level_id'	        => $rack_level_id,
						'packing_list'	        => $packing_list,
						'container_number'	    => $container_number,
						'driver_id'	            => $driver_id,
						'description'	        => $description,
						'date_created'	        => $date_created
					); 	
				}
			}

			$insert = $this->materials_model->insert_excel($temp_data);
			// if($insert){
			// 	$this->session->set_flashdata('message', '<span class="glyphicon glyphicon-ok"></span> Data Successfully Imported to Database');
			// 	redirect($_SERVER['HTTP_REFERER']);
			// }else{
			// 	$this->session->set_flashdata('message', '<span class="glyphicon glyphicon-remove"></span> There is an error');
			// 	redirect($_SERVER['HTTP_REFERER']);
			// }
            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('materials');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('materials');
            }
		}else{
			// echo "No incoming files";
            $this->session->set_flashdata('message', 'Failed');
            redirect('materials');
		}
	}


    public function delete($id)
    {

        $delete = $this->materials_model->delete($id);

        if ($delete) {
            redirect('materials');
        } else {
            redirect('materials');
        }
    }


    public function edit($id)
    {
        $gln_mt_in                = $this->input->post('gln_mt_in');
        $materials_name           = $this->input->post('materials_name');
        $catgeory_type            = $this->input->post('catgeory_type');
        $origin                   = $this->input->post('origin');
        $supplier_id              = $this->input->post('supplier_id');
        $materials_code           = $this->input->post('materials_code');
        $unit_of_measurment       = $this->input->post('unit_of_measurment');
        $qty                      = $this->input->post('qty');
        $made_in                  = $this->input->post('made_in');
        $factory_location_id      = $this->input->post('factory_location_id');
        $zone_division_id         = $this->input->post('zone_division_id');
        $area_zone_id             = $this->input->post('area_zone_id');
        $room_area_id             = $this->input->post('room_area_id');
        $rack_location_id         = $this->input->post('rack_location_id');
        $rack_level_id            = $this->input->post('rack_level_id');
        $packing_list             = $this->input->post('packing_list');
        $container_number         = $this->input->post('container_number');
        $driver_id                = $this->input->post('driver_id');
        $description              = $this->input->post('description');


        // $config['upload_path']          = './uploads/';
        // $config['allowed_types']        = 'gif|jpg|png';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        // $this->load->library('upload', $config);
        // if (!$this->upload->do_upload('foto')) {
        //     $this->session->set_flashdata('upload', $this->upload->display_errors());
        //     redirect('agen');
        // } else {
        //     $image_data = $this->upload->data();
        //     $imgdata = file_get_contents($image_data['full_path']);
        //     $file_encode = base64_encode($imgdata);

            $data = array(
                'gln_mt_in'              => $gln_mt_in,
                    'materials_name'         => $materials_name,
                    'catgeory_type'          => $catgeory_type,
                    'origin'                 => $origin,
                    'supplier_id'            => $supplier_id,
                    'materials_code'         => $materials_code,
                    'unit_of_measurment'     => $unit_of_measurment,
                    'qty'                    => $qty,
                    'made_in'                => $made_in,
                    'factory_location_id'    => $factory_location_id,
                    'zone_division_id'       => $zone_division_id,
                    'area_zone_id'           => $area_zone_id,
                    'room_area_id'           => $room_area_id,
                    'rack_location_id'       => $rack_location_id,
                    'rack_level_id'          => $rack_level_id,
                    'packing_list'           => $packing_list,
                    'container_number'       => $container_number,
                    'driver_id'              => $driver_id,
                    'description'            => $description

            );

            $update = $this->materials_model->update($id, $data);
            // unlink($image_data['full_path']);

            if ($update) {
                $this->session->set_flashdata('message', 'Success');
                redirect('materials');
            } else {
                $this->session->set_flashdata('message', 'Field');
                redirect('materials');
            }
        // }
    }


    public function publish($id)
    {
        $data = array(
            'status'               => 1,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->agen_model->update($id, $data);
        if ($update) {
            redirect('agen');
        } else {
            redirect('agen');
        }
    }


    public function unpublish($id)
    {
        $data = array(
            'status'               => 0,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->agen_model->update($id, $data);
        if ($update) {
            redirect('agen');
        } else {
            redirect('agen');
        }
    }
}
