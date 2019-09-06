@extends('layouts.app')

@section('title','Category')

@push('css')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            	<a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a>
              @include('layouts.partial.msg')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Catagory</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Update At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                      	@foreach($categoris as $key=>$category) 

            						<tr>
            							<td>{{ $key + 1 }}</td>
            							<td>{{ $category->name }}</td>
            							<td>{{ $category->slug }}</td>
            							<td>{{ $category->created_at }}</td>
            							<td>{{ $category->updated_at  }}</td>
                          <td><a href="{{ route('category.edit',$category->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                          <form id="delete-form-{{ $category->id }}" method="POST" action="{{route('category.destroy',$category->id)}}" style="display: none;">
                            @csrf
                            @method('DELETE')
                          </form>
                          <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('aer you sure? you want to delete this?')) {
                            event.preventDefault();
                            document.getElementById('delete-form-{{$category->id}}').submit();
                          }else{
                            event.preventDefault();
                          }"><i class="material-icons">delete</i></button>
                          </td>
            						</tr>

                      	@endforeach 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('script')
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function() {
   			 $('#table').DataTable();
		} );
	</script>
@endpush