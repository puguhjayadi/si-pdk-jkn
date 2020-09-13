<?php

class Apb extends MY_Controller
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
		$this->blade->render('apb_index', $data);
	}

	public function datatable()
	{
		$builder = $this->datatables
		->select(" nik_anggota, nama, nik_ktp, jenis_bantuan_diterima")
		->from('tbl_dt_peserta_apb');

		$builder
		->add_column('edit', '<a href="'.site_url().'apb/edit/$1.html" class="btn btn-sm btn-warning btn-edit" title="Edit" id="$1" ><span class="fa fa-edit"></span> </a>', 'nik_anggota')
		->add_column('delete', '<a href="'.site_url().'apb/delete/$1.html" class="btn btn-sm btn-danger btn-delete" title="Delete" id="$1" ><span class="fa fa-trash"></span> </a>', 'nik_anggota');


		$this->output->set_content_type('application/json')->set_output($this->datatables->generate('json'));
	}


}