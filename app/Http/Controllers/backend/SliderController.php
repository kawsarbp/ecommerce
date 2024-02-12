<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class SliderController extends Controller
{
    /*add slider page*/
    public function addSlider()
    {
        return view('admin.slider.add-slider');
    }

    /*manage slider*/
    public function manageSlider()
    {
        $sliders = Slider::where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->select('id', 'user_id', 'title', 'sub_title', 'photo', 'url', 'start_date', 'end_date', 'status')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.slider.manage-slider', compact('sliders'));
    }

    /*delete slider*/
    public function delete($id)
    {
        $id = base64_decode($id);
        $slider = Slider::find($id);
        $slider->delete();
        $images = json_decode($slider->photo);
        foreach ($images as $file) {
            $image_path = public_path("uploads/slider/{$file}");
            if (File::exists($image_path)) {
                //File::delete($image_path);
                unlink($image_path);
            }
        }
        message('success', 'Slider has been successfully deleted!');
        return redirect()->back();
    }

    /*update status with ajax*/
    public function updateStatus($id, $status)
    {
        $slider = Slider::find($id);
        $slider->status = $status;
        if ($slider->save()) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /*add new slider*/
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10',
            'sub_title' => 'required|min:15',
            'url' => 'required|url',
            'start_date' => 'date',
            'end_date' => 'date',
            'photo' => 'required'
        ]);

        $photos = [];
        if ($request->hasFile('photo')) {
            foreach ($request->file('photo') as $file) {
                $file_ex = $file->getClientOriginalExtension();
                $file_name = uniqid() . date('dmyhis.') . $file_ex;
                Image::make($file)->resize(500, 250)->save(public_path('uploads/slider/') . $file_name);
                $photos[] = $file_name;
            }
        }

        /*
         * single image upload
        $file = $request->file('photo');
        $file_ex = $file->getClientOriginalExtension();
        $file_name = uniqid() . date('dmyhis.') . $file_ex;
        */

        Slider::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'photo' => json_encode($photos),
            'url' => $request->url,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'active',
        ]);
        /*image upload with image intervention*/
        // $file->move(public_path('uploads/slider/'),$file_name);
        //Image::make($file)->resize(500,250)->save(public_path('uploads/slider/').$file_name);
        message('success', 'Slider has been successfully created!');
        return redirect()->route('slider.manageSlider');
    }


}
