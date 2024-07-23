@extends('layouts.index')

@push('css')
<link rel="stylesheet" href="{{ asset('sneat/assets/css/select2-bootstrap-5-theme.min.css')}}" />       
<link rel="stylesheet" href="{{ asset('sneat/assets/css/select2.min.css')}}" />       
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Profil Pengguna</h4>

  <!-- Basic Layout -->
  <div class="row">
    <div class="col-md-3">
        <div class="card mb-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Profil Pengguna</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-center mb-5">
                    <img src="{{ asset('sneat/assets/img/avatars/1.png')}}" alt class="rounded-circle" />
                </div>
                <button data-bs-toggle="modal" data-bs-target="#avatarModal" class="btn btn-outline-secondary form-control mb-3">
                    <i class="tf-icons bx bx-camera"></i> Ganti Foto
                </button>
                <button data-bs-toggle="modal" data-bs-target="#passwordModal" class="btn btn-outline-secondary form-control mb-3">
                    <i class="tf-icons bx bx-lock"></i> Ganti Password
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-9">
      <div class="card mb-2">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Profil</h5>
          {{-- <small class="text-muted float-end">Default label</small> --}}
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('karyawan.update', ['karyawan' => $data->id])}}">
              <input type="hidden" name="_token" value="{{ csrf_token()}}" />
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="label" value="profil">
              @if ($errors->any())
              <div class="mb-3">
                @foreach ($errors->all() as $error)
                  <span class="badge bg-warning text-center">{{ $error }}</span>
                @endforeach
              </div>
            @endif
            <div class="mb-3 row">
              <div class="col-md">
                <label class="form-label" for="first_name">Nama Depan*</label>
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Tulis nama depan" value="{{$data->first_name}}" required/>
              </div>
              <div class="col-md">
                <label class="form-label" for="last_name">Nama Belakang</label>
                <input type="text" name="last_name" class="form-control" id="last_name" value="{{$data->last_name}}" placeholder="Tulis nama belakang jika ada" />
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-md">
                  <label for="gender" class="col-md-2 col-form-label">Jenis Kelamin*</label>
                  <select name="gender" id="gender" class="form-control" required>
                    <option value="{{null}}">---Pilih Jenis Kelamin---</option>
                    <option value="L" {{$data->gender == 'L' ? 'selected' : ''}}>Laki-Laki</option>
                    <option value="P" {{$data->gender == 'P' ? 'selected' : ''}}>Perempuan</option>
                  </select>
              </div>
            </div>
            <div class="mb-3">
              <label for="address" class="col-md-2 col-form-label">Alamat</label>
              <input class="form-control" name="address" type="text" value="{{$data->address}}" id="address" />
            </div>
            <div class="mb-3">
              <label for="email" class="col-md-2 col-form-label">E-mail*</label>
              <input class="form-control" name="email" type="email" value="{{$data->user->email}}" id="email" required/>
            </div>
            <div class="mb-3 row">
              <div class="col-md">
                <label class="form-label" for="username">No Pegawai*</label>
                <input type="text" name="name" class="form-control" id="username" value="{{$data->user->name}}" placeholder="Tulis no pegawai" required/>
              </div>
              <div class="col-md">
                <label for="phone" class="form-label">Nomer Telepon</label>
                <input class="form-control" name="phone" type="text" value="{{$data->phone}}" id="phone"/>
            </div>
            </div>
            <div class="text-end">
              <button type="submit" class="btn float-left btn-primary">
                <i class="tf-icons bx bx-save"></i> Perbarui
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>    
 {{-- MODAL --}}
  <!-- Modal Password -->
  <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="passwordModalLabel">Update Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('profil.password')}}" method="POST" class="form-group">
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Password Lama</label>
              <input
              type="password"
              id="password"
              class="form-control"
              name="oldPassword"
              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
              aria-describedby="password"
              required
            />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Password Baru</label>
              <input
              type="password"
              id="password"
              class="form-control"
              name="newPassword"
              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
              aria-describedby="password"
              required
            />
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Avatar -->
  <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="avatarModalLabel">Update Foto Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('profil.password')}}" method="POST" class="form-group">
            @csrf
            <div class="mb-3 row justify-content-center">
              <div class="col-auto">
                <img src="{{asset('sneat/assets/img/backgrounds/no_image.png')}}" id="pic1" alt="" class="img-thumbnail rounded">
              </div>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Ambil Foto</label>
              <input type="file" name="avatar" accept="image/*" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- End of Modal --}}
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