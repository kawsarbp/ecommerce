<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Exception;
class CategoryController extends Controller
{
    /*show category add form*/
    public function addCategory()
    {
        return view('admin.category.add-category');
    }
    /*manage category*/
    public function manageCategory()
    {
        $categories = Category::select('id','user_id','name','slug','status')->orderBy('id','desc')->get();
        return view('admin.category.manage-category',compact('categories'));
    }
    /*delete category*/
    public function delete($id)
    {
        $id = base64_decode($id);
        $brand = Category::find($id);
        $brand->delete();
        message('success','Category has been successfully deleted!');
        return redirect()->back();
    }
    /*update status with ajax*/
    public function updateStatus($id,$status)
    {
        $brand = Category::find($id);
        $brand->status = $status;
        if ($brand->save()){
            echo 1;
        }else{
            echo 0;
        }
    }
    /*category add code*/
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'=>'required|unique:categories,name'
            ]);
            Category::create([
                'user_id' => auth()->id(),
                'name' => $request->name,
                'slug' => str_replace(' ','-',$request->name),
                'status' => 'active',
            ]);
            message('success','category has been successfully created!');
            return redirect()->route('category.manageCategory');
        }catch (Exception $e){
            message('danger',$e->getMessage());
            return redirect()->back();
        }
    }
    /*show edit form*/
    public function edit($id)
    {
        $id = base64_decode($id);
        $category = Category::find($id);
        return view('admin.category.edit-category',compact('category'));
    }
    /*category update*/
    public function update(Request $request, $id)
    {
        $brand = Category::find($id);
        try {
            $request->validate([
                'name'=>'required|unique:categories,id,'.$id
            ]);
            $brand->user_id = auth()->id();
            $brand->name = $request->name;
            $brand->slug = str_replace(' ','-',$request->name);
            $brand->status = 'active';
            $brand->save();

            message('success','category has been successfully created!');
            return redirect()->route('category.manageCategory');
        }catch (Exception $e){
            message('danger',$e->getMessage());
            return redirect()->back();
        }
    }

}
