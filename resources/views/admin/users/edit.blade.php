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
          <form class="form-horizontal form-material mx-2" action="/admin/user/{{ $data->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label class="col-md-12">Email</label>
              <div class="col-md-12">
                <input type="email" placeholder="Email"
                  class="form-control form-control-line @error('email') is-invalid @enderror" name="email" value="{{ $data->email }}" readonly>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12">Name</label>
              <div class="col-md-12">
                <input type="text" placeholder="Name"
                  class="form-control form-control-line @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12">Phone</label>
              <div class="col-md-12">
                <input type="text" placeholder="Phone"
                  class="form-control form-control-line @error('phone') is-invalid @enderror" name="phone" value="{{ $data->phone }}">
                  @error('phone')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12">Address</label>
              <div class="col-md-12">
                <input type="text" placeholder="Address"
                  class="form-control form-control-line @error('address') is-invalid @enderror" name="address" value="{{ $data->address }}">
                  @error('address')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12">Role</label>
              <div class="col-md-12">
                <select name="role" id="role" class="form-control form-control-line @error('address') is-invalid @enderror">
                  <option value="{{ 'admin' }}" {{ ($data->role == 'admin') ? 'selected' : '' }}>{{ 'Admin' }}</option>
                  <option value="{{ 'customer' }}" {{ ($data->role == 'customer') ? 'selected' : '' }}>{{ 'Customer' }}</option>
                </select>
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