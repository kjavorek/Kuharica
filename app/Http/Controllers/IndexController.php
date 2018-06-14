<?php

namespace App\Http\Controllers;
use App\Photos;
use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;
use PhpAcademy\Image\Filters; 

class IndexController
{
    public function index()
    {
        $gallery= Photos::all();
        return view('index', [
            'fotografije' => $gallery
        ]);
    }

    public function submit(Request $request)
    {
        if ($request->hasFile('input_photo')) {
            //$fileName=$_FILES['input_photo']['name'];
            $request->input_photo->storeAs('tmp','img.jpg');
            return view('form', [
              'imgName' => 'img.jpg'
            ]);
        }
    }
    
}