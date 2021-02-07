@extends('admin.layout.master')
@section('title','Edit Question')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Question</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admins')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Exam Question</a></li>
                <li class="breadcrumb-item active">Edit Question</li>
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
                  <h3 class="card-title">Edit Question</h3>
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
                   
                    <form  action="{{ url('/exam/update_question') }}" method="post" class="all_update">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <?php
                        $options = json_decode($data->options);
                        ?>
                          <div class="form-group">
                            <label for="exampleInput1">Update Question </label>
                            <input type="text" class="form-control" id="question1" name="question" placeholder="Update Question"  value="{{ $data->question }}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInput1">Update Answer</label>
                            <input type="text" class="form-control" id="question2" name="answer" placeholder="Update Answer"  value="{{ $data->answer }}">
                          </div>
                          
                          <div class="form-group">
                            <label for="exampleInput1">Update Option 1</label>
                            <input type="text" class="form-control" id="option1" name="option1" placeholder="Update Option 1"  value="{{ $options->option1}}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInput1">Update Option 2</label>
                            <input type="text" class="form-control" id="option2" name="option2" placeholder="Update Option 2"  value="{{ $options->option2 }}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInput1">Update Option 3</label>
                            <input type="text" class="form-control" id="option3" name="option3" placeholder="Update Option 3"  value="{{ $options->option3 }}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInput1">Update Option 3</label>
                            <input type="text" class="form-control" id="option2" name="option4" placeholder="Update Option 4"  value="{{ $options->option4 }}">
                          </div>
                          <button type="submit" class="btn btn-primary update_ques" style="float: right"> Update </button>
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