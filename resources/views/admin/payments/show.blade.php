@extends('admin.layouts.main')

@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">{{ $title }} - {{ $data->transaction->transaction_id }}</h4>
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

  <!-- Row -->
  <div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-9">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal form-material mx-2" onsubmit="return confirm('Apakah anda yakin?')" action="/admin/transaction/{{ $data->transaction_id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group row">
              <div class="col-md-4">
                <label class="col-md-12">Name</label>
                <div class="col-md-12">
                  <input type="text" placeholder="Name"
                    class="form-control form-control-line @error('name') is-invalid @enderror" name="name" value="{{ $data->transaction->user->name }}" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <label class="col-md-12">Phone</label>
                <div class="col-md-12">
                  <input type="text" placeholder="Description"
                    class="form-control form-control-line @error('description') is-invalid @enderror" readonly value="{{ $data->transaction->user->phone }}">
                </div>
              </div>

              <div class="col-md-4">
                <label class="col-md-12">Address</label>
                <div class="col-md-12">
                  <input type="text" placeholder="Description"
                    class="form-control form-control-line @error('description') is-invalid @enderror" readonly value="{{ $data->transaction->user->address }}">
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-4">
                <label class="col-md-12">Name of MotorCycles</label>
                <div class="col-md-12">
                  <input type="text" placeholder="Name"
                    class="form-control form-control-line @error('name') is-invalid @enderror" name="name" value="{{ $data->transaction->product->name }}" readonly>
                </div>
              </div>

              <div class="col-md-4">
                <label class="col-md-12">Brand</label>
                <div class="col-md-12">
                  <input type="text" placeholder="Description"
                    class="form-control form-control-line @error('description') is-invalid @enderror" readonly value="{{ $data->transaction->product->brand->brand }}">
                </div>
              </div>

              <div class="col-md-4">
                <label class="col-md-12">Type</label>
                <div class="col-md-12">
                  <input type="text" placeholder="Description"
                    class="form-control form-control-line @error('description') is-invalid @enderror" readonly value="{{ $data->transaction->product->type->type }}">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12">Information Order</label>
              <div class="col-md-12">
                <input type="text" placeholder="Description"
                  class="form-control form-control-line @error('description') is-invalid @enderror" readonly value="{{ $data->transaction->information }}">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-5">
                <label class="col-md-12">Total</label>
                <div class="col-md-12">
                  <input type="text" placeholder="Description"
                    class="form-control form-control-line @error('description') is-invalid @enderror" readonly value="{{ 'Rp. '.number_format($data->transaction->total) }}">
                </div>
              </div>

              <div class="col-md-5">
                <label class="col-md-12">{{ ($data->status == 'paid') ? 'Paid Off' : 'Pay Now' }}</label>
                <div class="col-md-12">
                  @if ($data->status == 'paid')
                    <input type="text" placeholder="Description"
                    class="form-control form-control-line @error('description') is-invalid @enderror" readonly value="{{ 'Rp. '.number_format($data->pay) }}">
                  @else
                    <input type="text" placeholder="Pay" name="pay"
                      class="form-control form-control-line @error('pay') is-invalid @enderror" value="{{ old('pay') }}">
                  @endif
                </div>
              </div>

              <div class="col-md-2">
                <label class="col-md-12">Status Payment</label>
                <div class="col-md-12 d-flex">
                  @if ($data->status == 'paid')
                    <span class="btn btn-success w-100 text-white border-0">Paid</span>
                  @else
                    <span class="btn btn-danger w-100 text-white border-0">Unpaid</span>
                  @endif
                </div>
              </div>
            </div>
            
            @if ($data->status == 'unpaid')
              <div class="form-group">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-success text-white">Submit Now</button>
                </div>
              </div>
            @endif
          </form>
        </div>
      </div>
    </div>
    <!-- Column -->
  </div>
  <!-- Row -->
</div>
@endsection