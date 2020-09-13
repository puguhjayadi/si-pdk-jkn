@layout('layouts/superuser')


@section('content')

<div class="container-fluid">
	<h1 class="mt-4">Data Keluarga</h1>
	<hr>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">Data Keluarga</li>
	</ol>
	<div class="row">
		<div class="col-xl-3 col-md-6">
			<div class="card bg-primary text-white mb-4">
				<div class="card-body">{{ number_format($countPenduduk, 0, ',', '.') }}</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="penduduk.html">Data Penduduk</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card bg-warning text-white mb-4">
				<div class="card-body">{{ number_format($countKeluarga, 0, ',', '.') }}</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="keluarga.html">Data Keluarga</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card bg-success text-white mb-4">
				<div class="card-body">{{ number_format($countJkn, 0, ',', '.') }}</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="jkn.html">Data JKN</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card bg-danger text-white mb-4">
				<div class="card-body">{{ number_format($countApb, 0, ',', '.') }}</div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="apb.html">Data APB</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-6">
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-chart-area mr-1"></i>
					Area Chart Example
				</div>
				<div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-chart-bar mr-1"></i>
					Bar Chart Example
				</div>
				<div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
			</div>
		</div>
	</div>
	<div class="card mb-4">
		<div class="card-header">
			<i class="fas fa-table mr-1"></i>
			Tabulasi
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>NIK KK</th>
							<th>NAMA KEPALA KELUARGA</th>
							<th>ALAMAT</th>
							<th>RT/RW</th>
							<th>KELURAHAN</th>
							<th>KECAMATAN</th>
							<th>KOTA/KAB</th>
							<th>PROVINSI</th>
							<th>NAMA ANGGOTA KELUARGA</th>
							<th>NIK KTP</th>
							<th>JENIS KELAMIN</th>
							<th>TMPT LAHIR</th>
							<th>TGL LAHIR</th>
							<th>AGAMA</th>
							<th>PENDIDIKAN</th>
							<th>PEKERJAAN</th>
							<th>GOL DARAH</th>
							<th>STATUS PERKAWINAN</th>
							<th>TANGGAL PERKAWINAN</th>
							<th>STATUS HUB KELUARGA</th>
							<th>KEWARGANEGARAAN</th>
							<th>NO PASPOR</th>
							<th>NO KITAP</th>
							<th>NAMA AYAH</th>
							<th>NAMA IBU</th>
							<th>TANGGAL KK DIKELUARKAN</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection


@section('css')

@endsection

@section('js')
<!-- Page custom scripts -->
<script type="text/javascript">
	$(function () {
		table = $('#dataTable').DataTable({
			processing: true,serverSide: true,order: [[0, 'asc'], [2, 'asc']],
			columnDefs: [  {className: "text-center", targets: [0,5]},],
			columns: [
			{data: 'nik_kk' },
			{data: 'nm_kpl_keluarga' },
			{data: 'alamat' },
			{data: 'rt_rw' },
			{data: 'kelurahan' },
			{data: 'kecamatan' },
			{data: 'kota_kab' },
			{data: 'provinsi' },
			{data: 'nm_anggota_keluarga' },
			{data: 'nik_ktp' },
			{data: 'jenis_kelamin' },
			{data: 'tmpt_lahir' },
			{data: 'tgl_lahir' },
			{data: 'agama' },
			{data: 'pendidikan' },
			{data: 'pekerjaan' },
			{data: 'gol_darah' },
			{data: 'sts_perkawinan' },
			{data: 'tgl_perkawinan' },
			{data: 'sts_hub_keluarga' },
			{data: 'kewarganegaraan' },
			{data: 'no_paspor' },
			{data: 'no_kitap' },
			{data: 'nm_ayah' },
			{data: 'nm_ibu' },
			{data: 'tgl_kk_dikeluarkan' }
			],
			ajax: {url: "{{base_url()}}keluarga/datatable",type: "POST",
			data: function (d) {

			}}
		});
	});
</script>

@endsection
