@extends('customer.layouts.main')

@section('content')
  <h6 class="mb-3">Home / {{ $title }}</h6>

  <div class="row">
    @foreach ($data as $item)
      <div class="col-md-4 mb-4">
        <div class="card w-100 radius-8 shadow-sm border-0" style="overflow: hidden">
          <img src="{{ asset('storage/'.$item->photo) }}" class="card-img-top h-50" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{ $item->name }}</h5>
            <p class="text-grey-light top-5 fs-10">Detail - {{ $item->brand->brand }} - {{ $item->type->type }}</p>
            <p class="card-text fs-11 top-5">{{ substr($item->description, 0,100) }}..</p>
            <h5 class="float-start mt-2 text-dark fw-bold">Rp. {{ number_format($item->price) }}</h5>
            <a href="/product/{{ $item->id }}/show" class="btn btn-secondary btn-sm float-end px-5 py-2">Buy Now</a>
          </div>
        </div>
      </div>
    @endforeach
    
  </div>
@endsection