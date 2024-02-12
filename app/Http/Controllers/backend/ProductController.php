<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /*add product page view*/
    public function addProduct()
    {
        $categories = Category::select('id','name')->where('status','active')->get();
        return view('admin.product.add-product',compact('categories'));
    }
    /*manage product page view*/
    public function manageProduct()
    {
        $products = Product::select('id','name','model','buying_price','selling_price','special_price','special_start','special_end','quantity','thumbnail','status')->orderBy('id','desc')->get();
        return view('admin.product.manage-product',compact('products'));
    }
    /*update status with ajax*/
    public function updateStatus($id,$status)
    {
        $product = Product::find($id);
        $product->status = $status;
        if ($product->save()){
            echo 1;
        }else{
            echo 0;
        }
    }
    /*create new product*/
    public function store(Request $request)
    {
        return $request;
    }

}
