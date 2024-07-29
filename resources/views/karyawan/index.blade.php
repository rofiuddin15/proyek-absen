@extends('layouts.index')

@push('head')
<meta name="csrf_token" content="{{ csrf_token() }}" />		
@endpush

@push('css')
<link rel="stylesheet" href="{{ asset('sneat/assets/css/datatables.css')}}" />
<link rel="stylesheet" href="{{ asset('sneat/assets/css/toastr.min.css')}}" />    
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-2 mb-2">
			<span class="text-muted fw-light">Karyawan /</span> Data Karyawan</h4>
			<!-- Basic Bootstrap Table -->
	<div class="card">
		<div class="card-header flex-column flex-md-row">
			
			<div class="dt-action-buttons text-end pt-1 pt-md-0">
				<div class="dt-buttons btn-group flex-wrap">
					<button class="btn btn-sm btn-secondary">
						<span>
							<i class="bx bx-left-arrow-alt me-sm-1"></i>
							<span class="d-none d-sm-inline-block">Kembali</span>
						</span>
					</button>              
					<button onclick="window.location='{{ route('karyawan.create') }}'" class="btn btn-sm btn-secondary create-new btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button">
						<span>
							<i class="bx bx-plus me-sm-1"></i>
							<span class="d-none d-sm-inline-block">Data Baru</span>
						</span>
					</button>
				</div>
			</div>
		</div>
		<div class="card-body table-responsive text-nowrap">
				{{ $dataTable->table() }}
		</div>
	</div>
	<!--/ Basic Bootstrap Table -->
</div>
<div class="modal fade" id="modal-delete" data-bs-backdrop="static" tabindex="-1">
	<div class="modal-dialog">
		<form class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="backDropModalTitle">Perhatian!</h5>
				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col mb-3">
						<h5>Yakin akan menghapus data ini &hellip;?</h5>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
					Tidak
				</button>
				<button type="button" id="hapus" class="btn btn-warning">Ya</button>
			</div>
		</form>
	</div>
</div>
@endsection

@push('js')
<script src="{{ asset('/sneat/assets/js/datatables.js')}}"></script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
<script src="{{ asset('sneat/assets/js/toastr.min.js')}}"></script>
<script type="text/javascript">
	function hapus(e) {
			var id = e;
			$('#hapus').data('id', id);
	}
	$('#hapus').click(function() {
			var id = $(this).data('id');
			console.log(id);
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
					url: 'karyawan/'+id,
					type: 'DELETE',
					data: {_token: "{{ csrf_token() }}", method: 'DELETE'},
					beforeSend: function () {
							var span = document.createElement('span');
							span.classList.add('fa');
							span.classList.add('fa-spinner');
							span.classList.add('fa-spin');
							$('#hapus').addClass('disabled');
							$('#hapus').append(span);
					},
					success: function(res) {
							setTimeout(function(){
									$('#modal-delete').modal('hide');
									$('#userprofile-table').DataTable().ajax.reload();
									toastr.success('Halaman berhasil di hapus', res);
							}, 1000)
					}
			})
	});
</script>

@endpush