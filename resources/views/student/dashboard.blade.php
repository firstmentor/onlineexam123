@extends('student.layout.master')
@section('title','Student Dashboard')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @foreach ($exam_data as $item)

                <div class="col-lg-6 col-12">
                    <!-- small box -->
                    @if (strtotime(date('y-m-d'))>strtotime($item['exam_date']))

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $item['title']}}</h3>
                            <p>{{ $item['exam_date'] }}</p>
                            <p>{{ $item['category'] }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                    @else
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $item['title']}}</h3>
                            <p>{{ $item['exam_date'] }}</p>
                            <p>{{ $item['category'] }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="col-lg-6 col-12">
                    <!-- small box -->
                    @if(strtotime(date('y-m-d'))>=strtotime($item['exam_date']))
                    @if(!$exam_result)
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $item['title']}} Result</h3>
                            <p></p>
                            <p>Not given Exam</p>
                        </div>
                    </div>
                    @elseif($exam_result && $exam_result['status'] == 'started')
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $item['title']}} Result</h3>
                            <p class="m-0 p-3"></p>
                            <p>Not Completed Exam</p>
                        </div>
                    </div>
                    @else
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $item['title']}} Result</h3>
                            <p class="d-flex justify-content-between"><span class="text-left">Total Question : {{$exam_result['correct'] + $exam_result['wrong']}}</span><span class="text-right">Total Correct Answer : {{$exam_result['correct']}}</span></p>
                            <p>Completed</p>
                        </div>
                    </div>
                    @endif
                    @else
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $item['title']}} Result</h3>
                            <p>Pending</p>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!--examend-->
</div>
@endsection