@extends('layouts.index')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Penugasan /</span> Daftar Penugasan</h4>
        <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header flex-column flex-md-row"><div class="head-label text-center"><h5 class="card-title mb-0">DataTable with Buttons</h5></div><div class="dt-action-buttons text-end pt-3 pt-md-0"><div class="dt-buttons btn-group flex-wrap"> <div class="btn-group"><button class="btn buttons-collection dropdown-toggle btn-label-primary me-2" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false"><span><i class="bx bx-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span></span></button></div> <button class="btn btn-secondary create-new btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span></button> </div></div></div>
      <div class="table-responsive text-nowrap">
        <table class="table table-stripped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Role (Penugasan)</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($data as $item)
            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{$loop->iteration}}</td>
              <td>{{ $item->name }}</td>
              <td>
                <div class="btn-group btn-small" role="group" aria-label="First group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
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