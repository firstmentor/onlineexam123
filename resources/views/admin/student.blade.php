@extends('admin.layout.master')
@section('title','Manage Student')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Students</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Students</a></li>
               
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
                  <h3 class="card-title">Students</h3>
  
                  <div class="card-tools">
                   <button class="btn btn-dark" data-toggle="modal" data-target="#AddStudent">Add Student</button>
                  </div>
                </div>
                <div class="card-body">
                @if (Session::get('status'))
                 <div class="alert alert-danger" role="alert">
                    {{ Session::get('status') }}
                 </div>  
                @endif
                 <table class="table table-striped table-bordered table-hover categorytable">
                     <thead>
                         <th>S.no</th>
                         <th>Name</th>
                         <th>Dob</th>
                         <th>Mobile No</th>
                         <th>Exam</th>
                         <th>Exam date</th>
                         <th>Result</th>
                         <th>Status</th>
                         <th>Action</th>
                     </thead>
                     <tbody>
                        @foreach ($students as $key => $item)
                          <tr>
                          <td>{{ $key + 1}}</td>
                          <td>{{ $item['name']}}</td>
                          <td>{{ $item['dob']}}</td>
                          <td>{{$item['mobile_no']}}</td>
                          <td>{{$item['exam']}}</td>
                          <td>{{$item['exam_date']}}</td>
                          <td> N/A </td>
                          <td><input type="checkbox" name="status"  class="student_status" data-id="{{ $item['id']}}"  <?php if($item['status'] == 1){ echo "checked"; }?> > </td>
                          <td><a class="btn btn-info mr-2" href="{{ url('student_edit/'.$item['id']) }}">Edit</a><a class="btn btn-danger" href="student/delete/{{ $item['id'] }}">Delete</a></td>
                          </tr>   
                        @endforeach
                     </tbody>
                     <tfoot>
                        <th>S.no</th>
                         <th>Name</th>
                         <th>Dob</th>
                         <th>Mobile No</th>
                         <th>Exam</th>
                         <th>Exam date</th>
                         <th>Result</th>
                         <th>Status</th>
                         <th>Action</th>
                     </tfoot>
                 </table>
                </div>
                <!-- /.card-body -->
                
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
    
      <div class="modal fade" id="AddStudent" tabindex="-1" role="dialog" aria-labelledby="AddStudent" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalExam">Add New Student</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form  action="{{ url('student/add_student') }}" method="post" class="all_add">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInput1">Enter Name </label>
                        <input type="text" class="form-control" name="name" placeholder="name" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1">Enter Email </label>
                        <input type="email" class="form-control" name="email" placeholder="email" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1">Enter Mobile no. </label>
                        <input type="number" class="form-control"  name="mobile_no" placeholder="Mobile No" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1">Enter Password </label>
                        <input type="password" class="form-control"  name="password"  required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1">Select DOB </label>
                        <input type="date" class="form-control"  name="dob" placeholder="Date of birth" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1"> Select Exam  </label>
                        <select name="exam" class="form-control">
                            <option value="">Select</option>
                            @foreach ($exams as $exam)
                              <option value="{{$exam['id']}}">{{$exam['title']}}</option>
                            @endforeach
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary add_exam" style="float: right">Add</button>
                </form>
            </div>
            {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary add_cat">Add</button>
            </div> --}}
          </div>
        </div>
      </div>
</div>
@endsection