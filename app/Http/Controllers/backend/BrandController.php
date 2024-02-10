<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand()
    {
        return view('admin.brand.add-brand');
    }
    public function manageBrand()
    {
        return view('admin.brand.manage-brand');
    }
}
