@extends('layouts.index')

@push('css')
    
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Karyawan/</span> Tambah Karyawan</h4>

  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-2">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Karyawan</h5>
          {{-- <small class="text-muted float-end">Default label</small> --}}
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('karyawan.store')}}">
              <input type="hidden" name="_token" value="{{ csrf_token()}}" />
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
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Tulis nama depan" required/>
              </div>
              <div class="col-md">
                <label class="form-label" for="last_name">Nama Belakang</label>
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Tulis nama belakang jika ada" />
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-md">
                  <label for="gender" class="col-md-2 col-form-label">Jenis Kelamin*</label>
                  <select name="gender" id="gender" class="form-control" required>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
              </div>
              <div class="col-md">
                  <label for="phone" class="col-md-4 col-form-label">Nomer Telepon</label>
                  <input class="form-control" name="phone" type="text" id="phone"/>
              </div>
            </div>
            <div class="mb-3">
              <label for="address" class="col-md-2 col-form-label">Alamat</label>
              <input class="form-control" name="address" type="text" id="address" />
            </div>
            <div class="mb-3">
              <label for="email" class="col-md-2 col-form-label">E-mail*</label>
              <input class="form-control" name="email" type="email" id="email" required/>
            </div>
            <div class="mb-3 row">
              <div class="col-md">
                <label class="form-label" for="username">No Pegawai*</label>
                <input type="text" name="name" class="form-control" id="username" placeholder="Tulis no pegawai" required/>
              </div>
              <div class="col-md">
                <label class="form-label" for="password">Kata Kunci (password)</label>
                <input type="text" name="password" class="form-control" id="password" value="12345678" placeholder="Tulis password" disabled/>
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-md">
                <label class="form-label" for="shift">Shift</label>
                <select class="form-select select2" name="shift" id="shift" data-placeholder="Pilih salah satu" required>
                  <option></option>
                  @foreach ($shift as $item)
                  <option value="">{{ $item->name }}</option>    
                  @endforeach
                </select>
              </div>
              <div class="col-md">
                <label class="form-label" for="role">Tugas</label>
                <select class="form-select select2" name="role" id="role" data-placeholder="Pilih salah satu" required>
                  <option></option>
                  @foreach ($role as $item)
                  <option value="">{{ $item->name }}</option>    
                  @endforeach
                </select>
              </div>
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