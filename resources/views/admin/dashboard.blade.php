@extends('layouts.app')

@section('title','Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Category / Item</p>
                  <h3 class="card-title">{{$categoricount}} / {{$itemcount}}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">info</i>
                    <a href="#pablo">Category & Items</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">slideshow</i>
                  </div>
                  <p class="card-category">Slider</p>
                  <h3 class="card-title">{{$slidercount}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i><a href="{{route('slider.index')}}">Get more Details..</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Reservation</p>
                  <h3 class="card-title">{{$reservation->count()}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Not Confirm Reservation
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Contact</p>
                  <h3 class="card-title">{{$contactcount}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
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
                        <th>Status</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($reservation as $key=>$reserve) 

                        <tr>
                          <td>{{ $key + 1 }}</td>
                          <td>{{ $reserve->name }}</td>
                          <td>{{ $reserve->phone }}</td>
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