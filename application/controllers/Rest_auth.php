<?php
require APPPATH . '/libraries/REST_Controller.php';
class Rest_auth extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    // show data user methode get
    // http://localhost/logistik/rest_auth
    // http://localhost/logistik/rest_auth?id=1
    function user_get()
    {
        $id = $this->get('id');
        if ($id == '') {
            $user = $this->db->get('auth_user')->result();
        } else {
            $this->db->where('id', $id);
            $user = $this->db->get('auth_user')->result();
        }
        $this->response($user, 200);
    }

    // insert new data to user metode post parameter form urlencode
    // http://localhost/logistik/rest_auth/registrasi
    function registrasi_post()
    {
        $validasi = [
            [
                'field' => 'fullname',
                'label' => 'Fullname',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Masukan nama lengkap',
                    'min_length' => 'Minimum fullname length is 5 characters',
                    'alpha_dash' => 'You can only use a-z 0-9 _ . – characters for input',
                ],
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'You must provide a Password.',
                    'min_length' => 'Minimum Password length is 8 characters',
                ],
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email|is_unique[auth_user.email]',
                'errors' => [
                    'required' => 'email is registration',
                ],
            ],
            [
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'You must provide a phone.',
                    'min_length' => 'Minimum Phone length is 10 characters',
                ],
            ],
            [
                'field' => 'role_id',
                'label' => 'Role ID',
                'rules' => 'required',
                'errors' => [
                    'required' => 'You must provide a role ID.',
                ],
            ],
        ];

        $data_v = $this->input->get();
        $this->form_validation->set_data($data_v);
        $this->form_validation->set_rules($validasi);

        if ($this->form_validation->run() == false) {
            $this->response([
                'status' => FALSE,
                'message' => $this->form_validation->error_array()
            ], REST_Controller::HTTP_NOT_FOUND);
        } else {

            $fullname   = $data_v['fullname'];
            $email      = $data_v['email'];
            $password   = $data_v['password'];
            $phone      = $data_v['phone'];
            $role_id    = $data_v['role_id'];



            $data = array(
                'fullname'           => htmlspecialchars($fullname, true),
                'email'              => htmlspecialchars($email, true),
                'password'           => password_hash($password, PASSWORD_DEFAULT),
                'phone'              => htmlspecialchars($phone, true),
                'image'              => 'default.jpg',
                'role_id'            => 2,
                // 'role_id'            => htmlspecialchars($role_id, true),
                'is_active'          => 0,
                'date_created'       => date('Y-m-d H:i:s')
            );

            // token email url activated
            $token = base64_encode(random_bytes(64));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => date('Y-m-d H:i:s')

            ];

            $insert     = $this->db->insert('auth_user', $data);
            $insert     = $this->db->insert('auth_user_token', $user_token);

            $this->_sendEmail($token, 'activated');

            if ($insert == true) {
                // $this->response($data, 200);
                $this->response([
                    'status' => FALSE,
                    'message' => 'registration succses'
                ], REST_Controller::HTTP_OK);
            } else {
                // $this->response(array('status' => 'failed', 502));
                $this->response([
                    'status' => FALSE,
                    'message' => 'registration filed'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'autoreplay88@gmail.com',
            'smtp_pass' => 'Utami272688',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);
        $this->email->from('autoreplay88@gmail.com', 'Auto Replay');
        $this->email->to($this->input->get('email'));

        if ($type == 'activated') {
            $this->email->subject('Account Activcated');
            $this->email->message('Click this link to activate your account PT. Antaran Logistik : <a href="' . base_url() . 'auth/activated?email=' . base64_encode($this->input->get('email')) . '&token=' . urlencode($token) . '">Activated</a>');
        } elseif ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . base64_encode($this->input->get('email')) . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Mail server error please contact administrator'
            ], REST_Controller::HTTP_NOT_FOUND);
            echo $this->email->print_debugger();
            // die;
        }

        // jika eror silahkan seting xampp local anda
        // atau bisa lihat di stackovervlow : https://fpt4owteclqaae6gi4qyytkx3a-adv7ofecxzh2qqi-stackoverflow-com.translate.goog/questions/21836282/php-function-mail-isnt-working/21836788 
    }


    // update data user metode put dengan parameter no_resi form urlencode
    // http://localhost/logistik/rest_auth/
    function index_put()
    {
        $no_resi = $this->put('no_resi');
        $data = array(
            'no_resi'           => $this->post('no_resi'),
            'nama'              => $this->post('nama'),
            'no_ic_passport'    => $this->post('no_ic_passport'),
            'alamat'            => $this->post('alamat'),
            'hp'                => $this->post('hp')
        );
        $this->db->where('no_resi', $no_resi);
        $update = $this->db->update('tabel_user', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete user metode delete parameter no_resi form urlencode
    // http://localhost/logistik/rest_auth
    function index_delete()
    {
        $no_resi = $this->delete('no_resi');
        $this->db->where('no_resi', $no_resi);
        $delete = $this->db->delete('tabel_user');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
