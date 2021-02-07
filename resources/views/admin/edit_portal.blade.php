@extends('admin.layout.master')
@section('title','Edit portal')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Portal</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Portal</a></li>
                <li class="breadcrumb-item"><a href="#">Edit Portal</a></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Edit Portal</h3>
                </div>
                <div class="card-body">
                    @if (Session::get('status'))
                    <div class="alert alert-info" role="alert">
                        {{ Session::get('status') }}
                    </div>  
                    @endif
                   
                    <form  action="{{ url('/admin/update_portal') }}" method="post" class="all_update">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="form-group">
                            <label for="exampleInput1">Update Name </label>
                        <input type="text" class="form-control" name="name" placeholder="name" value="{{$data->name}}" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInput1">Update Email </label>
                            <input type="email" class="form-control" name="email" placeholder="email" value="{{$data->email}}" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInput1">Update Mobile no. </label>
                            <input type="number" class="form-control"  name="mobile_no" placeholder="Mobile No" value="{{$data->mobile_no}}" required>
                          </div>
                          <button type="submit" class="btn btn-primary update_cat" style="float: right"> Update </button>
                    </form>
                  
                </div>
                <!-- /.card-body -->
                
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
    
    
</div>
@endsection