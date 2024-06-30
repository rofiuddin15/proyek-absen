@extends('layouts.index')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-2">
        <span class="text-muted fw-light">Karyawan /</span> Data Shift</h4>
        <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header flex-column flex-md-row">
          
          <div class="dt-action-buttons text-end pt-1 pt-md-0">
            <div class="dt-buttons btn-group flex-wrap">              
              <button onclick="window.location='{{ route('shift-absen.create') }}'" class="btn btn-sm btn-secondary create-new btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                <span><i class="bx bx-plus me-sm-1"></i>
                  <span class="d-none d-sm-inline-block">Data Baru</span>
                </span>
              </button>
            </div>
          </div>
        </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-stripped">
          <thead>

            <tr>
              <th>#</th>
              <th>Nama Shift</th>
              <th>Waktu Mulai</th>
              <th>Waktu Akhir</th>
              <th>Lama Absen</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($data as $item)
            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{$loop->iteration}}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->start_time }}</td>
              <td>{{ $item->end_time }}</td>
              <td>{{ $item->range_open_presence }} Jam</td>
              <td>
                <div class="btn-group btn-small" role="group" aria-label="First group">
                    <button onclick="linkTo()" type="button" class="btn btn-sm btn-outline-secondary">
                      <i class="tf-icons bx bx-pencil"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                      <i class="tf-icons bx bx-trash"></i>
                    </button>
                  </div>
              </td>
            </tr>        
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Basic Bootstrap Table -->
  </div>
@endsection

@push('js')
  <script>
    const linkTo = () => {
      window.redirect('{{ route("dashboard")}}')
    }
  </script>  
@endpush