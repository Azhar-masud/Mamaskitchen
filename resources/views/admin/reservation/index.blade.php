@extends('layouts.app')

@section('title','Reservation')

@push('css')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @include('layouts.partial.msg')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Reservation</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Date & Time</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                      	@foreach($reservation as $key=>$reserve) 

            						<tr>
            							<td>{{ $key + 1 }}</td>
            							<td>{{ $reserve->name }}</td>
            							<td>{{ $reserve->phone }}</td>
            							<td>{{ $reserve->email }}</td>
            							<td>{{ $reserve->date_and_time }}</td>
            							<td>{{ $reserve->message}}</td>
                          <td>
                            @if($reserve->status == true)
                              <span class="label label-info">Confirmed</span>
                            @else
                              <span class="label label-danger">Not Confirmed Yet</span>
                            @endif  
                          </td>
                          <td>
                          @if($reserve->status == false)
                            <form id="status-form-{{ $reserve->id }}" method="POST" action="{{route('reservation.status',$reserve->id)}}" style="display: none;">
                            @csrf
                            </form>
                            <button type="button" class="btn btn-info btn-sm" onclick="if (confirm('aer you verify this request?')) {
                              event.preventDefault();
                              document.getElementById('status-form-{{$reserve->id}}').submit();
                            }else{
                              event.preventDefault();
                            }"><i class="material-icons">done</i></button>
                          @endif
                          <form id="delete-form-{{ $reserve->id }}" method="POST" action="{{route('reservation.destroy',$reserve->id)}}" style="display: none;">
                            @csrf
                            @method('DELETE')
                          </form>
                          <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('aer you sure? you want to delete this?')) {
                            event.preventDefault();
                            document.getElementById('delete-form-{{$reserve->id}}').submit();
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