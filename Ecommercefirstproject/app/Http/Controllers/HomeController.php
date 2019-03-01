<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class HomeController extends Controller
{
    public function index ()
    {
    	$all_product_publish=DB::table('tbl_products')
         
                     ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->join('tbl_brands','tbl_products.brands_id','=','tbl_brands.brands_id')
                     ->select('tbl_products.*','tbl_category.category_name','tbl_brands.brands_name')
                     ->where('tbl_products.publication_status',1)
                     ->limit(12)
                	 ->get();


    	$manage_product_publish=view ('home_content')

    	    ->with('all_product_publish',$all_product_publish);

    	return view ('layout')
    	   ->with('home_content',$manage_product_publish);



    	//return view ('home_content');
    }
    public function show_product_by_category($category_id)

    {

        $product_by_category=DB::table('tbl_products')
                     
                     ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->select('tbl_products.*','tbl_category.category_name')
                     ->where('tbl_category.category_id',$category_id)
                     ->where('tbl_products.publication_status',1)
                     ->limit(12)
                     ->get();


        $manage_product_by_category=view ('category_by_product')

            ->with('product_by_category',$product_by_category);

        return view ('layout')
           ->with('category_by_product',$manage_product_by_category);


    }
      
       public function show_product_by_brand($brands_id)

    {
         $product_by_brand=DB::table('tbl_products')
                     
                
                     ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->join('tbl_brands','tbl_products.brands_id','=','tbl_brands.brands_id')
                     ->select('tbl_products.*','tbl_category.category_name','tbl_brands.brands_name')
                     ->where('tbl_products.publication_status',1)
                     ->where('tbl_brands.brands_id',$brands_id)
                     ->limit(12)
                     ->get();


        $manage_product_by_brand=view ('brand_by_product')

            ->with('product_by_brand',$product_by_brand);

        return view ('layout')
           ->with('brand_by_product',$manage_product_by_brand);
    

    }
     
     public function product_details_by_id($products_id)

     {

        $product_by_details=DB::table('tbl_products')
                     
                
                     ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                     ->join('tbl_brands','tbl_products.brands_id','=','tbl_brands.brands_id')
                     ->select('tbl_products.*','tbl_category.category_name','tbl_brands.brands_name')
                     ->where('tbl_products.products_id',$products_id)
                     ->where('tbl_products.publication_status',1)
                     
                     ->limit(12)
                     ->first();


        $manage_product_by_details=view ('product_details')

            ->with('product_by_details',$product_by_details);

        return view ('layout')
           ->with('product_details',$manage_product_by_details);
     }



}
