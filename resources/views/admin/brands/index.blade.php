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
          
          <a href="/admin/brand/create" class="btn btn-md btn-info text-white float-end">Tambah Data</a>

          <h6 class="card-subtitle float-start">Add <code>.table-hover</code> to enable a hover state on table
            rows within a <code>&lt;tbody&gt;</code>.
          </h6>
        </div>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Brand</th>
                <th scope="col">Product Count</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)    
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $item->brand }}</td>
                  <td>{{ $item->product->count() }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>
                    <form action="/admin/brand/{{ $item->id }}" method="POST" onsubmit="return confirm('apakah anda yakin akan mengahpus data {{ $item->brand }}')">
                      @csrf
                      @method('DELETE')
                      <a href="/admin/brand/{{ $item->id }}/edit" class="btn btn-sm btn-info text-white">Ubah</a>
                      <button type="submit" class="btn btn-sm btn-danger text-white">Hapus</button>
                    </form>
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