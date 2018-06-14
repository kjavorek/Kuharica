<?php

namespace App\Http\Controllers;
use App\Photos;
use Illuminate\Http\Request;

class MyPhotosController extends Controller
{
    public function show()
    {
        $gallery= Photos::all();
        return view('myPhotos', [
            'fotografije' => $gallery
        ]);
    }
    
}