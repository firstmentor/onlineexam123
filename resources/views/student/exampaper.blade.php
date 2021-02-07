@extends('student.layout.examlayout')
@section('title',$exam_info[0]['title'])
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
        .countdown-styled-mobile {
            display:none;
        }
    }

    @media only screen and (max-width: 767px) {
        body {
            margin: 0 !important;
        }
        .countdown-styled-mobile {
            display:block;
            font-size: 16px;
            text-align: left;
            color:#44a1ef !important;
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


<div id="page-wrapper" class="examform" >


    <div class="container-fluid">

        <!-- Page Heading -->


        <div class="row">
            <div class="col-md-9 col-12">
                <form action="{{url('student/submit_exam')}}" method="post" class="submit_exam">
                    @csrf
                    <input type="hidden" name="exam_id" value="{{ Request::segment(2) }}">
                    <div class="panel panel-custom">

                        <div class="panel-heading">
                            <h1>

                                <span class="text-uppercase"> {{ $exam_info[0]['title'] }}

                                </span>

                                : Question

                                <span id="question_number">
                                    1


                                </span>

                                of {{$count_question}}

                            </h1>
                        

                            <div  class="countdown-styled-mobile timerdiv  text-success">
                                <span class="text-uppercase text-left"> Time left :

                                </span>
                                <span Class="text-right">
                                    <span class="hours">00</span> :
                                    <span class="mins">60</span> :
                                    <span class="seconds">10</span>
                                </span>

                            </div>

                        </div>

                        <div class="panel-body question-ans-box">
                            <div class="questions-list">
                                @foreach ($question as $key => $ques)
                                <?php
                                    $option = json_decode($ques['options']);
                                ?>
                                <div class="question_div " style="display: none;">
                                    <input type="hidden" name="question{{$key + 1 }}" value="{{$ques['id']}}">
                                    <div class="questions">
                                        <span class="language_l1">
                                            <p><strong>{{$ques['question']}}</strong></p>
                                            <p>&nbsp;</p>
                                        </span>
                                    </div>
                                    <hr>
                                    <div class="select-answer">
                                        <ul class="row list-style-none">
                                            <li class="col-md-6 position-relative d-flex align-items-center">
                                                <input type="radio" name="ans{{$key+1}}" value="{{ $option->option1 }}"
                                                    class="mr-2">
                                                <span> {{ $option->option1 }}</span>
                                            </li>
                                            <li class="col-md-6 position-relative">
                                                <input type="radio" name="ans{{$key+1}}" value="{{ $option->option2 }}"
                                                    class="mr-2">
                                                <span> {{ $option->option2 }}</span>
                                            </li>
                                            <li class="col-md-6 position-relative">
                                                <input type="radio" name="ans{{$key+1}}" value="{{ $option->option3 }}"
                                                    class="mr-2">
                                                <span> {{ $option->option3 }}</span>
                                            </li>
                                            <li class="col-md-6 position-relative">
                                                <input type="radio" name="ans{{$key+1}}" value="{{ $option->option4 }}"
                                                    class="mr-2">
                                                <span> {{ $option->option4 }}</span>
                                            </li>
                                            <li style="display:none;"><input type="radio" name="ans{{ $key + 1}}"
                                                    value="0" checked="checked" class="mr-2"> {{ $option->option4 }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-lg btn-success button prev" type="button">
                                        previous
                                    </button>
                                    <button class="btn btn-lg btn-success button next" type="button">
                                        next
                                    </button>
                                    <button class="btn btn-lg btn-danger button exam_submit_button  submit_exam finish"
                                        type="submit">
                                        Finish Test
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{ $key + 1 }}" name="index">
                </form>
            </div>
        </div>
    </div>
</div>
<aside class="right-sidebar mt-50" id="rightSidebar">
  <div class="panel panel-right-sidebar ">
        <div class="panel-heading">
            <h2>Time Status</h2>
        </div>
        <div class="panel-body">
            <div  class="countdown-styled timerdiv text-success">
                <span class="hours">00</span> :
                <span class="mins">60</span> :
                <span class="seconds">10</span>

            </div>
        </div>
        <div class="panel-heading countdount-heading">
            <h2>Total Time <span class="pull-right">00:60:00</span></h2>
        </div>
        <div class="panel-body">
            <div class="sub-heading">
                <h3>{{ $exam_info[0]['title'] }}</h3>
                <p>{{ $exam_info[0]['title'] }}</p>
            </div>
            <ul class="question-palette" id="pallete_list">
                @for ($i = 1; $i <= $count_question; $i++) <li class="palette pallete-elements not-visited"
                    onclick="showSpecificQuestion({{$i-1}});">
                    <span>{{$i}}</span>
                    </li>
                    @endfor
            </ul>
        </div>
    </div>
</aside>
<!-- /#page-wrapper -->
@stop
@section('question_script')
<script>
    var DURATION = 500;
    var DIV_REFERENCE = $('.question-ans-box .questions-list .question_div');
    var MAXIMUM_QUESTIONS = {{$count_question}}
    var VISIBLE_ELEMENT = '.question-ans-box .questions-list .question_div:visible';
    DIV_REFERENCE.first().show();
    checkButtonStatus();

    function showSpecificQuestion(index) {
        $(VISIBLE_ELEMENT).hide();
        $('.question-ans-box .questions-list .question_div:eq(' + index + ')').fadeIn();
        doGeneralOperations();
    }
    // onlclick of next button

    $('.next').click(function () {
        $(VISIBLE_ELEMENT).next('div').fadeIn(DURATION).prev().hide();
        doGeneralOperations();
    });

    function checkButtonStatus() {
        CURR_INDEX = getCurrentIndex() + 1;
        if (CURR_INDEX == MAXIMUM_QUESTIONS){
            $('.next').fadeOut();
            $('.prev').fadeIn();
            $('.next #markbtn').show();
        }else if (CURR_INDEX == 1){
            $('.prev').fadeOut();
            $('.next').fadeIn();
        } else
        {
            $('.next').show();
             $('.prev').show();
        }
    }

    function getCurrentIndex() {
        return $(VISIBLE_ELEMENT).index();
    }

    function setQuestionNumber() {
        $('#question_number').html(getCurrentQuestionNumber());
    }

    function doGeneralOperations() {
        setQuestionNumber();
        checkButtonStatus();
        return false;
    }

    function getCurrentQuestionNumber() {
        return $(VISIBLE_ELEMENT).index() + 1;
    }

    // onlclick of prev button

    $('.prev').click(function () {
        $(VISIBLE_ELEMENT).prev('div').fadeIn(DURATION).next().hide();
        doGeneralOperations();
    });
    var interval;

    function countdown() {
        clearInterval(interval);
        interval = setInterval(function () {
            var hours = $('.timerdiv .hours').html();
            var minutes = $('.timerdiv .mins').html();
            var seconds = $('.timerdiv .seconds').html();
            seconds -= 1;
            if (minutes < 0) return;
            else if (seconds < 0 && minutes != 0) {
                minutes -= 1;
                seconds = 59;
            } else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;

            $('.timerdiv .mins').html(minutes);
            $('.timerdiv .seconds').html(seconds);

            if (minutes == 0 && seconds == 0) {
                clearInterval(interval);
                alert('time UP');
                $('.exam_submit_button').trigger('click');

            }
        }, 1000);
    }

    countdown();

</script>

@endsection
