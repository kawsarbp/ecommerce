<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function addSlider()
    {
        return view('admin.slider.add-slider');
    }
    public function manageSlider()
    {
        return view('admin.slider.manage-slider');
    }
}
