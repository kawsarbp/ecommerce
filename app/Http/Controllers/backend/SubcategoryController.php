<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Exception;

class SubcategoryController extends Controller
{
    /*add subcategory*/
    public function addSubcategory()
    {

        $categories = Category::select('id', 'user_id', 'name', 'slug', 'status')->where('status', 'active')->orderBy('name', 'asc')->get();
        return view('admin.subcategory.add-subcategory', compact('categories'));
    }

    /*subcategory manage*/
    public function manageSubcategory()
    {
        $subcategories = Subcategory::with('category')->select('id', 'user_id', 'category_id', 'name', 'slug', 'status')->orderBy('id', 'desc')->get();
        return view('admin.subcategory.manage-subcategory', compact('subcategories'));
    }

    /*update status with ajax*/
    public function updateStatus($id, $status)
    {
        $brand = Subcategory::find($id);
        $brand->status = $status;
        if ($brand->save()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /*delete subcategory*/
    public function delete($id)
    {
        $id = base64_decode($id);
        $brand = Subcategory::find($id);
        $brand->delete();
        message('success', 'Sub Category has been successfully deleted!');
        return redirect()->back();
    }

    /*subcategory store*/
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required|string|unique:subcategories,name'
        ]);
        Subcategory::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category,
            'name' => $request->name,
            'slug' => str_replace(' ', '-', $request->name),
            'status' => 'active',
        ]);
        message('success', 'Sub category has been successfully created!');
        return redirect()->route('subcategory.manageSubcategory');
    }

    /*edit category form*/
    public function edit($id)
    {
        $id = base64_decode($id);
        $subcategory = Subcategory::find($id);
        $categories = Category::select('id', 'user_id', 'name', 'slug', 'status')->where('status', 'active')->orderBy('name', 'asc')->get();
        return view('admin.subcategory.edit-subcategory', compact('subcategory', 'categories'));
    }

    /*update category*/
    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);

        $request->validate([
            'category' => 'required',
            'name' => 'required|string|unique:subcategories,id,' . $id
        ]);

        $subcategory->user_id = auth()->id();
        $subcategory->category_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->slug = str_replace(' ', '-', $request->name);
        $subcategory->status = 'active';
        $subcategory->save();

        message('success', 'sub category has been successfully updated!');
        return redirect()->route('subcategory.manageSubcategory');

    }
}
