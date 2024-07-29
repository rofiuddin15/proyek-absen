@extends('layouts.index')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Grup Shift/</span> Tambah Grup Shift</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-2">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Grup Shift</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('shift-grup.store')}}">
                <input type="hidden" name="_token" value="{{ csrf_token()}}" />
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Nama Grup Shift</label>
                <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="Grup A, B atau lainnya.." />
              </div>
              <div class="mb-3">
                <label class="form-label" for="shift">Shift</label>
                <select name="shift_id" id="shift" class="form-control">
                  <option>--Pilih salah satu--</option>
                  @foreach ($data as $item)
                  <option value="{{ $item->id }}">{{ $item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="day" class="form-label">Hari</label>
                <select name="day" id="day" class="form-control">
                  <option value="{{null}}">--Pilih Hari--</option>
                  <option value="Monday">Senin</option>
                  <option value="Tuesday">Selasa</option>
                  <option value="Wednesday">Rabu</option>
                  <option value="Thursday">Kamis</option>
                  <option value="Friday">Jum'at</option>
                  <option value="Saturday">Sabtu</option>
                  <option value="Sunday">Minggu</option>
                  
                </select>
              </div>
              <div class="text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection