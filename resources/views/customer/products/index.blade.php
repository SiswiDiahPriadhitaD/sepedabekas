@extends('customer.layouts.main')

@section('content')
  <h6 class="mb-3">Home / Dashboard</h6>

  <div class="row">
    <div class="col-md-4 mb-3">
      <div class="card w-100 radius-8 shadow-sm border-0" style="overflow: hidden">
        <img src="{{ asset('D:\tubes\sepedabekas\public\assets\images\sepeda\mio.jpg') }}" class="card-img-top h-50" alt="...">
        <div class="card-body">
          <h5 class="card-title">Mio 2022</h5>
          <p class="text-grey-light top-5 fs-10">Detail - {{ 'Honda' }} - {{ 'Honda 2022' }}</p>
          <p class="card-text fs-11 top-5">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <h5 class="float-start mt-2 text-dark fw-bold">Rp. {{ number_format(123009400) }}</h5>
          <a href="/product/4/show" class="btn btn-secondary btn-sm float-end px-5 py-2">Buy Now</a>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <div class="card w-100 radius-8 shadow-sm border-0" style="overflow: hidden">
        <img src="{{ asset('ui/images/pcx.jpeg') }}" class="card-img-top h-50" alt="...">
        <div class="card-body">
          <h5 class="card-title">pcx 2019</h5>
          <p class="text-grey-light top-5 fs-10">Detail - {{ 'PCX' }} - {{ 'PCX 2019' }}</p>
          <p class="card-text fs-11 top-5">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <h5 class="float-start mt-2 text-dark fw-bold">Rp. {{ number_format(556009400) }}</h5>
          <a href="/product/3/show" class="btn btn-secondary btn-sm float-end px-5 py-2">Buy Now</a>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <div class="card w-100 radius-8 shadow-sm border-0" style="overflow: hidden">
        <img src="{{ asset('ui/images/vixion.jpg') }}" class="card-img-top h-50" alt="...">
        <div class="card-body">
          <h5 class="card-title">vixion 2022</h5>
          <p class="text-grey-light top-5 fs-10">Detail - {{ 'vixion' }} - {{ 'vixion 2022' }}</p>
          <p class="card-text fs-11 top-5">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <h5 class="float-start mt-2 text-dark fw-bold">Rp. {{ number_format(787009400) }}</h5>
          <a href="/product/1/show" class="btn btn-secondary btn-sm float-end px-5 py-2">Buy Now</a>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <div class="card w-100 radius-8 shadow-sm border-0" style="overflow: hidden">
        <img src="{{ asset('ui/images/mio.jpeg') }}" class="card-img-top h-50" alt="...">
        <div class="card-body">
          <h5 class="card-title">Mio 2014</h5>
          <p class="text-grey-light top-5 fs-10">Detail - {{ 'mio' }} - {{ 'mio 2014' }}</p>
          <p class="card-text fs-11 top-5">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <h5 class="float-start mt-2 text-dark fw-bold">Rp. {{ number_format(93009400) }}</h5>
          <a href="/product/2/show" class="btn btn-secondary btn-sm float-end px-5 py-2">Buy Now</a>
        </div>
      </div>
    </div>
    
  </div>
@endsection