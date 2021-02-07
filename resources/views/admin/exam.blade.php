@extends('admin.layout.master')
@section('title','Manage Exams')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Manage Exams</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Manage Exams</a></li>
               
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
                  <h3 class="card-title">Exams</h3>
  
                  <div class="card-tools">
                   <button class="btn btn-dark" data-toggle="modal" data-target="#AddExam">Add Exam</button>
                  </div>
                </div>
                <div class="card-body">
                @if (Session::get('status'))
                 <div class="alert alert-info" role="alert">
                    {{ Session::get('status') }}
                 </div>  
                @endif
                 <table class="table table-striped table-bordered table-hover categorytable">
                     <thead>
                         <th>S.no</th>
                         <th>Title</th>
                         <th>Category</th>
                         <th>Exam date</th>
                         <th>Status</th>
                         <th>Action</th>
                     </thead>
                     <tbody>
                        @foreach ($exams as $key => $item)
                          <tr>
                          <td>{{ $key + 1}}</td>
                          <td>{{ $item['title']}}</td>
                          <td>{{ $item['category']}}</td>
                          <td>{{ $item['exam_date']}}</td>
                          <td><input type="checkbox" name="status"  class="exam_status" data-id="{{ $item['id']}}" value="{{ $item['status'] }}" <?php if($item['status'] == 1){ echo "checked"; }?>> </td>
                          <td><a class="btn btn-info mr-2" href="{{ url('exam_edit/'.$item['id']) }}">Edit</a><a class="btn btn-danger mr-2" href="exam/delete/{{ $item['id'] }}">Delete</a><a class="btn btn-primary" href="{{ url('add_question/'.$item['id']) }}">Add Question</a></td>
                          </tr>   
                        @endforeach
                     </tbody>
                     <tfoot>
                        <th>S.no</th>
                         <th>Title</th>
                         <th>Category</th>
                         <th>Exam date</th>
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
    
      <div class="modal fade" id="AddExam" tabindex="-1" role="dialog" aria-labelledby="AddExam" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalExam">Add New Exam</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form  action="{{ url('exam/add_exam') }}" method="post" class="all_add">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInput1">Enter title </label>
                        <input type="text" class="form-control" id="exampleInputexams1" name="exam_title" placeholder="title" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1">Select Date </label>
                        <input type="date" class="form-control" id="exampleInputexams2" name="exam_date" placeholder="Date" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1"> Select Category  </label>
                        <select name="exam_category" class="form-control">
                            <option value="">Select</option>
                            @foreach ($category as $cat)
                              <option value="{{$cat['name']}}">{{$cat['name']}}</option>
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