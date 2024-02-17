<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class LoadMore extends Controller
{
    public function index()
    {
        return view('practise.load-more');
    }

    public function loadMore(Request $request)
    {
        if ($request->ajax()){
            if($request->id){
                $data = Subcategory::where('id','<',$request->id)->orderBy('id','desc')->limit(4)->get();
            }else{
                $data = Subcategory::orderBy('id','desc')->limit(4)->get();
            }
        }

        return view('practise.load-more-data',compact('data'));
    }
}
