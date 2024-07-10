@extends('layouts.index')

@push('css')
<link rel="stylesheet" href="{{ asset('sneat/assets/css/select2-bootstrap-5-theme.min.css')}}" />       
@endpush

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
              <div class="mb-3">
                <label class="form-label" for="multiple-select-field">Hak Akses</label>
                <select class="form-select select2-hidden-accessible" id="multiple-select-field" data-placeholder="Choose anything" multiple>
                  <option>Christmas Island</option>
                  <option>South Sudan</option>
                  <option>Jamaica</option>
                  <option>Kenya</option>
                  <option>French Guiana</option>
                  <option>Mayotta</option>
                  <option>Liechtenstein</option>
                  <option>Denmark</option>
                  <option>Eritrea</option>
                  <option>Gibraltar</option>
                  <option>Saint Helena, Ascension and Tristan da Cunha</option>
                  <option>Haiti</option>
                  <option>Namibia</option>
                  <option>South Georgia and the South Sandwich Islands</option>
                  <option>Vietnam</option>
                  <option>Yemen</option>
                  <option>Philippines</option>
                  <option>Benin</option>
                  <option>Czech Republic</option>
                  <option>Russia</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script src="{{ asset('sneat/assets/js/select2.min.js')}}"></script>       
<script>
  $( '#multiple-select-field' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
} );
</script>       
@endpush