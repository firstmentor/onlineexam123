@extends('admin.layout.master')
@section('title','Edit Student')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Student</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Manage Students</a></li>
                <li class="breadcrumb-item"><a href="#">Edit Students</a></li>
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
                  <h3 class="card-title">Edit Student</h3>
                </div>
                <div class="card-body">
                    @if (Session::get('status'))
                    <div class="alert alert-info" role="alert">
                        {{ Session::get('status') }}
                    </div>  
                    @endif
                   
                    <form  action="{{ url('/student/update_student') }}" method="post" class="all_update">
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
                          <div class="form-group">
                            <label for="exampleInput1">Update Password </label>
                            <input type="password" class="form-control"  name="password" value="{{$data->password}}" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInput1">Update DOB </label>
                            <input type="date" class="form-control"  name="dob" value="{{$data->dob}}" placeholder="Date of birth" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInput1"> Update Exam  </label>
                            <select name="exam" class="form-control">
                                <option value="">Select</option>
                                @foreach ($exams as $exam)
                                  <option <?php if($exam['id']==$data['exam']){ echo "selected"; } ?> value="{{$exam['id']}}">{{$exam['title']}}</option>
                                @endforeach
                            </select>
                          </div>
                          <button type="submit" class="btn btn-primary update_exam" style="float: right"> Update </button>
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