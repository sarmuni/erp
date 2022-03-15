<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login';

            // $this->load->view('templates/auth_header', $data);
            $this->load->view('login/login', $data);
            // $this->load->view('templates/auth_footer');
        } else {

            $this->_login();
        }
    }

    private function _login()
    {
        $email          = $this->input->post('email');
        $password       = $this->input->post('password');

        $user = $this->db->get_where('auth_user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {

                if (password_verify($password, $user['password'])) {

                    $data = [
                        'email'         => $user['email'],
                        'role_id'       => $user['role_id'],
                        'id'            => $user['id'],
                        'fullname'      => $user['fullname'],
                        'person_id'      => $user['person_id']
                    ];
                    // 1.Administrator
                    // 2.Board of Director
                    // 3.Factory Management
                    // 4.Quality Assurance
                    // 5.Production
                    // 6.Engineer
                    // 7.HR & GA
                    // 8.Finance
                    // 9.Warehouse
                    // 10.Building Management
                    // 11.Internal Security
                    // 12.Supply Chain
                    // 13.Information Technology

                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('administrator');
                    } else {
                        redirect('user');
                    }

                } else {

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                    redirect('auth');
                }
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                This Email has not been activated!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
            redirect('auth');
        }
    }

    public function registration()
    {

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[auth_user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[confirmpassword]');
        $this->form_validation->set_rules('confirmpassword', 'ConfirmPassword', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Registration';
            $this->load->view('login/registration', $data);
        } else {

            $email = $this->input->post('email', true);
            $data = [
                'fullname'      => htmlspecialchars($this->input->post('fullname', true)),
                'phone'         => htmlspecialchars($this->input->post('phone', true)),
                'email'         => htmlspecialchars($email),
                'image'         => 'default.jpg',
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id'       => '3',
                'is_active'     => '0',
                'date_created'  => date('Y-m-d H:i:s')
            ];

            // token email url activated
            $token = base64_encode(random_bytes(64));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => date('Y-m-d H:i:s')

            ];

            $this->db->insert('auth_user', $data);
            $this->db->insert('auth_user_token', $user_token);

            $this->_sendEmail($token, 'activated');


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation ! your account has been created check email is activated.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
            redirect('auth');
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
        $this->email->from('autoreplay88@gmail.com', 'Auto Replay - Enterprise Resource Planning (ERP)');
        $this->email->to($this->input->post('email'));

        if ($type == 'activated') {
            $this->email->subject('Account Activcated');
            $this->email->message('Click this link to activate your account : <a href="' . base_url() . 'auth/activated?email=' . base64_encode($this->input->post('email')) . '&token=' . urlencode($token) . '">Activated</a>');
        } elseif ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . base64_encode($this->input->post('email')) . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            System error ! please contact administrator.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
            // redirect('auth');
            echo $this->email->print_debugger();
            // die;
        }

        // jika eror silahkan seting xampp local anda
        // atau bisa lihat di stackovervlow : https://fpt4owteclqaae6gi4qyytkx3a-adv7ofecxzh2qqi-stackoverflow-com.translate.goog/questions/21836282/php-function-mail-isnt-working/21836788 
    }

    public function activated()
    {
        // ambil dari url activated
        $email = base64_decode($this->input->get('email'));
        $token = $this->input->get('token');

        $user = $this->db->get_where('auth_user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('auth_user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (date('Y-m-d H:i:s') - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('auth_user');
                    $this->db->delete('auth_user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    ' . $email . ' has been activated! please login.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                    redirect('auth');
                } else {
                    $this->db->delete('auth_user', ['email' => $email]);
                    $this->db->delete('auth_user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Account activated failed! Wrong expierd.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Account activated failed! Wrong token.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Account activated failed! Wrong email.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
            redirect('auth');
        }
    }



    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
        redirect('auth');
    }

    public function forgotpassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Forgot Password';
            // $this->load->view('templates/auth_header', $data);
            // $this->load->view('auth/forgot_password');
            $this->load->view('login/forgot_password', $data);
            // $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('auth_user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(64));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => date('Y-m-d H:i:s')
                ];

                $this->db->insert('auth_user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Success, please check your email to reset password!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email is not registered or activated!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetpassword()
    {
        $email = base64_decode($this->input->get('email'));
        $token = $this->input->get('token');
        $user = $this->db->get_where('auth_user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('auth_user_token', ['token' => $token])->row_array();

            if ($user_token) {

                $this->session->set_userdata('reset_email', $email);
                $this->change_password();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Reset password failed! Wrong token.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                redirect('auth/forgotpassword');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset password failed! Wrong email.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
            redirect('auth/forgotpassword');
        }
    }

    public function change_password()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[confirmpassword]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|min_length[8]|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            // $this->load->view('templates/auth_header', $data);
            $this->load->view('login/change_password', $data);
            // $this->load->view('auth/change_password');
            // $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('auth_user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password has been changed! Please login.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
            redirect('auth');
        }
    }

    // public function blocked()
    // {
    //     $data['title'] = '403 Forbidden';
    //     $this->load->view('templates/auth_header', $data);
    //     $this->load->view('auth/blocked');
    //     $this->load->view('templates/auth_footer');
    // }
}
