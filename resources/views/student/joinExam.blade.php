@extends('student.layout.examlayout')
@section('title',$exam_info[0]['title'])
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 text-left">
                    <h1>{{ $exam_info[0]['title'] }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <h3>Timer : <span class="timer">90:00</span></h3>
                </div>
            </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Default box -->
                    <form action="{{url('student/submit_exam')}}" method="post" class="submit_exam">
                        @csrf
                    <input type="hidden" name="exam_id" value="{{ Request::segment(2) }}">
                    @foreach ($question as $key => $ques)
                    <?php
                     $option = json_decode($ques['options']);
                    ?>
                    <div class="card">

                        <div class="card-body">


                                <div class="col-sm-12 mb-3">
                                    <input type="hidden" name="question{{$key + 1 }}" value="{{$ques['id']}}">
                                    <div class="question">
                                        <h2 class="py-2">{{$key +1}} . {{$ques['question']}}</h2>
                                    </div>
                                    <ul class="option" style="padding:0; list-style:none;">
                                        <li class="mt-2 py-1 checkbox position-relative" > <input type="radio" name="ans{{$key+1}}"
                                                value="{{ $option->option1 }}" class="mr-2"> {{ $option->option1 }}</li>
                                        <li class="mt-2 py-1 checkbox position-relative"> <input type="radio" name="ans{{$key+1}}"
                                                value="{{ $option->option2 }}" class="mr-2"> {{ $option->option2 }}</li>
                                        <li class="mt-2 py-1 checkbox position-relative"><input type="radio" name="ans{{$key+1}}"
                                                value="{{ $option->option3 }}" class="mr-2"> {{ $option->option3 }}</li>
                                        <li class="mt-2  py-1 checkbox position-relative"> <input type="radio" name="ans{{$key+1}}"
                                                value="{{ $option->option4 }}" class="mr-2"> {{ $option->option4 }}</li>
                                        <li style="display:none;"><input type="radio" name="ans{{ $key + 1}}" value="0"
                                                checked="checked" class="mr-2"> {{ $option->option4 }}</li>
                                    </ul>
                                </div>



                        </div>
                        <!-- /.card-body -->

                    </div>
                    @endforeach
                    <div class="col-sm-12 text-right">

                        <input type="hidden" value="{{ $key + 1 }}" name="index">
                       <button type="submit" class="btn btn-primary  exam_submit_button submit_exam">Submit</button>
                    </div>

                </form>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection


