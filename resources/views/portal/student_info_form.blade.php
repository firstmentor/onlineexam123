@extends('portal.layout.master')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student Edit Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/portal/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Student Form</li>
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
                            <h3 class="card-title mb-3" style="width: 100%; font-size:20px;"><span
                            style="float: left; text-transform:capitalize;">{{$exam['title']}}</span><span
                                    style="float: right">{{ date('d M,y',strtotime($exam['exam_date']))}}</span></h3>

                        </div>
                        <div class="card-body">


                            <form action="{{ url('/portal/update_student_form') }}" method="post" class="all_update">
                                @csrf
                            <input type="hidden" name="id" value="{{$datas['id']}}"> 
                                <div class="form-group">
                                    <label for="exampleInput1">Name </label>
                                    <input type="text" class="form-control" name="name" placeholder="name" value="{{$datas['name']}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput1">Email </label>
                                    <input type="email" class="form-control" name="email" placeholder="email" value="{{$datas['email']}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput1">Mobile no. </label>
                                    <input type="number" class="form-control" name="mobile_no" placeholder="Mobile No" value="{{$datas['mobile_no']}}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput1">Password </label>
                                    <input type="password" class="form-control" name="password" required value="{{$pass}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput1">DOB </label>
                                    <input type="date" class="form-control" name="dob" value="{{$datas['dob']}}" placeholder="Date of birth"
                                        required>
                                </div>

                                <button type="submit" class="btn btn-primary register_exam" style="float: right">
                                    Update </button>
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
