<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /*add product page view*/
    public function addProduct()
    {
        $categories = Category::select('id', 'name')->where('status', 'active')->get();
        $subcategories = Subcategory::select('id', 'name')->where('status', 'active')->get();
        $brands = Brand::select('id', 'brand_name')->where('status', 'active')->get();
        return view('admin.product.add-product', compact('categories', 'subcategories', 'brands'));
    }

    /*manage product page view*/
    public function manageProduct()
    {
        $products = Product::select('id', 'name', 'model', 'buying_price', 'selling_price', 'special_price', 'special_start', 'special_end', 'quantity', 'thumbnail', 'gallery', 'status')->orderBy('id', 'desc')->get();
        return view('admin.product.manage-product', compact('products'));
    }

    /*update status with ajax*/
    public function updateStatus($id, $status)
    {
        $product = Product::find($id);
        $product->status = $status;
        if ($product->save()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /*create new product*/
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|integer',
            'subcategory' => 'required|integer',
            'brand' => 'required|integer',
            'name' => 'required|string',
            'buying_price' => 'required|integer',
            'selling_price' => 'required|integer',
            'quantity' => 'required|integer',
            'thumbnail' => 'required|image',
            'gallery' => 'required',
            'description' => 'required',
            'status' => 'required|string',
        ]);

        /*thumbnail image*/
        $file = $request->file('thumbnail');
        $file_ex = $file->getClientOriginalExtension();
        $file_name = uniqid() . date('dmyhis.') . $file_ex;
        $file->move(public_path('uploads/thumbnail/'), $file_name);
        //Image::make($file)->resize(500,250)->save(public_path('uploads/thumbnail/').$file_name);
        /*gallery image*/

        $gallery = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file2) {
                $file_ex2 = $file2->getClientOriginalExtension();
                $file_name2 = uniqid() . date('dmyhis.') . $file_ex2;
                $file2->move(public_path('uploads/gallery/'), $file_name2);
//                Image::make($file)->resize(500, 250)->save(public_path('uploads/gallery/') . $file_name);
                $gallery[] = $file_name2;
            }
        }


        Product::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory,
            'brand_id' => $request->brand,
            'name' => $request->name,
            'slug' => str_replace(' ', '-', $request->name),
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
            'model' => $request->model,
            'special_price' => $request->special_price,
            'special_start' => $request->special_start,
            'special_end' => $request->special_end,
            'quantity' => $request->quantity,
            'video_url' => $request->video_url,
            'warranty' => $request->warranty,
            'warranty_duration' => $request->warranty_duration,
            'warranty_conditions' => $request->warranty_conditions,
            'thumbnail' => $file_name,
            'gallery' => json_encode($gallery),
            'description' => $request->description,
            'long_description' => $request->long_description,
            'status' => $request->status,
        ]);

        message('success', 'Product has been successfully created!');
        return redirect()->back();

    }

    public function delete($id)
    {
        $id = base64_decode($id);
        $product = Product::find($id);
        $product->delete();
        $images = json_decode($product->gallery);
        if (is_array($images) || is_object($images)) {
            foreach ($images as $file) {
                $image_path = public_path("uploads/gallery/{$file}");
                if (File::exists($image_path)) {
                    //File::delete($image_path);
                    unlink($image_path);
                }
            }
        }
        $image_path2 = public_path("uploads/thumbnail/{$product->thumbnail}");
        if (File::exists($image_path2)) {
            //File::delete($image_path);
            unlink($image_path2);
        }
        message('success', 'Slider has been successfully deleted!');
        return redirect()->back();
    }

    /*price change witha ajax*/
    public function priceUpdate($id, $price)
    {
        $product = Product::find($id);
        $product->buying_price = $price;
        $product->save();
    }

}
