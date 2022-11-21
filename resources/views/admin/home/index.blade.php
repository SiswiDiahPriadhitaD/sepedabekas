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
    <div class="col-lg-4 col-xlg-3">
      <div class="card">
        <div class="card-body">
          <center class="mt-4">
            @if (Auth::user()->photo == null)
              <img src="{{ asset('assets/images/users/5.jpg') }}" class="rounded-circle" width="150" />
            @else
              <img src="{{ asset('storage/'.Auth::user()->photo) }}" class="rounded-circle" width="150" />
            @endif
            <h4 class="card-title mt-2">{{ Auth::user()->name }}</h4>
            <h6 class="card-subtitle">Accounts {{ Auth::user()->role }} SeKas corp</h6>
            <div class="row text-center justify-content-md-center">
              <div class="col-4"><a href="javascript:void(0)" class="link"><i
                class="mdi mdi-account-network"></i>
                <font class="font-medium">254</font>
                </a>
              </div>
              <div class="col-4"><a href="javascript:void(0)" class="link"><i
                class="mdi mdi-camera"></i>
                <font class="font-medium">54</font>
                </a>
              </div>
            </div>
          </center>
        </div>
        <div>
          <hr>
        </div>
        <div class="card-body">
          <small class="text-muted">Email address </small>
          <h6>{{ Auth::user()->email }}</h6>
          <small class="text-muted pt-4 db">Phone</small>
          <h6>+{{ Auth::user()->phone }}</h6>
          <small class="text-muted pt-4 db">Address</small>
          <h6>{{ Auth::user()->address }}</h6>
          <div class="map-box">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508"
              width="100%" height="150" frameborder="0" style="border:0"
              allowfullscreen></iframe>
          </div>
          <small class="text-muted pt-4 db">Social Profile</small>
          <br />
          <button class="btn btn-circle btn-secondary"><i class="mdi mdi-facebook"></i></button>
          <button class="btn btn-circle btn-secondary"><i class="mdi mdi-twitter"></i></button>
          <button class="btn btn-circle btn-secondary"><i
            class="mdi mdi-youtube-play"></i></button>
        </div>
      </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal form-material mx-2" action="/admin/update_profile" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label class="col-md-12">Name</label>
              <div class="col-md-12">
                <input type="text" placeholder="Name"
                  class="form-control form-control-line @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}">
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
                  class="form-control form-control-line @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}">
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
                  class="form-control form-control-line @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->address }}">
                  @error('address')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12">Photo</label>
              <div class="col-md-12">
                <input type="file" placeholder="Photo"
                  class="form-control form-control-line @error('photo') is-invalid @enderror" name="photo" value="{{ Auth::user()->photo }}">
                  @error('photo')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-success text-white">Update Profile</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <form class="form-horizontal form-material mx-2" action="/admin/update_password" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label class="col-md-12">New Password</label>
              <div class="col-md-12">
                <input type="password" placeholder="New Password"
                  class="form-control form-control-line @error('password') is-invalid @enderror" name="password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12">Password Confirmation</label>
              <div class="col-md-12">
                <input type="password" placeholder="Confirm Password"
                  class="form-control form-control-line @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                  @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-info text-white">Update Password</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
    <!-- Column -->
  </div>
  
</div>
@endsection