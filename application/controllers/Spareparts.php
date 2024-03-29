<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Spareparts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('spareparts_model');
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

        $data['spareparts']         = $this->spareparts_model->get_all('id', 'asc');
        $data['title']              = 'Spare Part';

        $data['driver']             = $this->ref_driver_model->get_all_order_by('id', 'asc');
        $data['suppliers']          = $this->suppliers_model->get_all_order_by('id', 'asc');
        $data['factory_location']   = $this->ref_location_factory_model->get_all_order_by('id', 'asc');
        $data['zone_division']      = $this->ref_zone_division_model->get_all_order_by('id', 'asc');
        $data['area_zone']          = $this->ref_area_zone_model->get_all_order_by('id', 'asc');
        $data['room_zone']          = $this->ref_room_zone_model->get_all_order_by('id', 'asc');
        $data['rack_location']      = $this->ref_rack_location_model->get_all_order_by('id', 'asc');
        $data['level_rack']         = $this->ref_rack_level_model->get_all_order_by('id', 'asc');
        
                     
        //Global Location Number
        $kode = 'GLN-SPT';
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');
        $d = date('d', strtotime($tanggal));
        $m = date('m', strtotime($tanggal));
        $y = date('y', strtotime($tanggal));
        $yx = date('Y', strtotime($tanggal));

        $last_code = $this->spareparts_model->get_last_code($d, $m, $yx);
        if ($last_code > 0) {
            $l_code = substr($last_code['gln_spt_in'], -4);
            $count = (int)$l_code + 1;
        } else {
            $count = 1;
        }
        $count = str_pad($count, 4, '0', STR_PAD_LEFT);

        $data['gln_spt_in'] = $kode . $d . $m . $y . '-' . $count;
        //END NO
    
        $this->template->load('template_neura/index', 'spareparts/index', $data);
    }

    public function view($id){
        $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['spareparts'] = $this->spareparts_model->view($id);
        $data['title'] = 'View Spare Part';
        $data['title_foto'] = 'View Spare Part';
        $data['title_supplier'] = 'Identitas Supplier';

        $this->template->load('template_neura/index', 'spareparts/view', $data);

    }

    
    public function add()
    {

        $this->form_validation->set_rules('gln_spt_in', 'GLN', 'required|trim');
        $this->form_validation->set_rules('origin', 'Origin', 'required|trim');
        $this->form_validation->set_rules('supplier_id', 'Serial Number', 'required|trim');
        $this->form_validation->set_rules('parts_name', 'Parts Name', 'required|trim');
        $this->form_validation->set_rules('parts_number', 'Parts Number', 'required|trim');
        $this->form_validation->set_rules('machinery_name', 'Machinery Name', 'required|trim');
        $this->form_validation->set_rules('unit_of_measurment', 'Unit Of Measurment', 'required|trim');
        $this->form_validation->set_rules('qty', 'Qty', 'required|trim');
        $this->form_validation->set_rules('critical', 'Critical', 'required|trim');
        $this->form_validation->set_rules('minimum_stock', 'Minimum Stock', 'required|trim');
        $this->form_validation->set_rules('maximum_stock', 'Maximum Stock', 'required|trim');
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

            $data['spareparts'] = $this->spareparts_model->get_all_order_by('id', 'desc');
            $data['title'] = 'spareparts';

            $this->session->set_flashdata('required', 'not complete');
            $this->template->load('template_neura/index', 'spareparts/index', $data);
        } else {

            $gln_spt_in               = htmlspecialchars($this->input->post('gln_spt_in'));
            $origin                   = htmlspecialchars($this->input->post('origin'));
            $supplier_id              = htmlspecialchars($this->input->post('supplier_id'));
            $parts_name               = htmlspecialchars($this->input->post('parts_name'));
            $parts_number             = htmlspecialchars($this->input->post('parts_number'));
            $machinery_name           = htmlspecialchars($this->input->post('machinery_name'));
            $unit_of_measurment       = htmlspecialchars($this->input->post('unit_of_measurment'));
            $qty                      = htmlspecialchars($this->input->post('qty'));
            $critical                 = htmlspecialchars($this->input->post('critical'));
            $minimum_stock            = htmlspecialchars($this->input->post('minimum_stock'));
            $maximum_stock            = htmlspecialchars($this->input->post('maximum_stock'));
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
            // $dokumen                  = htmlspecialchars($this->input->post('dokumen'));

            // $config['upload_path']          = './uploads/';
            // $config['allowed_types']        = 'pdf';
            // $config['max_size']             = 1024;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 1024;

            // $this->load->library('upload', $config);
            // if (!$this->upload->do_upload('dokumen')) {
            //     $this->session->set_flashdata('upload', $this->upload->display_errors());
            //     redirect('spareparts');
            // } else {
            //     $image_data     = $this->upload->data();
            //     $imgdata        = file_get_contents($image_data['full_path']);
            //     $file_encode    = base64_encode($imgdata);

                $data = array(
                    'gln_spt_in'             => $gln_spt_in,
                    'origin'                 => $origin,
                    'supplier_id'            => $supplier_id,
                    'parts_name'             => $parts_name,
                    'parts_number'           => $parts_number,
                    'machinery_name'         => $machinery_name,
                    'unit_of_measurment'     => $unit_of_measurment,
                    'qty'                    => $qty,
                    'critical'               => $critical,
                    'minimum_stock'          => $minimum_stock,
                    'maximum_stock'          => $maximum_stock,
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
                    'description'            => $description,
                    'created_by'             => $this->session->fullname
                    // 'tipe_dokumen'           => $this->upload->data('file_type'),
                    // 'ukuran_dokumen'         => $this->upload->data('file_size'),
                    // 'dokumen'                => $file_encode,
                    // 'origin_dokumen'         => $this->upload->data('file_name')

                );

                $insert = $this->spareparts_model->insert($data);
                // unlink($image_data['full_path']);

                if ($insert) {
                    $this->session->set_flashdata('message', 'Success');
                    redirect('spareparts');
                } else {
                    $this->session->set_flashdata('message', 'Failed');
                    redirect('spareparts');
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
					$origin               = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$supplier_id          = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$parts_name           = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$parts_number         = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$machinery_name       = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$unit_of_measurment   = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$qty                  = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$critical             = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$minimum_stock        = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$maximum_stock        = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$made_in              = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$factory_location_id  = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$zone_division_id     = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$area_zone_id         = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
					$room_area_id         = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
					$rack_location_id     = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
					$rack_level_id        = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
					$packing_list         = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
					$container_number     = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
					$driver_id            = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
					$description          = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                    $date_created         = date('Y-m-d H:i:s');

                     //Global Location Number
                    $kode = 'GLN-SPT';
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d H:i:s');
                    $d = date('d', strtotime($tanggal));
                    $m = date('m', strtotime($tanggal));
                    $y = date('y', strtotime($tanggal));
                    $yx = date('Y', strtotime($tanggal));

                    $last_code = $this->spareparts_model->get_last_code($d, $m, $yx);
                    if ($last_code > 0) {
                        $l_code = substr($last_code['gln_spt_in'], -4);
                        $count = (int)$l_code + 1;
                    } else {
                        $count = 1;
                    }
                    $count = str_pad($count, 4, '0', STR_PAD_LEFT);
                    $gln_spt_in = $kode . $d . $m . $y . '-' . $count;
                    //END NO

					$temp_data[] = array(
						'gln_spt_in'	        => $gln_spt_in,
						'origin'	            => $origin,
						'supplier_id'	        => $supplier_id,
						'parts_name'	        => $parts_name,
						'parts_number'	        => $parts_number,
						'machinery_name'	    => $machinery_name,
						'unit_of_measurment'    => $unit_of_measurment,
						'qty'	                => $qty,
						'critical'	            => $critical,
						'minimum_stock'	        => $minimum_stock,
						'maximum_stock'	        => $maximum_stock,
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
                        'created_by'            => $this->session->fullname,
						'date_created'	        => $date_created
					); 	
				}
			}

			$insert = $this->spareparts_model->insert_excel($temp_data);
			// if($insert){
			// 	$this->session->set_flashdata('message', '<span class="glyphicon glyphicon-ok"></span> Data Successfully Imported to Database');
			// 	redirect($_SERVER['HTTP_REFERER']);
			// }else{
			// 	$this->session->set_flashdata('message', '<span class="glyphicon glyphicon-remove"></span> There is an error');
			// 	redirect($_SERVER['HTTP_REFERER']);
			// }
            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('spareparts');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('spareparts');
            }
		}else{
			// echo "No incoming files";
            $this->session->set_flashdata('message', 'Failed');
            redirect('spareparts');
		}
	}


    public function delete($id)
    {

        $delete = $this->spareparts_model->delete($id);

        if ($delete) {
            redirect('spareparts');
        } else {
            redirect('spareparts');
        }
    }


    public function edit($id)
    {
        $gln_spt_in               = $this->input->post('gln_spt_in');
        $origin                   = $this->input->post('origin');
        $supplier_id              = $this->input->post('supplier_id');
        $parts_name               = $this->input->post('parts_name');
        $parts_number             = $this->input->post('parts_number');
        $machinery_name           = $this->input->post('machinery_name');
        $unit_of_measurment       = $this->input->post('unit_of_measurment');
        $qty                      = $this->input->post('qty');
        $critical                 = $this->input->post('critical');
        $minimum_stock            = $this->input->post('minimum_stock');
        $maximum_stock            = $this->input->post('maximum_stock');
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
        $date_update              = date('Y-m-d H:i:s');

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
                'gln_spt_in'	        => $gln_spt_in,
                'origin'	            => $origin,
                'supplier_id'	        => $supplier_id,
                'parts_name'	        => $parts_name,
                'parts_number'	        => $parts_number,
                'machinery_name'	    => $machinery_name,
                'unit_of_measurment'    => $unit_of_measurment,
                'qty'	                => $qty,
                'critical'	            => $critical,
                'minimum_stock'	        => $minimum_stock,
                'maximum_stock'	        => $maximum_stock,
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
                'update_by'             => $this->session->fullname,
                'date_update'	        => $date_update

            );

            $update = $this->spareparts_model->update($id, $data);
            // unlink($image_data['full_path']);

            if ($update) {
                $this->session->set_flashdata('message', 'Success');
                redirect('spareparts');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('spareparts');
            }
        // }
    }


    public function publish($id)
    {
        $data = array(
            'status'               => 1,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->spareparts_model->update($id, $data);
        if ($update) {
            redirect('spareparts');
        } else {
            redirect('spareparts');
        }
    }


    public function unpublish($id)
    {
        $data = array(
            'status'               => 0,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->spareparts_model->update($id, $data);
        if ($update) {
            redirect('spareparts');
        } else {
            redirect('spareparts');
        }
    }
}
