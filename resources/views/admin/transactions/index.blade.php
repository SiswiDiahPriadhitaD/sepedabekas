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
          
          {{-- <a href="/admin/transaction/create" class="btn btn-md btn-info text-white float-end">Tambah Data</a> --}}

          <h6 class="card-subtitle float-start">Add <code>.table-hover</code> to enable a hover state on table
            rows within a <code>&lt;tbody&gt;</code>.
          </h6>
        </div>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">OrderID</th>
                <th scope="col">User</th>
                <th scope="col">MotorCycle Name</th>
                <th scope="col">Total</th>
                <th scope="col">Information</th>
                <th scope="col">Created At</th>
                <th scope="col" class="text-center">Action</th>
                <th scope="col" class="text-center">Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)    
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $item->transaction_id }}</td>
                  <td>{{ $item->user->name }}</td>
                  <td>{{ $item->product->name }}</td>
                  <td>Rp. {{ number_format($item->total) }}</td>
                  <td>{{ $item->information }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td class="text-center">
                    @if ($item->payment->count() == 0)
                      <a href="/admin/transaction/{{ $item->transaction_id }}/unpaid" class="btn btn-sm btn-warning text-white">Pay Now</a>
                    @else
                      <a href="/admin/transaction/{{ $item->transaction_id }}/show" class="btn btn-sm btn-info text-white">Detail</a>
                    @endif
                    {{-- <a href="/admin/transaction/{{ $item->id }}/edit" product="submit" class="btn btn-sm btn-warning text-white">Edit</a> --}}
                  </td>
                  <td class="text-center">
                    @if ($item->payment->count() == 0)
                      <a href="#" class="btn btn-danger text-white btn-sm">Unpaid</a>  
                    @else
                      <a href="#" class="btn btn-success text-white btn-sm">Paid</a>  
                    @endif  
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