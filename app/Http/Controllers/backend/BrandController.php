<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Exception;

class BrandController extends Controller
{
    public function addBrand()
    {
        return view('admin.brand.add-brand');
    }
    public function manageBrand()
    {
        $brands = Brand::select('id','brand_name','brand_slug','status')->orderby('id','desc')->get();
        return view('admin.brand.manage-brand',compact('brands'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'brand_name'=>'required|unique:brands,brand_name'
            ]);
            Brand::create([
                'brand_name' => $request->brand_name,
                'brand_slug' => str_replace(' ','-',$request->brand_name),
                'status' => 'active',
            ]);
            message('success','brand has been successfully created!');
            return redirect()->route('brand.manageBrand');
        }catch (Exception $e){
            message('danger',$e->getMessage());
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        $brand = Brand::find($id);
        $brand->delete();
        message('success','brand has been successfully deleted!');
        return redirect()->back();
    }

    public function updateStatus($id, $status)
    {
        $brand = Brand::find($id);
        $brand->status = $status;
        if ($brand->save()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $brand = Brand::find($id);

        return view('admin.brand.edit-brand',compact('brand'));
    }

    public function update(Request $request,$id)
    {
        $brand = Brand::find($id);
        try {
            $request->validate([
                'brand_name'=>'required|unique:brands,id,'.$id
            ]);

                $brand->brand_name = $request->brand_name;
                $brand->brand_slug = str_replace(' ','-',$request->brand_name);
                $brand->status = 'active';
                $brand->save();

            message('success','brand has been successfully created!');
            return redirect()->route('brand.manageBrand');
        }catch (Exception $e){
            message('danger',$e->getMessage());
            return redirect()->back();
        }
    }
}
