@extends('admin.layout.master')
@section('title','category')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Category</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Category</a></li>
               
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
                  <h3 class="card-title">Category</h3>
  
                  <div class="card-tools">
                   <button class="btn btn-dark" data-toggle="modal" data-target="#AddCategory">Add New</button>
                  </div>
                </div>
                <div class="card-body">
                @if (Session::get('status'))
                 <div class="alert alert-info" role="alert">
                    {{ Session::get('status') }}
                 </div>  
                @endif
                 <table class="table table-striped table-bordered table-hover categorytable">
                     <thead>
                         <th>S.no</th>
                         <th>Name</th>
                         <th>Status</th>
                         <th>Action</th>
                     </thead>
                     <tbody>
                        @foreach ($category as $key => $item)
                          <tr>
                          <td>{{ $key + 1}}</td>
                          <td>{{ $item['name']}}</td>
                          <td><input type="checkbox" name="status"  class="category_status" data-id="{{ $item['id']}}" value="{{ $item['status'] }}" <?php if($item['status'] == 1){ echo "checked"; }?>> </td>
                          <td><a class="btn btn-info mr-2" href="{{ url('admin_edit_category/'.$item['id']) }}">Edit</a><a class="btn btn-danger" href="/admin/delete_category/{{ $item['id'] }}">Delete</a></td>
                          </tr>   
                        @endforeach
                     </tbody>
                     <tfoot>
                        <th>S.no</th>
                        <th>Name</th>
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
    
      <div class="modal fade" id="AddCategory" tabindex="-1" role="dialog" aria-labelledby="AddCategory" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form  action="{{ url('admin/add_category') }}" method="post" class="all_add">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInput1">Enter Category Name </label>
                        <input type="text" class="form-control" id="exampleInput1" name="cat_name" placeholder="Name" required>
                      </div>
                      <button type="submit" class="btn btn-primary add_cat" style="float: right">Add</button>
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