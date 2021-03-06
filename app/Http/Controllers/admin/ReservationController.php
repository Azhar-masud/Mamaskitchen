<?php

namespace App\Http\Controllers\admin;

use App\Notifications\ReservationConfirmed;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Support\Facades\Notification;
class ReservationController extends Controller
{
    public function index()
    {
    	$reservation=Reservation::all();
    	return view('admin.reservation.index',compact('reservation'));
    }
    public function status($id)
    {
    	$reservation=Reservation::find($id);
    	$reservation->status=true;
    	$reservation->save();

        Notification::route('mail', $reservation->email)
            ->notify(new ReservationConfirmed());

    	Toastr::success('Reservation successfully Comfirmed!','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function destroy($id)
    {
    	Reservation::destroy($id);
    	Toastr::success('Reservation successfully Deleted!','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
