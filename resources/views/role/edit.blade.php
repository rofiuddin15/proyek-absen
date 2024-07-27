@extends('layouts.index')

@push('css')
<link rel="stylesheet" href="{{ asset('sneat/assets/css/select2-bootstrap-5-theme.min.css')}}" />       
<link rel="stylesheet" href="{{ asset('sneat/assets/css/select2.min.css')}}" />       
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Penugasan/</span> Edit Penugasan</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-2">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Penugasan</h5>
            {{-- <small class="text-muted float-end">Default label</small> --}}
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('role.update', ["role" => $role->id])}}">
              <input type="hidden" name="_token" value="{{ csrf_token()}}" />
              <input type="hidden" name="_method" value="PATCH">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Nama Penugasan (ROLE)</label>
                <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="Admin, Staf atau lainnya.." value="{{$role->name}}" required/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="multiple-select">Hak Akses</label>
                <select name="permission[]" class="form-select" id="multiple-select" data-placeholder="Pilih beberapa hak akses" multiple required>
                  <option></option>
                  @foreach ($data as $item)
                  <option value="{{ $item->name }}" {{ $item->name == in_array($item->name, $currentPermission) ? 'selected' : '' }}>{{ $item->name }}</option>    
                  @endforeach
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
$( '#multiple-select' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : '100%',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
    dropdownParent: $( '#multiple-select' ).parent(),
} );
</script>       
@endpush