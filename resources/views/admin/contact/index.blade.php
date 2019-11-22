@extends('layouts.app')

@section('title','Slider')

@push('css')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Contact Message</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Subjact</th>
                        <th>Send At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                      	@foreach($contact as $key=>$contacts) 

            						<tr>
            							<td>{{ $key + 1 }}</td>
            							<td>{{ $contacts->name }}</td>
            							<td>{{ $contacts->subject }}</td>
            							<td>{{ $contacts->created_at }}</td>
                          <td><a href="{{route('contact.show',$contacts->id)}}" class="btn btn-info btn-sm"><i class="material-icons">details</i></a>

                          <form id="delete-form-{{ $contacts->id }}" method="POST" action="{{route('contact.destroy',$contacts->id)}}" style="display: none;">
                            @csrf
                            @method('DELETE')
                          </form>
                          <button type="button" onclick="deleteads({{ $contacts->id }})" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target=".bd-example-modal-lg" title="Delete"><i class="material-icons">delete</i></button>
                          {{-- <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('aer you sure? you want to delete this?')) {
                            event.preventDefault();
                            document.getElementById('delete-form-{{$contacts->id}}').submit();
                          }else{
                            event.preventDefault();
                          }"><i class="material-icons">delete</i></button> --}}
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