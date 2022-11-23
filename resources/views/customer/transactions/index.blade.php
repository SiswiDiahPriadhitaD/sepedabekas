@extends('customer.layouts.main')

@section('content')
  <h6 class="mb-3">Home / {{ $title }}</h6>

  <div class="row">
      <div class="col-md-12 mb-4">
        <div class="card w-100 radius-8 shadow-sm border-0" style="overflow: hidden">
          <div class="card-body m-5">
            <h5 class="card-title mb-3">{{ $title }} - {{ auth()->user()->email }}</h5>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#ID Transaksai</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Produk</th>
                  <th scope="col">Brand - Type</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Informasi</th>
                  <th scope="col">Total</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                  <tr>
                    <th scope="row">#{{ $item->transaction_id }}</th>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->product->brand->brand." - ".$item->product->type->type }}</td>
                    <td>{{ $item->order_date }}</td>
                    <td>{{ $item->information}}</td>
                    <td>Rp. {{ number_format($item->total) }}</td>
                    <td class="text-center">
                      @if ($item->payment->count() == 0)
                        <a href="#" data-bs-toggle="modal" data-bs-target="#unpaidModal" class="btn btn-danger text-white btn-sm">Unpaid</a>  
                      @else
                      <a href="/transaction/{{ $item->transaction_id }}/show" class="btn btn-success text-white btn-sm">Paid - Detail</a>  
                      @endif
                    </td>
                  </tr>
                @endforeach
                <tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="unpaidModal" tabindex="-1" aria-labelledby="unpaidModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="unpaidModalLabel">Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-center text-danger">Silahkan lakukan pembayaran, datang ke deller SeKas-IN dan lakukan pembayaran! setelah membayar status akan menjadi [paid-detail]</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection