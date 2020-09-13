<?php


class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user/Model_user');
    }

    //--------------------------------------------------------------------

    /**
     * Halaman login.
     */
    public function index()
    {

        $this->blade->render('login');
    }

    //--------------------------------------------------------------------

    /**
     * Proses login.
     */
    public function do_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user_db_admin = [];

        if ($username === null || $password === null) {
            $error = 'Pastikan username & password terisi';
            $this->session->set_flashdata('error_login', $error);
            redirect('login');
            return;
        }

        $user_db_admin = $this->Model_user->findWhere($username, 'username');

        if (!empty($user_db_admin)) {
            if (password_verify($password, $user_db_admin[0]->password) === false) {
                $error = 'Username atau Password salah';
                $this->session->set_flashdata('error_login', $error);
                redirect('login');
                return;
            }
            $session_array = [
                'id'         => $user_db_admin[0]->id,
                'username'   => $user_db_admin[0]->username,
                'email'      => $user_db_admin[0]->email,
                'nama'       => $user_db_admin[0]->nama,
                'telepon'    => $user_db_admin[0]->telepon,
                'image'       => $user_db_admin[0]->image,
                'level'    => (int) $user_db_admin[0]->level,
                'last_login' => $user_db_admin[0]->last_login,
                'total_login' => $user_db_admin[0]->total_login,
            ];
            $this->Model_user->update($user_db_admin[0]->id, ['last_login' => date('Y-m-d H:i:s'), 'total_login' => ((int) $user_db_admin[0]->total_login+1)]);
        } 
        else {

            $error = 'Username atau Password salah';
            $this->session->set_flashdata('error_login', $error);
            redirect('login');
            return;
        }

        $this->session->set_userdata($session_array);
        session_write_close();
        redirect('penduduk');
    }

    //--------------------------------------------------------------------

    /**
     * Proses logout
     */
    public function do_logout()
    {
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        redirect('login');
    }

    //--------------------------------------------------------------------
}