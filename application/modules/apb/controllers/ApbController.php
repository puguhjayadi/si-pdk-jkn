<?php

class ApbController extends MY_Controller
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