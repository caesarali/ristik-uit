@extends('layouts.app')

@section('title', 'Data Jurnal')

@section('style')
	<!-- DataTables -->
  	<link rel="stylesheet" href="{{ asset('assets/dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Jurnal</h1>
                <p>Daftar Jurnal Ilmiah RISTIK</p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="{{ url('/home') }}">Beranda</a></li>
                    <li class="active">Data Jurnal</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="jurnal" style="min-height: 500px;">
    <div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Nama Peneliti</th>
					<th>Judul Penelitian</th>
					<th>Volume</th>
					<th>Nomor</th>
					<th>Tahun Terbit</th>
				</tr>
			</thead>
			<tbody>
				@foreach($jurnals as $jurnal)
					<tr>
						<td>{{ $loop->iteration }}.</td>
						<td>{{ $jurnal->peneliti->name }}</td>
						<td style="max-width: 600px">{{ $jurnal->judul }}</td>
						<td class="text-center">{{ $jurnal->volume }}</td>
						<td class="text-center">{{ $jurnal->nomor }}</td>
						<td class="text-center">{{ $jurnal->tahun }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
    </div>
</section>
@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset('assets/dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
	<script type="text/javascript">
		$('.table').DataTable()
	</script>
@endsection