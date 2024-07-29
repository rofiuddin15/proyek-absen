@extends('layouts.index')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Grup Shift/</span> Dit Grup Shift</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-2">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Grup Shift</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('shift-grup.update', $data->id)}}">
                <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                @method('PATCH')
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Nama Grup Shift</label>
                <input type="text" value="{{ $data->name }}" name="name" class="form-control" id="basic-default-fullname" placeholder="Grup A, B atau lainnya.." />
              </div>
              <div class="mb-3">
                <label class="form-label" for="shift">Shift</label>
                <select name="shift_id" id="shift" class="form-control">
                  <option>--Pilih salah satu--</option>
                  @foreach ($shift as $item)
                  <option value="{{ $item->id }}" @if (isset($data->shift_presence_id))
                      {{ $data->shift_presence_id == $item->id ? 'selected' : '' }}
                  @endif>{{ $item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="day" class="form-label">Hari</label>
                <select name="day" id="day" class="form-control">
                  <option value="{{null}}">--Pilih Hari--</option>
                  <option value="Monday" {{ $data->day == "Monday" ? 'selected' : ''}}>Senin</option>
                  <option value="Tuesday" {{ $data->day == "Tuesday" ? 'selected' : ''}}>Selasa</option>
                  <option value="Wednesday" {{ $data->day == "Wednesday" ? 'selected' : ''}}>Rabu</option>
                  <option value="Thursday" {{ $data->day == "Thursday" ? 'selected' : ''}}>Kamis</option>
                  <option value="Friday" {{ $data->day == "Friday" ? 'selected' : ''}}>Jum'at</option>
                  <option value="Saturday" {{ $data->day == "Saturday" ? 'selected' : ''}}>Sabtu</option>
                  <option value="Sunday" {{ $data->day == "Sunday" ? 'selected' : ''}}>Minggu</option>
                  
                </select>
              </div>
              <div class="text-end">
                <button type="submit" class="btn btn-primary">Ubah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection