<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Class MY_Controller
 */
class MY_Controller extends CI_Controller
{
    protected $loginPath = 'login';
    protected $userdata;

    //--------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();

        // Copy userdata to local variable.
        $this->userdata = $this->session->userdata();
        // $this->checkPathMysql();
    }


    //--------------------------------------------------------------------

    protected function guardPage(array $allowed_roles)
    {
        $allowed_roles = array_flip($allowed_roles);

        if (!isset($allowed_roles[$this->userdata['level']])) {
            $this->show_403();
        }
    }

    //--------------------------------------------------------------------

    public function superadminOnly()
    {
        $this->guardPage([0]);
    }

    //--------------------------------------------------------------------

    /**
     *  Mengecek apakah pengguna sudah login atau belum.
     *
     * @return bool
     */
    public function isUserLoggedIn()
    {
        return isset($this->userdata['id']);
    }

    //--------------------------------------------------------------------

    /**
     * Redirect user ke halaman login bila belum login.
     */
    protected function authRedirect()
    {
        if (!$this->isUserLoggedIn()) {
            redirect($this->loginPath);
        }
    }

    //--------------------------------------------------------------------

    /**
     * Menampilkan eror 403.
     */
    protected function show_403()
    {
        show_error('Hak akses tidak mencukupi.', 403, 'Akses Dilarang!');
    }

    //--------------------------------------------------------------------

    /**
     * Menampilkan eror 404.
     */
    protected function show_404()
    {
        show_error('Cek kembali alamat tautan.', 404, 'Halaman Tidak Ditemukan!');
    }

    //--------------------------------------------------------------------

    /**
     * @param array $array
     */
    protected function sendJson($array)
    {
        $this->output->set_content_type('application/json')->set_output(json_encode($array));
    }

    //--------------------------------------------------------------------


    protected function responeJson($result, $msg)
    {

        /**
         * Proses replace null value
         *
         */

        $icon    = ($result) ? "success" : "error";
        $respone = ['success' => (bool) $result, 'msg' => $msg, 'icon' => $icon];
        $this->sendJson($respone);
    }


    //--------------------------------------------------------------------

    /**
     * Proses Upload Multiple File.
     *
     */
    public function uploadMultiFile($field, $path, $files, $i)
    {
        $_FILES[$field]['name']     = $files[$field]['name'][$i];
        $_FILES[$field]['type']     = $files[$field]['type'][$i];
        $_FILES[$field]['tmp_name'] = $files[$field]['tmp_name'][$i];
        $_FILES[$field]['error']    = $files[$field]['error'][$i];
        $_FILES[$field]['size']     = $files[$field]['size'][$i];

        $config = [
            'upload_path'   => $path,
            'allowed_types' => '*',
            'max_size'      => '0',
            'overwrite'     => false,
            'file_name'     => date('YmdHis').'_'.$files[$field]['name'][$i],
        ];

        $this->upload->initialize($config);
        if (!$this->upload->do_upload($field)) {
            $data['errors'] = $this->upload->display_errors();
            $filename       = '';
        } else {
            $data['errors'] = "SUCCESS";
            $file           = $this->upload->data();
            $filename       = $file['file_name'];
        }
        return $filename;
    }

    //--------------------------------------------------------------------

    /**
     * Proses Upload Single File.
     *
     */
    public function uploadSingleFile($field, $path, $files, $customName = '')
    {
        $_FILES[$field]['name']     = $files[$field]['name'];
        $_FILES[$field]['type']     = $files[$field]['type'];
        $_FILES[$field]['tmp_name'] = $files[$field]['tmp_name'];
        $_FILES[$field]['error']    = $files[$field]['error'];
        $_FILES[$field]['size']     = $files[$field]['size'];

        $customName = ($customName != '') ? $customName : $files[$field]['name'];

        $config = [
            'upload_path'   => $path,
            'allowed_types' => '*',
            'max_size'      => '0',
            'overwrite'     => false,
            'file_name'     => $customName,
        ];

        $this->upload->initialize($config);
        if (!$this->upload->do_upload($field)) {
            $data['errors'] = $this->upload->display_errors();
            $filename       = '';
        } else {
            $data['errors'] = "SUCCESS";
            $file           = $this->upload->data();
            $filename       = $file['file_name'];
        }
        return $filename;
    }

    //--------------------------------------------------------------------

    /**
     * Proses replace null value
     *
     */
    function replaceNull($value)
    {
        if (is_null($value) || $value === null || $value === '' || !isset($value)) {
            return null;
        }
        return $value;
    }

    //--------------------------------------------------------------------

    /**
     * Proses simpan log sistem
     *
     */
    function logStore($action = '', $label = '', $text = '', $addId = '')
    {

        # $action = ['login', 'logout', 'insert', 'update','delete', 'approve', 'reject'];
        $populateLog = [
            'action'     => $action,
            'label'      => $label,
            'text'       => $text,
            'add_id'     => $addId,
            'created_by' => $this->session->userdata('id'),
            'created_at' => date('Y:m:d H:m:s'),
        ];

        $this->log_sistem->insert($populateLog);
    }

    //--------------------------------------------------------------------

    /**
     * Proses get url
     *
     */
    function getUrl($string)
    {
        $string = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $string);
        $string = str_replace('(', '', $string);
        $string = str_replace(')', '', $string);
        $value  = str_replace(' ', '-', strtolower($string));
        return $value;
    }
    //--------------------------------------------------------------------

    public function writeExcel($writer, $sheet, $data, $dataHeader, $dataObject, $widthHeader)
    {
        ob_clean();
        $writer->writeSheetHeader($sheet.' - '.count($data), $dataHeader, $col_options = ['widths'=> $widthHeader]);
        foreach($data as $row){
            $writer->writeSheetRow($sheet.' - '.count($data), $dataObject );
        }        
    }

    //--------------------------------------------------------------------

    public function componentWeb($lang)
    {
        $data = [
            'bio_id' => 'Kampus Stipram',
            'bio_en' => 'Stipram Campus',
            'temu_id' => 'Temukan kami',
            'temu_en' => 'Find us',
            'kontak_id' => 'Hubungi kami',
            'kontak_en' => 'Contact us',
            'tracer_al_id' => 'Alumni',
            'tracer_al_en' => 'Alumni',
            'tracer_pl_id' => 'Pengguna Lulusan',
            'tracer_pl_en' => 'Graduate User',
        ];
        $data['logo'] = $this->m_logo->findId(1);
        $data['lang'] = $lang;
        $data['login'] = ($lang == 'id') ? 'Masuk' : 'Sign In';
        $data['url_login'] = ($lang == 'id') ? 'login' : 'login';
        $data['flag'] = ($lang == 'id') ? 'id' : 'gb';
        $data['menu'] = $this->m_menu->getmenu($lang);
        $data['link'] = $this->m_link->findAll();
        $data['kontak'] = $this->m_kontak->findId(1);

        return $data;
    }

}