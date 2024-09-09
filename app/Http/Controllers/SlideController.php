<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SlideController;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Http\Controllers\Controller;
 

class SlideController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::orderByDesc('id')->get();
        return response()->json(['slides' => $slides]);
    }


}

 