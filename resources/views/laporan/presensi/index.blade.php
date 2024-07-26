@extends('layouts.index')

@push('css')
<link rel="stylesheet" href="{{ asset('sneat/assets/css/datatables.css')}}" />
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-2 mb-2">
			<span class="text-muted fw-light">Rekap Presensi</h4>
			<!-- Basic Bootstrap Table -->
	<div class="card">
		<div class="card-header flex-column flex-md-row">
			@if($errors->any())
			{{ implode('', $errors->all('<div>:message</div>')) }}
		@endif
			<div class="dt-action-buttons text-end pt-1 pt-md-0">
				<div class="dt-buttons btn-group flex-wrap">
					<button class="btn btn-sm btn-secondary">
						<span>
							<i class="bx bx-left-arrow-alt me-sm-1"></i>
							<span class="d-none d-sm-inline-block">Kembali</span>
						</span>
					</button>              
					{{-- <button onclick="window.location='{{ route('laporan-kinerja.create') }}'" class="btn btn-sm btn-secondary create-new btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button">
						<span>
							<i class="bx bx-plus me-sm-1"></i>
							<span class="d-none d-sm-inline-block">Data Baru</span>
						</span>
					</button> --}}
				</div>
			</div>
		</div>
		<div class="card-body table-responsive text-nowrap">
			<table class="table table-stripped">
				{{ $dataTable->table() }}
			</table>
		</div>
	</div>
	<!--/ Basic Bootstrap Table -->
</div>
@endsection

@push('js')
    <script src="{{ asset('/sneat/assets/js/datatables.js')}}"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}  
@endpush