@layout('layouts/superuser')


@section('content')

<div class="container-fluid">
	<h1 class="mt-4">Data Penduduk</h1>
	<hr>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">Data Penduduk</li>
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
							<th>NIK</th>
							<th>Nama</th>
							<th>Tempat lahir</th>
							<th>Tgl lahir</th>
							<th>Jenis kelamin</th>
							<th>Gol Darah</th>
							<th>Alamat</th>
							<th>Rt/Rw</th>
							<th>Kelurahan</th>
							<th>Kecamatan</th>
							<th>Agama</th>
							<th>Stasus Perkawinan</th>
							<th>Pekerjaan</th>
							<th>Kewarganegaraan</th>
							<th>Masa Berlaku</th>
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
			{data: 'nik_ktp' },
			{data: 'nama' },
			{data: 'tmpt_lahir' },
			{data: 'tgl_lahir' },
			{data: 'jenis_kelamin' },
			{data: 'gol_darah' },
			{data: 'alamat' },
			{data: 'rt_rw' },
			{data: 'kelurahan' },
			{data: 'kecamatan' },
			{data: 'agama' },
			{data: 'sts_perkawinan' },
			{data: 'pekerjaan' },
			{data: 'kewarganegaraan' },
			{data: 'masa_berlaku' }
			
			],
			ajax: {url: "{{base_url()}}penduduk/datatable",type: "POST",
			data: function (d) {

			}}
		});
	});
</script>

@endsection
