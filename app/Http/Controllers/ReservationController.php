<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
class ReservationController extends Controller
{
    public function reserv(Request $request)
    {
    	$this->validate($request,[

    		'name'=> 'required',
    		'email'=> 'required|email',
    		'phone'=> 'required',
    		'dateandtime'=> 'required',
    		'message'=> 'required'

    	]);
    	$reserve= new Reservation();
    	$reserve->name=$request->name;
    	$reserve->email=$request->email;
    	$reserve->phone=$request->phone;
    	$reserve->date_and_time =$request->dateandtime;
    	$reserve->message=$request->message;
    	$reserve->status=false;
    	$reserve->save();
    	Toastr::success('Reservation request sent successfully. we will confirm to you shortly','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
