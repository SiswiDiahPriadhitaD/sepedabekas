@extends('admin.layouts.main')

@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Table {{ $title }}</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  
  @if(session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
  @endif
  @if(session('danger'))
    <div class="alert alert-danger">
      {{session('danger')}}
    </div>
  @endif

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">{{ $title }}</h4>
          
          {{-- <a href="/admin/user/create" class="btn btn-md btn-info text-white float-end">Tambah Data</a> --}}

          <h6 class="card-subtitle float-start">Add <code>.table-hover</code> to enable a hover state on table
            rows within a <code>&lt;tbody&gt;</code>.
          </h6>
        </div>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Role</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)    
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ ($item->phone == null) ? 'NULL' : $item->phone }}</td>
                  <td>{{ ($item->address == null) ? 'NULL' : $item->address }}</td>
                  <td>{{ $item->role }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>
                    <a href="/admin/user/{{ $item->id }}/edit" class="btn btn-sm btn-info text-white">Ubah</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
</div>
@endsection