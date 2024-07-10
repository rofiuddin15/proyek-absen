@extends('layouts.index')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Shift/</span> Tambah Shift</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-2">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Shift</h5>
            <small class="text-muted float-end">Default label</small>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('shift-absen.store')}}">
                <input type="hidden" name="_token" value="{{ csrf_token()}}" />
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Nama Shift</label>
                <input type="text" name="name" class="form-control" id="basic-default-fullname" placeholder="Pagi, Siang atau lainnya.." />
              </div>
              <div class="mb-3 row">
                <div class="col-md">
                    <label for="start-time" class="col-md-2 col-form-label">Mulai</label>
                    <input class="form-control" name="start_time" type="time" id="start-time" />
                </div>
                <div class="col-md">
                    <label for="end-time" class="col-md-2 col-form-label">Akhir</label>
                    <input class="form-control" name="end_time" type="time" id="end-time" />
                </div>
              </div>
              <div class="mb-3">
                <label for="html5-time-input" class="col-md-2 col-form-label">Jangka Waktu Absen</label>
                <input class="form-control" name="range_open" type="number" value="2" id="html5-number-input" />
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
<script>
  let waktu = new Date();
  let start_time = waktu.getHours() + ':' + waktu.getMinutes();
  document.getElementById('start-time').value = start_time;
  document.getElementById('end-time').value = start_time;
</script>
@endpush