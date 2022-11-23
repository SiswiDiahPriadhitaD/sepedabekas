@extends('customer.layouts.main')

@section('content')
  <h6 class="mb-3">Home / {{ $title }}</h6>

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
      <div class="col-md-12 mb-4">
        <div class="card w-100 radius-8 shadow-sm border-0" style="overflow: hidden">
          <div class="card-body m-3">
            <h5 class="card-title">{{ $title.' Detail - '.Auth::user()->name }}</h5>
              
              <div class="mb-3 row">
                <div class="col-md-6">
                  <label for="email">Email</label>
                  <input type="email" readonly name="email" id="email" class="form-control mt-1" value="{{ Auth::user()->email }}">
                </div>
                <div class="col-md-6">
                  <label for="name">Name</label>
                  <input type="name" readonly name="name" id="name" class="form-control mt-1" value="{{ Auth::user()->name }}">
                </div>
              </div>

              <div class="mb-3 row">
                <div class="col-md-6">
                  <label for="product_name">Nama Produk</label>
                  <input type="text" readonly id="product_name" class="form-control mt-1 @error('product_name') is-invalid @enderror" value="{{ $data->product->name  }}">
                </div>
                <div class="col-md-6">
                  <label for="product_name">Tipe & Brand</label>
                  <input type="text" readonly id="product_name" class="form-control mt-1 @error('product_name') is-invalid @enderror" value="{{ $data->product->type->type.' - '.$data->product->brand->brand  }}">
                </div>
              </div>

              <div class="mb-3 row">
                <div class="col-md-4">
                  <label for="product_name">Tanggal Order</label>
                  <input type="text" readonly id="product_name" class="form-control mt-1 @error('product_name') is-invalid @enderror" value="{{ $data->order_date  }}">
                </div>

                <div class="col-md-5">
                  <label for="product_name">Total</label>
                  <input type="text" readonly id="product_name" class="form-control mt-1 fw-bold @error('product_name') is-invalid @enderror" value="Rp. {{ number_format($data->total)  }}">
                </div>

                <div class="col-md-3">
                  <label for="product_name" class="mb-1">Status</label>
                  <div class="d-flex">
                    @if ($data->payment->count() == 0)
                      <button class="btn btn-danger btn-block w-100">Unpaid</button>
                    @else
                      <button class="btn btn-success btn-block w-100">Paid</button>
                    @endif
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="product_name">Informasi Tambahan</label>
                <input type="text" readonly id="product_name" class="form-control mt-1 @error('product_name') is-invalid @enderror" value="{{ $data->information  }}">
              </div>

              <a href="/transaction" class="btn btn-secondary btn-md float-end px-5 py-2">Kembali</a>
          </div>
        </div>
      </div>
    
  </div>
@endsection