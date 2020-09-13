<?php

class JknController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
	}

	public function index()
	{
		$this->load->model('penduduk/PendudukModel');
		$this->load->model('keluarga/KeluargaModel');
		$this->load->model('apb/ApbModel');
		$this->load->model('jkn/JknModel');
		$data['countPenduduk'] = $this->PendudukModel->findRows();
		$data['countKeluarga'] = $this->KeluargaModel->findRows();
		$data['countApb'] = $this->ApbModel->findRows();
		$data['countJkn'] = $this->JknModel->findRows();
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