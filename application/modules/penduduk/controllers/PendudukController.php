<?php

ini_set('memory_limit', '-1');
ini_set('max_execution_time', '-1');

setlocale(LC_ALL, 'id_ID');

require(APPPATH . 'vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class PendudukController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->guardPage([0, 1]);
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

	public function excel()
	{
		$this->load->model('penduduk/PendudukModel');
		$dataPenduduk = $this->PendudukModel->findAll();


		$styleBoldCenterBorrder = [
			'font'      => ['bold' => true],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
			],
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];


		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();


		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nama');
		$sheet->setCellValue('C1', 'Tempat Lahir');
		$sheet->setCellValue('D1', 'Tanggal Lahir');
		$sheet->setCellValue('E1', 'Jenis Kelamin');
		$sheet->setCellValue('F1', 'Gol Darah');
		$sheet->setCellValue('G1', 'Alamat');
		$sheet->setCellValue('H1', 'Rt/Rw');
		$sheet->setCellValue('I1', 'Kelurahan');
		$sheet->setCellValue('J1', 'Kecamatan');
		$sheet->setCellValue('K1', 'Agama');
		$sheet->setCellValue('L1', 'Stasus Perkawinan');
		$sheet->setCellValue('M1', 'Pekerjaan');
		$sheet->setCellValue('N1', 'Kewarganegaraan');
		$sheet->setCellValue('O1', 'Masa Berlaku');
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
		$sheet->getColumnDimension('G')->setAutoSize(true);
		$sheet->getColumnDimension('H')->setAutoSize(true);
		$sheet->getColumnDimension('I')->setAutoSize(true);
		$sheet->getColumnDimension('J')->setAutoSize(true);
		$sheet->getColumnDimension('K')->setAutoSize(true);
		$sheet->getColumnDimension('L')->setAutoSize(true);
		$sheet->getColumnDimension('M')->setAutoSize(true);
		$sheet->getColumnDimension('N')->setAutoSize(true);
		$sheet->getColumnDimension('O')->setAutoSize(true);
		$sheet->getStyle('A1')->applyFromArray($styleBoldCenterBorrder);
		$sheet->getStyle("B1")->applyFromArray($styleBoldCenterBorrder);
		$sheet->getStyle("C1")->applyFromArray($styleBoldCenterBorrder);
		$sheet->getStyle("D1")->applyFromArray($styleBoldCenterBorrder);
		$sheet->getStyle("E1")->applyFromArray($styleBoldCenterBorrder);
		$sheet->getStyle("F1")->applyFromArray($styleBoldCenterBorrder);
		$sheet->getStyle("G1")->applyFromArray($styleBoldCenterBorrder);
		$sheet->getStyle("H1")->applyFromArray($styleBoldCenterBorrder);
		$sheet->getStyle("I1")->applyFromArray($styleBoldCenterBorrder);
		$sheet->getStyle("J1")->applyFromArray($styleBoldCenterBorrder);
		$sheet->getStyle("K1")->applyFromArray($styleBoldCenterBorrder);
		$sheet->getStyle("L1")->applyFromArray($styleBoldCenterBorrder);
		$sheet->getStyle("M1")->applyFromArray($styleBoldCenterBorrder);
		$sheet->getStyle("N1")->applyFromArray($styleBoldCenterBorrder);
		$sheet->getStyle("O1")->applyFromArray($styleBoldCenterBorrder);


		$w = 1;
		$x = 2;
		foreach($dataPenduduk as $row)
		{

			$sheet->setCellValueExplicit('A'.$x,$row->nik_ktp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING );
			$sheet->setCellValue('B'.$x, $row->nama);
			$sheet->setCellValue('C'.$x, $row->tmpt_lahir);
			$sheet->setCellValue('D'.$x, $row->tgl_lahir);
			$sheet->setCellValue('E'.$x, $row->jenis_kelamin);
			$sheet->setCellValue('F'.$x, $row->gol_darah);
			$sheet->setCellValue('G'.$x, $row->alamat);
			$sheet->setCellValue('H'.$x, $row->rt_rw);
			$sheet->setCellValue('I'.$x, $row->kelurahan);
			$sheet->setCellValue('J'.$x, $row->kecamatan);
			$sheet->setCellValue('K'.$x, $row->agama);
			$sheet->setCellValue('L'.$x, $row->sts_perkawinan);
			$sheet->setCellValue('M'.$x, $row->pekerjaan);
			$sheet->setCellValue('N'.$x, $row->kewarganegaraan);
			$sheet->setCellValue('O'.$x, $row->masa_berlaku);
			$x++;
		}

		$writer = new Xlsx($spreadsheet);
		
		$filename = 'Data Penduduk';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');

	}


}