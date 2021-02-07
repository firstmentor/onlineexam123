@extends('admin.layout.master')
@section('title','Manage Portal')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Portal</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Portal</a></li>
               
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
                  <h3 class="card-title">Portal</h3>
  
                  <div class="card-tools">
                   <button class="btn btn-dark" data-toggle="modal" data-target="#Addportal">Add New</button>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered table-hover categorytable">
                    <thead>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Mobile No</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                       @foreach ($portals as $key => $item)
                         <tr>
                         <td>{{ $key + 1}}</td>
                         <td>{{ $item['name']}}</td>
                         <td>{{ $item['email']}}</td>
                         <td>{{$item['mobile_no']}}</td>
                         <td><input type="checkbox" name="status"  class="portal_status" data-id="{{ $item['id']}}"  <?php if($item['status'] == 1){ echo "checked"; }?> > </td>
                         <td><a class="btn btn-info mr-2" href="{{ url('admin_edit_portal/'.$item['id']) }}">Edit</a><a class="btn btn-danger" href="/admin/delete_portal/{{ $item['id'] }}">Delete</a></td>
                         </tr>   
                       @endforeach
                    </tbody>
                    <tfoot>
                      <th>S.no</th>
                      <th>Name</th>
                      <th>email</th>
                      <th>Mobile No</th>
                      <th>Status</th>
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
    
      <div class="modal fade" id="Addportal" tabindex="-1" role="dialog" aria-labelledby="Addportal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New portal</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form  action="{{ url('admin/add_portal') }}" method="post" class="all_add">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInput1">Enter Name </label>
                      <input type="text" class="form-control" name="name" placeholder="name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInput1">Enter Email </label>
                      <input type="email" class="form-control" name="email" placeholder="email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInput1">Enter Mobile no. </label>
                      <input type="number" class="form-control"  name="mobile_no" placeholder="Mobile No">
                    </div>
                    <div class="form-group">
                      <label for="exampleInput1">Enter Password </label>
                      <input type="password" class="form-control"  name="password" >
                    </div>
                      <button type="submit" class="btn btn-primary add_portal" style="float: right">Add</button>
                </form>
            </div>
            {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary add_cat">Add</button>
            </div> --}}
          </div>
        </div>
      </div>
</div>
@endsection