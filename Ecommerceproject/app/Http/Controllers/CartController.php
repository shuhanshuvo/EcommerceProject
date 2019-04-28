<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;

class CartController extends Controller
{
    public function add_to_cart(Request $request)

    {
      $quantity=$request->quantity;
      $products_id=$request->products_id;

      $product_info=DB::table('tbl_products')
             ->where('products_id',$products_id)
             ->first();
     
       $data['qty']=$quantity;
       $data['id']= $product_info->products_id;
       $data['name']= $product_info->product_name;
       $data['price']= $product_info->product_price;
       $data['options']['image']= $product_info->product_image;
       
       Cart::add($data);
       return Redirect::to('/show-cart');

    }

    public function show_cart()
    {

    	$all_category_publish=DB::table('tbl_category')
    	                  ->where('publication_status',1)
    	                  ->get();



    	$manage_category_publish=view ('add_to_cart')

    	    ->with('all_category_publish',$all_category_publish);

    	return view ('layout')
    	   ->with('add_to_cart',$manage_category_publish);                  
    }

    public function delete_to_cart($rowId)
    {

    	Cart::update($rowId,0);
    	return Redirect::to('/show-cart');
    }

    public function update_to_cart(Request $request)
    {

    $qty=$request->qty;
    $rowId=$request->rowId;

    Cart::update($rowId,$qty);
    	return Redirect::to('/show-cart');

    }

}



