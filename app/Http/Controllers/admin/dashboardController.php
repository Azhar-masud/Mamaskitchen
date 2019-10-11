<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Items;
use App\Slider;
use App\Reservation;
use App\Contact;
class dashboardController extends Controller
{
    //
    public function index()
    {
    	$categoricount=Category::count();
    	$itemcount=Items::count();
    	$slidercount=Slider::count();
    	$reservation=Reservation::where('status',false)->get();
    	$contactcount=Contact::count();
    	return view('admin.dashboard',compact('categoricount','itemcount','slidercount','reservation','contactcount'));
    }
}

