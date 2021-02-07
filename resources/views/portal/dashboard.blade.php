@extends('portal.layout.master')
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
          
          <div class="col-lg-6 col-6">
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
                <a href="" class="small-box-footer btn disabled">Out of date<i class="fas fa-arrow-circle-right"></i></a>
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
                <a href="{{url('/registration_form/'.$item['id'])}}" class="small-box-footer">Register <i class="fas fa-arrow-circle-right"></i></a>
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