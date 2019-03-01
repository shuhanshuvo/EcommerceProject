<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();


class BrandsController extends Controller
{
    public function index()

     {
      $this->AdminAuthcheck();

     	return view('admin.add_brands');
     }

    public function save_brands(Request $request)

    {  
       $this->AdminAuthcheck();
       $data=array();

       $data['brands_id']=$request->brands_id;
       $data['brands_name']=$request->brands_name;
       $data['brands_description']=$request->brands_description;
       $data['publication_status']=$request->publication_status;
                
       DB:: table('tbl_brands')->insert($data);
       Session::put('message', 'brands added successfully !!');
       return Redirect:: to('/add-brands');

    }

    public function all_brands()

    {
      $this->AdminAuthcheck();
    	$all_brands_info=DB::table('tbl_brands')->get();
    	  $manage_brands=view ('admin.all_brands')

    	    ->with('all_brands_info',$all_brands_info);
    	 return view ('admin_layout')
    	    ->with('admin.all_brands',$manage_brands);

    	//return view ('admin.all_category');
    }
    
    public function active_brands($brands_id)

    {  

       DB::table('tbl_brands')
       ->where('brands_id',$brands_id)
       ->update(['publication_status' =>1]);
       return Redirect::to('/all-brands');
    }

     public function Inactive_brands($brands_id)

    {
       
       DB::table('tbl_brands')
       ->where('brands_id',$brands_id)
       ->update(['publication_status' =>0]);
       return Redirect::to('/all-brands');
    }
     public function edit_brands($brands_id)
    {
      $this->AdminAuthcheck();
      $brands_info=DB::table('tbl_brands')
         ->where('brands_id',$brands_id)
         ->first();
        $brands_info=view ('admin.edit_brands')

    	    ->with('brands_info',$brands_info);

    	return view ('admin_layout')
    	   ->with('admin.edit_brands',$brands_info);

             //return view('admin.edit_category');
    }
     
    public function update_brands(Request $request,$brands_id)

    {
      $this->AdminAuthcheck();
      $data=array();
      $data['brands_name']=$request->brands_name;
      $data['brands_description']=$request->brands_description;

      DB:: table('tbl_brands')
         ->where('brands_id',$brands_id)
         ->update($data);

       Session::put('message', 'brands updated successfully !!');
       return Redirect:: to('/add-brands');

    }

    public function delete_brands($brands_id)
    
    {


	  DB::table('tbl_brands')
	     ->where('brands_id',$brands_id)
	     ->delete();
    Session::put('message', 'brands deleted successfully !!');
    return Redirect::to('/all-brands');
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
