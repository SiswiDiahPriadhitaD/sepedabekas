@extends('admin.layouts.main')

@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">{{ $title }}</h4>
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
  <!-- Row -->
  <div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-9">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal form-material mx-2" action="/admin/type" method="POST">
            @csrf

            <div class="form-group">
              <label class="col-md-12">Type</label>
              <div class="col-md-12">
                <input type="text" placeholder="Type"
                  class="form-control form-control-line @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}">
                  @error('type')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12">Year of Type</label>
              <div class="col-md-12">
                <input type="text" placeholder="Year"
                  class="form-control form-control-line @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}">
                  @error('year')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-success text-white">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Column -->
  </div>
  <!-- Row -->
</div>
@endsection