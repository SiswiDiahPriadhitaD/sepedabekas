@extends('customer.layouts.main')

@section('content')
  <h6 class="mb-3">Home / <a href="/" class="text-decoration-none">Product</a> / {{ $data->name }}</h6>

  <div class="row">
    <div class="col-md-12 row mb-3">
      <div class="card w-100 radius-8 shadow-sm border-0" style="overflow: hidden">
          <div class="card-body">
            <div class="col-md-7 float-end p-3">
              <img src="{{ asset('storage/'.$data->photo) }}" class="card-img-top radius-8" alt="...">
            </div>
            <div class="col-md-5 float-start p-3">
              <h4 class="card-title mt-3 fw-bold">{{ $data->name }}</h4>
              <p class="text-grey-light fs-10">Detail - {{ $data->brand->brand }} - {{ $data->type->type.' '.$data->type->year }}</p>
              <p class="card-text fs-11 text-justify">{{ $data->description }}</p>
              <div class="p-2"></div>
              <h5 class="float-start mt-2 text-dark fw-bold">Rp. {{ number_format($data->price) }}</h5>
              <a href="#" data-bs-toggle="modal" data-bs-target="#checkoutModal" class="btn btn-dark btn-sm float-end px-5 py-2">Check Out</a>
            </div>
          </div>

        </div>
      </div>
    </div>
    
  </div>

  <!-- Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="checkoutModalLabel">Konfirmasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/transaction" method="POST">
        @csrf

        <div class="modal-body">
          <p class="text-center">Apakah anda yakin akan membeli sepeda motor{{ $data->name }}?</p>
          <input type="hidden" name="user_id" class="form-control" value="{{ $data->id!=1 }}">
          <input type="hidden" name="product_id" class="form-control" value="{{ $data->id }}">
          <input type="hidden" name="total" class="form-control" value="{{ $data->price }}">
          <label for="information">Informasi Tambahan : </label>
          <textarea name="information" id="information" class="form-control" placeholder="Tambah informasi tambahan anda disini"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Yakin</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection