@extends('portal.layout.master')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Register</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/portal/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registration</li>

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
                                    style="float: left">{{$title}}</span><span
                                    style="float: right">{{ date('d M,y',strtotime($exam_date))}}</span></h3>

                        </div>
                        <div class="card-body">


                            <form action="{{ url('/portal/registration_form_submit') }}" method="post" class="all_add">
                                @csrf
                            <input type="hidden" name="id" value="{{$id}}"> 
                                <div class="form-group">
                                    <label for="exampleInput1">Name </label>
                                    <input type="text" class="form-control" name="name" placeholder="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput1">Email </label>
                                    <input type="email" class="form-control" name="email" placeholder="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput1">Mobile no. </label>
                                    <input type="number" class="form-control" name="mobile_no" placeholder="Mobile No"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput1">Password </label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput1">DOB </label>
                                    <input type="date" class="form-control" name="dob" placeholder="Date of birth"
                                        required>
                                </div>

                                <button type="submit" class="btn btn-primary register_exam" style="float: right">
                                    Register </button>
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
