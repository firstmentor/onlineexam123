@extends('admin.layout.master')
@section('title','Edit Exam')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Exam</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Manage Exams</a></li>
                <li class="breadcrumb-item"><a href="#">Edit Exam</a></li>
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
                  <h3 class="card-title">Edit Exam</h3>
                </div>
                <div class="card-body">
                    @if (Session::get('status'))
                    <div class="alert alert-info" role="alert">
                        {{ Session::get('status') }}
                    </div>  
                    @endif
                   
                    <form  action="{{ url('/exam/update_exam') }}" method="post" class="all_update">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label for="exampleInput1">Update title </label>
                        <input type="text" class="form-control" name="exam_title" placeholder="title" value="{{$data['title']}}" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInput1">update Date </label>
                            <input type="date" class="form-control"  name="exam_date" placeholder="Date" value="{{$data['exam_date']}}" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInput1"> Update Category  </label>
                          <select name="exam_category" class="form-control" value="{{$data['category']}}" >
                                <option value="">Select</option>
                                @foreach ($category as $cat)
                                  <option <?php if($data['category']==$cat['name']){ echo "selected"; }
                                      ?> value="{{$cat['name']}}">{{$cat['name']}}</option>
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