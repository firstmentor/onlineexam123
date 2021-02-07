@extends('portal.layout.master')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Search Student</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/student/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Search</li>
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
                  <h3 class="card-title">Search</h3>
                </div>
                <div class="card-body">
                  
                   
                <form  action="{{url('portal/student_info')}}" method="post">
                        @csrf
                          <div class="form-group">
                            <label for="exampleInput1">Mobile no. </label>
                            <input type="number" class="form-control"  name="mobile_no" placeholder="Mobile No"  required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInput1">Date Of Birth </label>
                            <input type="date" class="form-control"  name="dob"  placeholder="Date of birth" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInput1"> Select Exam  </label>
                            <select name="exam" class="form-control">
                                <option value="">Select</option>
                                @foreach ($exams as $exam)
                                  <option  value="{{$exam['id']}}">{{$exam['title']}}</option>
                                @endforeach
                            </select>
                          </div>
                          <button type="submit" class="btn btn-primary search" style="float: right"> Search </button>
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