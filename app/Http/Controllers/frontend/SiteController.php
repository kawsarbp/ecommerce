<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /*home page view*/
    public function index()
    {
        $categories = Category::with('subcategory')->select('id','user_id','name','slug','status')
            ->where('status', 'active')
            ->orderBy('id', 'desc')
            ->get();
        $sliders = Slider::get();
        $brands = Brand::select('id','brand_name','status')->where('status','active')->get();
        return view('site.home',compact('categories','sliders','brands'));
    }
    /*category wise post*/
    public function category($slug)
    {
        $id = Subcategory::where('slug',$slug)->pluck('id');
        $products = Product::where('subcategory_id',$id)->where('status','active')->get();
        $brands = Brand::select('id','brand_name','status')->where('status','active')->get();

        return view('site.category.category',compact('products','brands'));
    }
    /*show single product*/
    public function product($slug)
    {

        $id = Product::where('slug',$slug)->pluck('id');
        $product = Product::where('id',$id)->where('status','active')->first();
        $brands = Brand::select('id','brand_name','status')->where('status','active')->get();

        return view('site.product.product',compact('product','brands'));
    }

}
