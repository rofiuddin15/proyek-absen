@extends('layouts.index')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Penugasan/</span> Tambah Penugasan</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-2">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Penugasan</h5>
            <small class="text-muted float-end">Default label</small>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('role.store')}}">
                <input type="hidden" name="_token" value="{{ csrf_token()}}" />
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Nama Penugasan (ROLE)</label>
                <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="Admin, Staf atau lainnya.." />
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection