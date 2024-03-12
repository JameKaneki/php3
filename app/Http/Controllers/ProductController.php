<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index(Request $filter) {
        $products = DB::table('products')->select('products.id','products.name','products.image','products.price','category.category_name','products.status')
        ->join('category', 'category.id', '=', 'products.category_id')
        ->where('products.status','=','1')->get();
        return view('products',compact('products'));
    }

    public function detail($id){
        $products = DB::table('products')->select('products.id','products.product_name','products.image','products.price','category.category_name','products.status')
        ->join('category', 'category.id', '=', 'products.category_id')
        ->where('product.status','=','1')
        ->where('product.id','=',$id);
        return view('productDetail', compact('products'));
    }

    public function change_product_status(Request $store) {
        $id = $store->id;
        $product = DB::table('products')->where('id', $id)->update(['status' => 0]);
        return redirect('products');
    }

    public function create_product_status($value) {
        $product = DB::table('products')->insert($value);
        return $product;
    }

    public function filter(Request $filter) {
        $id = $filter->id;
        $products = DB::table('products')->select('id','name','price')->where('category_id','=', $id)->get();
        return view('products', compact('products'));
    }
}
