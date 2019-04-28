<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class SuperAdminController extends Controller
{
    public function index()
    {
        $this->AdminAuthcheck();
    	return view ('admin.dashboard');
    }



    public function logout()
     {

   		Session:: flush();
   		return Redirect::to('/admin');

     }

     public function AdminAuthcheck()
     {
     	$admin_id=Session::get('admin_id');

     	if ($admin_id) {
     		  return;
     	}
     	else{

     		Redirect::to('/admin')->send();
     	}
     }
}
