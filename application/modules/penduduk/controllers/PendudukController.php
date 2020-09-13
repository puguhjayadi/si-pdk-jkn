<?php

class PendudukController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
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
		$this->blade->render('penduduk_index', $data);
	}

	public function datatable()
	{
		$this->load->library('datatables');
		$builder = $this->datatables
		->select(" nik_ktp, nama, tmpt_lahir, tgl_lahir, jenis_kelamin, gol_darah, alamat, rt_rw, kelurahan, kecamatan, agama, sts_perkawinan, pekerjaan, kewarganegaraan, masa_berlaku")
		->from('tbl_dt_penduduk');

		$builder
		->add_column('edit', '<a href="'.site_url().'penduduk/edit/$1.html" class="btn btn-sm btn-warning btn-edit" title="Edit" id="$1" ><span class="fa fa-edit"></span> </a>', 'nik_ktp')
		->add_column('delete', '<a href="'.site_url().'penduduk/delete/$1.html" class="btn btn-sm btn-danger btn-delete" title="Delete" id="$1" ><span class="fa fa-trash"></span> </a>', 'nik_ktp');


		$this->output->set_content_type('application/json')->set_output($this->datatables->generate('json'));
	}


}