@layout('layouts/superuser')


@section('content')

<div class="container-fluid">
	<h1 class="mt-4">Data JKN</h1>
	<hr>
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active">Data JKN</li>
	</ol>
	<div class="row">
		<div class="col-xl-3 col-md-6">
			<div class="card bg-primary text-white mb-4">
				<div class="card-body"><h2>{{ number_format($countPenduduk, 0, ',', '.') }}</h2></div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="penduduk.html">Data Penduduk</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card bg-warning text-white mb-4">
				<div class="card-body"><h2>{{ number_format($countKeluarga, 0, ',', '.') }}</h2></div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="keluarga.html">Data Keluarga</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card bg-success text-white mb-4">
				<div class="card-body"><h2>{{ number_format($countJkn, 0, ',', '.') }}</h2></div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="jkn.html">Data JKN</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card bg-danger text-white mb-4">
				<div class="card-body"><h2>{{ number_format($countApb, 0, ',', '.') }}</h2></div>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="apb.html">Data APB</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-chart-bar mr-1"></i>
					Tingkat Jaminan Kesehatan
				</div>
				<div class="card-body"><canvas id="barChart" width="100%" height="30"></canvas></div>
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
							<th>NIK JKN</th>
							<th>NAMA</th>
							<th>TGL LAHIR</th>
							<th>NIK KTP</th>
							<th>FASKES TINGKAT</th>
							<th>NAMA FASKES</th>
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
			{data: 'nik_jkn' },
			{data: 'nama' },
			{data: 'tgl_lahir' },
			{data: 'nik_ktp' },
			{data: 'faskes_tingkat' },
			{data: 'nama_faskes' }
			],
			ajax: {url: "{{base_url()}}jkn/datatable",type: "POST",
			data: function (d) {

			}}
		});


		// Bar Chart
		var ctx = document.getElementById("barChart");
		var myLineChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Faskes I", "Faskes II", "FKRTL"],
				datasets: [{
					label: "Total",
					backgroundColor: "rgba(2,117,216,1)",
					borderColor: "rgba(2,117,216,1)",
					data: [4251, 5251, 3251,],
				}],
			},
			options: {
				scales: {
					xAxes: [{
						gridLines: {
							display: false
						},
					}],
					yAxes: [{
						gridLines: {
							display: true
						}
					}],
				},
				legend: {
					display: false
				}
			}
		});


	});
</script>

@endsection
