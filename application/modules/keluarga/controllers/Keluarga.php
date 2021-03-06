<?php

class Keluarga extends MY_Controller
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
		$this->blade->render('keluarga_index', $data);
	}

	public function datatable()
	{
		$builder = $this->datatables
		->select(" nik_kk,nm_kpl_keluarga,alamat,rt_rw,kelurahan,kecamatan,kota_kab,provinsi,nm_anggota_keluarga,nik_ktp,jenis_kelamin,tmpt_lahir,tgl_lahir,agama,pendidikan,pekerjaan,gol_darah,sts_perkawinan,tgl_perkawinan,sts_hub_keluarga,kewarganegaraan,no_paspor,no_kitap,nm_ayah,nm_ibu,tgl_kk_dikeluarkan,")
		->from('tbl_dt_keluarga');

		$builder
		->add_column('edit', '<a href="'.site_url().'keluarga/edit/$1.html" class="btn btn-sm btn-warning btn-edit" title="Edit" id="$1" ><span class="fa fa-edit"></span> </a>', 'nik_kk')
		->add_column('delete', '<a href="'.site_url().'keluarga/delete/$1.html" class="btn btn-sm btn-danger btn-delete" title="Delete" id="$1" ><span class="fa fa-trash"></span> </a>', 'nik_kk');


		$this->output->set_content_type('application/json')->set_output($this->datatables->generate('json'));
	}


}