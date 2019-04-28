<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class ProductController extends Controller
{
    public function index()
    {
      $this->AdminAuthcheck();
     return view('admin.add_product');

    }



    public function all_product()

    {
      $this->AdminAuthcheck();
    	$all_product_info=DB::table('tbl_products')
         
         ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
         ->join('tbl_brands','tbl_products.brands_id','=','tbl_brands.brands_id')
         ->select('tbl_products.*','tbl_category.category_name','tbl_brands.brands_name')
    	->get();


    	$manage_product=view ('admin.all_product')

    	    ->with('all_product_info',$all_product_info);

    	return view ('admin_layout')
    	   ->with('admin.all_product',$manage_product);

    	//return view ('admin.all_category');
    }

      
    public function save_product(Request $request)

   {

    $this->AdminAuthcheck();
    $data=array();
       $data['products_id']=$request->products_id;
       $data['product_name']=$request->product_name;
       $data['category_id']=$request->category_id;
       $data['brands_id']=$request->brands_id;
       $data['product_short_description']=$request->product_short_description;
       $data['product_long_description']=$request->product_long_description;
       $data['product_price']=$request->product_price;
       $data['product_size']=$request->product_size;
       $data['product_color']=$request->product_color;
       $data['publication_status']=$request->publication_status;
       $image=$request->file('product_image');

       if ($image) {
       	$image_name=str_random(20);
       	$ext=strtolower($image->getClientOriginalExtension());
       	$image_full_name=$image_name.'.'.$ext;
       	$upload_path='image/';
       	$image_url=$upload_path.$image_full_name;
       	$success=$image->move($upload_path,$image_full_name);
       	if ($success) {
       		$data['product_image']=$image_url;
       		DB::table('tbl_products')->insert($data);
       		Session::put('message', 'product added successfully !!');
                return Redirect::to('/all-product');
       		
       	}
       
       }
       
        $data['product_image']='';
       	    DB::table('tbl_products')->insert($data);
       		Session::put('message', 'product added successfully without image!!');
            return Redirect::to('/add-product');
   }


 public function active_product($products_id)

    {
       DB::table('tbl_products')
       ->where('products_id',$products_id)
       ->update(['publication_status' =>1]);
       Session::put('message', 'Active successfully !!');
            return Redirect:: to('/all-product');
    }

     public function Inactive_product($products_id)

    {
       DB::table('tbl_products')
       ->where('products_id',$products_id)
       ->update(['publication_status' =>0]);
        Session::put('message', 'Inactive successfully !!');
       return Redirect::to('/all-product');
    } 

    public function edit_product($products_id)

    {
     $this->AdminAuthcheck();
     $product_info=DB:: table('tbl_products')
         ->where('products_id',$products_id)
         ->first();

         $product_info=view ('admin.edit_product')

    	    ->with('product_info',$product_info);

    	return view ('admin_layout')
    	   ->with('admin.edit_product',$product_info);

             //return view('admin.edit_category');
    }
     
    public function update_product(Request $request,$products_id)

    {

    $this->AdminAuthcheck();   
     $data=array();
       $data['products_id']=$request->products_id;
       $data['product_name']=$request->product_name;
       //$data['category_id']=$request->category_id;
      // $data['brands_id']=$request->brands_id;
       $data['product_short_description']=$request->product_short_description;
       $data['product_long_description']=$request->product_long_description;
       $data['product_price']=$request->product_price;
       $data['product_size']=$request->product_size;
       $data['product_color']=$request->product_color;
       $image=$request->file('product_image');

       if ($image) {
       	$image_name=str_random(20);
       	$ext=strtolower($image->getClientOriginalExtension());
       	$image_full_name=$image_name.'.'.$ext;
       	$upload_path='image/';
       	$image_url=$upload_path.$image_full_name;
       	$success=$image->move($upload_path,$image_full_name);
       	if ($success) {
       		$data['product_image']=$image_url;
       		/*DB::table('tbl_products')->where('products_id',$products_id)->update($data );
       		Session::put('message', 'product added successfully !!');
                return Redirect::to('/add-product');*/
       		
       	}
       
       }
       

       	    DB::table('tbl_products')
       	    ->where ('products_id',$products_id)
       	    ->update($data);
       		Session::put('message', 'product updated successfully !!');
            return Redirect::to('/all-product');

    }

    public function delete_product($products_id)
    {
	  DB::table('tbl_products')
	     ->where('products_id',$products_id)
	     ->delete();
  
          Session::put('message', 'Products deleted successfully !!');
          return Redirect::to('/all-product');
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
