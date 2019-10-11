<?php

namespace App\Http\Controllers\admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
class ContactController extends Controller
{
    public function index()
    {
    	$contact= Contact::all();
    	return view('admin.contact.index',compact('contact'));
    }
    public function show($id)
    {
    	$contact=Contact::find($id);
    	return view('admin.contact.show',compact('contact'));
    }
    public function destroy($id)
    {
    	Contact::destroy($id);
    	Toastr::success('Message successfully Deleted!','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
