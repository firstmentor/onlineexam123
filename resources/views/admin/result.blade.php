@extends('admin.layout.master')
@section('title','Results')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Results of Students</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Results</a></li>

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
                  <h3 class="card-title">Results</h3>

                  {{-- <div class="card-tools">
                   <button class="btn btn-dark" data-toggle="modal" data-target="#AddExam">Add Exam</button>
                  </div> --}}
                </div>
                <div class="card-body">
                {{-- @if (Session::get('status'))
                 <div class="alert alert-info" role="alert">
                    {{ Session::get('status') }}
                 </div>
                @endif --}}
                 <table class="table table-striped table-responsive-custom table-bordered table-hover " id="results">
                     <thead>
                         <th>S.no</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Exam</th>
                         <th>Exam date</th>
                         <th>Correct answer</th>
                         <th>Wrong Answer</th>
                         <th>Total Question</th>
                     </thead>
                     <tbody>
                        @foreach ($datas as $key => $item)
                          <tr>
                          <td>{{ $key + 1}}</td>
                          <td>{{$item->user->name}}</td>
                          <td>{{$item->user->email}}</td>
                          <td>{{$item->exam->title}}</td>
                          <td>{{$item->exam->exam_date}}</td>
                          <td>{{$item->correct}}</td>
                          <td>{{$item->wrong}}</td>
                          <td>{{$item->correct + $item->wrong}}</td>
                          </tr>
                        @endforeach
                     </tbody>
                     <tfoot>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Exam</th>
                        <th>Exam date</th>
                        <th>Correct answer</th>
                        <th>Wrong Answer</th>
                        <th>Total Question</th>
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

    </div>
@endsection
