@extends('student.layout.master')
@section('title','Exam detail')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Exams</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/student/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Exams</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!--examend-->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Infomation</h3>
                </div>
                <div class="card-body">

                 <table class="table table-striped table-bordered table-responsive-custom table-hover categorytable">
                     <thead>
                         <th>S.no</th>
                         <th>Exam</th>
                         <th>Exam date</th>

                         <th>Result</th>
                         @if(!$exam_done)
                         <th>Status</th>
                         @endif
                         <th>Action</th>
                     </thead>
                     <tbody>
                          <td>1</td>
                          <td>{{$exam->title}}</td>
                          <td>{{date('d M,y',strtotime($exam->exam_date))}}</td>
                          <td>
                            @if(!$exam_done)
                            <p>Not Appeared </p>
                            @elseif($exam_done && $exam_done->status !="completed")
                            <p>Result pending</p>
                            @else
                            <p>{{ $exam_done->correct}} / {{$ques}}</p>
                            @endif
                            </td>
                        @if(!$exam_done)
                          <td>
                            @if (strtotime($exam->exam_date) < strtotime(date('y-m-d')))
                            Completed
                            @elseif (strtotime($exam->exam_date) == strtotime(date('y-m-d')))
                            Running
                            @else
                            Pending
                            @endif
                          </td>
                        @endif
                          @if(strtotime($exam->exam_date) < strtotime(date('y-m-d')))
                             <td><a href="{{ url('join_exam/'.$exam->exam)}}" class="btn btn-danger disabled">Completed</a></td>
                          @elseif(strtotime($exam->exam_date) == strtotime(date('y-m-d')))
                            @if((date('H:i:s')>=date("H:i:s", strtotime("6:00pm")) ) && ((date('H:i:s')<=date("H:i:s", strtotime("11:30pm")))))
                             @if (!$exam_done)
                             <td><a  class="btn btn-info join-exam-button"  onclick="window.open('/join_exam/{{$exam->exam}}','_blank','height='+screen.availHeight+',width='+screen.availWidth+', toolbar=no, top=0,left=0,location=no,menubar=no, directories=no, status=no, menubar=no, scrollbars=yes,resizable=no')">Join Now</a></td>
                             @elseif(($exam_done && $exam_done->status=="started") && ((date('H:i:s')>=date("H:i:s", strtotime("6:00pm")) ) && ((date('H:i:s')<=date("H:i:s", strtotime("11:30pm"))))))
                             <td><p class="">Exam running</p></td>
                             @elseif($exam_done && $exam_done->status=="completed")
                             <td><p class="">Exam done</p></td>
                             @else
                             <td><p>Not Completed Exam</p></td>
                             @endif
                            @elseif((date('H:i:s')>=date("H:i:s", strtotime("11:30pm"))))
                            <td><p class="">Exam end</p></td>
                            @else
                            <td><p class="">Join at 6pm</p></td>
                            @endif
                          @else
                          <td><a href="{{ url('join_exam/'.$exam->exam)}}" class="btn btn-success disabled">Pending</a></td>
                          @endif

                     </tbody>
                     <tfoot>
                        <th>S.no</th>
                        <th>Exam</th>
                        <th>Exam date</th>
                        <th>Result</th>
                        @if(!$exam_done)
                         <th>Status</th>
                        @endif
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
</div>

@endsection
@section('join_button')
<script>
    $('.join-exam-button').on('click',function(){
        $(this).addClass('disabled');
    })
</script>
@endsection

