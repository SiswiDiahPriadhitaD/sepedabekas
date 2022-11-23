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
      <div class="col-md-6 mb-4">
        <div class="card w-100 radius-8 shadow-sm border-0" style="overflow: hidden">
          <div class="card-body m-3">
            <h5 class="card-title">{{ 'Update Profile - '.Auth::user()->name }}</h5>

            <form action="/update_profile" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              
              <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" readonly name="email" id="email" class="form-control mt-1" value="{{ Auth::user()->email }}">
              </div>

              <div class="mb-3">
                <label for="name">Name</label>
                <input type="name" name="name" id="name" class="form-control mt-1 @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="phone">Phone</label>
                <input type="number" name="phone" id="phone" class="form-control mt-1 @error('phone') is-invalid @enderror" value="{{ Auth::user()->phone }}">
                @error('phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control mt-1 @error('address') is-invalid @enderror" value="{{ Auth::user()->address }}">
                @error('address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control mt-1 @error('photo') is-invalid @enderror" value="{{ Auth::user()->photo }}">
                @error('photo')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <button type="submit" class="btn btn-dark btn-md float-end px-5 py-2">Update Profile</button>
              @if (Auth::user()->photo == null)    
                <img src="{{ asset('assets/images/users/4.jpg') }}" alt="..." class="rounded-circle" style="width: 10rem">
              @else
                <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="..." class="rounded-circle" style="width: 10rem">
              @endif
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-4">
        <div class="card w-100 radius-8 shadow-sm border-0" style="overflow: hidden">
          <div class="card-body m-3">
            <h5 class="card-title">{{ 'Update Password, - '.Auth::user()->name }}</h5>

            <form action="/update_password" method="POST">
              @csrf
              @method('PUT')
              
              <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" readonly name="email" id="email" class="form-control mt-1" value="{{ Auth::user()->email }}">
              </div>

              <div class="mb-3">
                <label for="name">Name</label>
                <input type="name" readonly name="name" id="name" class="form-control mt-1 @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" readonly name="address" id="address" class="form-control mt-1 @error('address') is-invalid @enderror" value="{{ Auth::user()->address }}">
                @error('address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-control mt-1 @error('password') is-invalid @enderror">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control mt-1 @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <button type="submit" class="btn btn-danger btn-md float-end px-5 py-2">Update Password</button>
            </form>
          </div>
        </div>
      </div>
    
  </div>
@endsection