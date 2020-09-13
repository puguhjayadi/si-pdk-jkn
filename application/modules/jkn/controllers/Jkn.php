<?php

class Jkn extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
	}

	public function index()
	{
		$this->load->model('penduduk/Model_penduduk');
		$this->load->model('keluarga/Model_keluarga');
		$this->load->model('apb/Model_apb');
		$this->load->model('jkn/Model_jkn');
		$data['countPenduduk'] = $this->Model_penduduk->findRows();
		$data['countKeluarga'] = $this->Model_keluarga->findRows();
		$data['countApb'] = $this->Model_apb->findRows();
		$data['countJkn'] = $this->Model_jkn->findRows();
		$this->blade->render('jkn_index', $data);
	}

	public function datatable()
	{
		$builder = $this->datatables
		->select("nik_jkn, nama, tgl_lahir, nik_ktp, faskes_tingkat, nama_faskes")
		->from('tbl_dt_peserta_jkn');

		$builder
		->add_column('edit', '<a href="'.site_url().'jkn/edit/$1.html" class="btn btn-sm btn-warning btn-edit" title="Edit" id="$1" ><span class="fa fa-edit"></span> </a>', 'nik_jkn')
		->add_column('delete', '<a href="'.site_url().'jkn/delete/$1.html" class="btn btn-sm btn-danger btn-delete" title="Delete" id="$1" ><span class="fa fa-trash"></span> </a>', 'nik_jkn');


		$this->output->set_content_type('application/json')->set_output($this->datatables->generate('json'));
	}


}