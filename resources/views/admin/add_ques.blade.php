@extends('admin.layout.master')
@section('title','Add Question')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Exam Question</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Exam Question</li>
               
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
                  <h3 class="card-title"></h3>
  
                  <div class="card-tools">
                   <button class="btn btn-dark" data-toggle="modal" data-target="#AddQuestion">Add New Question</button>
                  </div>
                </div>
                <div class="card-body">
                @if (Session::get('status'))
                 <div class="alert alert-info alert-dismissible fade show" role="alert">
                 <strong>{{Session::get('status')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                 </div>  
                @endif
                 <table class="table table-striped table-bordered table-hover categorytable">
                     <thead>
                         <th>S.no</th>
                         <th>Question</th>
                         <th>Answer</th>
                         <th>Status</th>
                         <th>Action</th>
                     </thead>
                     <tbody>
                        @foreach ($questions as $key => $item)
                          <tr>
                          <td>{{ $key + 1}}</td>
                          <td>{{ $item['question']}}</td>
                          <td>{{ $item['answer']}}</td>
                          <td><input type="checkbox" name="status"  class="ques_status" data-id="{{ $item['id']}}" value="{{ $item['status'] }}" <?php if($item['status'] == 1){ echo "checked"; }?>> </td>
                          <td><a class="btn btn-info mr-2" href="{{ url('question_edit/'.$item['id']) }}">Edit</a><a class="btn btn-danger mr-2" href="{{ url('question/delete/'.$item['id']) }}">Delete</a></td>
                          </tr>   
                        @endforeach
                     </tbody>
                     <tfoot>
                        <th>S.no</th>
                        <th>Question</th>
                        <th>Answer</th>
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
    
      <div class="modal fade" id="AddQuestion" tabindex="-1" role="dialog" aria-labelledby="AddQuestion" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalExam">Add New Question</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form  action="{{ url('exam/add_new_question') }}" method="post" class="all_add">
                    @csrf
                <input type="hidden" name="exam_id" value="{{ Request::segment(2) }}">
                      <div class="form-group">
                        <label for="exampleInput1">Enter Question </label>
                        <input type="text" class="form-control"  name="question" placeholder="Enter Question"  >
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1">Enter Option 1 </label>
                        <input type="text" class="form-control"  name="option1" placeholder="Enter Option 1"  >
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1">Enter Option 2 </label>
                        <input type="text" class="form-control"  name="option2" placeholder="Enter Option 2"  >
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1">Enter Option 3 </label>
                        <input type="text" class="form-control"  name="option3" placeholder="Enter Option 3"  >
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1">Enter Option 4 </label>
                        <input type="text" class="form-control"  name="option4" placeholder="Enter Option 4"  >
                      </div>
                      <div class="form-group">
                        <label for="exampleInput1">Enter Answer </label>
                        <input type="text" class="form-control"  name="answer" placeholder="Enter Answer"  >
                      </div>

                      {{-- <div class="form-group">
                        <label for="exampleInput1"> Select Category  </label>
                        <select name="exam_category" class="form-control">
                            <option value="">Select</option>
                            @foreach ($category as $cat)
                              <option value="{{$cat['name']}}">{{$cat['name']}}</option>
                            @endforeach
                        </select>
                      </div> --}}
                      <button type="submit" class="btn btn-primary add_ques" style="float: right">Add</button>
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