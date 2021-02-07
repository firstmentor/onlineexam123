@extends('student.layout.examlayout')
@section('title','Result')
@section('style')
<style>
    #wrapper {
        padding-left: 0px;
        margin-top: 20px;
    }

    @media only screen and (min-width: 768px) {
        body {
            margin: 0 !important;
        }
    }

    @media only screen and (max-width: 767px) {
        body {
            margin: 0 !important;
        }

        .navbar {
            min-height: 65px;
        }
    }

    .navbar {
        min-height: 100px;
    }

    .navbar .navbar-brand img {
        max-width: 300px;
    }

    .select-answer li {
        min-height: 45px;
    }

    .select-answer li span {
        position: relative;
        top: 3px;
        left: 20px;
    }

    .select-answer li input:before {
        width: 20px;
        height: 20px;
        content: '';
        border: 2px solid #cacaca;
        background-color: #fff;
        position: absolute;
        left: 9px;
    }

    .select-answer li input[type="radio"]:checked:after {
        content: '';
        width: 7px;
        height: 13px;
        position: absolute;
        border: solid #30b1bd;
        transform: rotate(45deg);
        border-width: 0 2px 2px 0;
        left: 14px;
        top: 5px;
    }

    hr {
        margin: 30px 0;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

</style>
@endsection
@section('content')
<div id="page-wrapper" class="examform" onload="noback();">
    <div class="container-fluid">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">

                        <!-- Default box -->
                        <div class="panel panel-custom">

                            <div class="panel-heading">
                                <h1 class="font-size-mobile text-left" style="display: inline-block;"> Your Result </h1>
                                <button class="btn btn-primary" style="float:right;" onclick="window.open('/student/exams','_blank')"> Exit </button>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$student['name']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$student['email']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth</th>
                                        <td>{{$student['dob']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Exam Name</th>
                                        <td>{{$student['title']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Exam Date</th>
                                        <td>{{$student['exam_date']}}</td>
                                    </tr>

                                    <tr>
                                        <th>Correct Answer</th>
                                        <td>{{$result['correct']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Wrong Answer</th>
                                        <td>{{$result['wrong']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>{{$result['correct']+$result['wrong']}}</td>
                                    </tr>
                                </table>
                            </div>


                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
