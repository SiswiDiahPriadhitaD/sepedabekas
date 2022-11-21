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
          <form class="form-horizontal form-material mx-2" action="/admin/product/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label class="col-md-12">Name of MotorCycle</label>
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
              <label class="col-md-12">Description</label>
              <div class="col-md-12">
                <input type="text" placeholder="Description"
                  class="form-control form-control-line @error('description') is-invalid @enderror" name="description" value="{{ $data->description }}">
                  @error('description')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12">Brand</label>
              <div class="col-md-12">
                <select name="brand_id" id="brand_id" class="form-control form-control-line @error('type') is-invalid @enderror">
                  @foreach ($brands as $item)
                    <option value="{{ $item->id }}" {{ ($data->brand_id == $item->id) ? 'selected' : '' }}>{{ $item->brand }}</option>
                  @endforeach
                </select>
                @error('brand_id')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12">Type</label>
              <div class="col-md-12">
                <select name="type_id" id="type_id" class="form-control form-control-line @error('type') is-invalid @enderror">
                  @foreach ($types as $item)
                    <option value="{{ $item->id }}" {{ ($data->type_id == $item->id) ? 'selected' : '' }}>{{ $item->type }}</option>
                  @endforeach
                </select>
                @error('type_id')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-4">
                <label class="col-md-12">Star</label>
                <div class="col-md-12">
                  <input type="number" placeholder="Star 4.0, 5.0"
                    class="form-control form-control-line @error('star') is-invalid @enderror" name="star" value="{{ $data->star }}">
                    @error('star')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>

              <div class="col-md-4">
                <label class="col-md-12">Price</label>
                <div class="col-md-12">
                  <input type="number" placeholder="Price"
                    class="form-control form-control-line @error('price') is-invalid @enderror" name="price" value="{{ $data->price }}">
                    @error('price')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>

              <div class="col-md-4">
                <label class="col-md-12">Photo</label>
                <div class="col-md-12">
                  <input type="file" placeholder="Photo"
                    class="form-control form-control-line @error('photo') is-invalid @enderror" name="photo" value="{{ $data->photo }}">
                    @error('photo')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
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