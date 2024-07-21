@extends('layouts.index')

@push('css')
    
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Laporan Kinerja/</span> Tambah Laporan Kinerja</h4>

  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-2">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Laporan Kinerja</h5>
          {{-- <small class="text-muted float-end">Default label</small> --}}
        </div>
        <div class="card-body">
          @if($errors->any())
              {{ implode('', $errors->all('<div>:message</div>')) }}
          @endif
          <form method="POST" action="{{ route('laporan-kinerja.store')}}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token()}}" />
            <div class="mb-3">
              <label for="report_description" class="col-md-2 col-form-label">Deskripsi</label>
              <textarea class="form-control" name="report_description" id="report_description" cols="30" rows="10"></textarea>
              {{-- <input class="form-control" name="report_description" type="text" id="report_description" /> --}}
            </div>
            <div class="mb-3">
              <label for="report_file" class="col-md-2 col-form-label">File</label>
              <input type="file" name="report_file" id="report_file" class="form-control">
            </div>
            <div class="text-end">
              <button type="submit" class="btn float-left btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>    
@endsection

@push('js')
    
@endpush