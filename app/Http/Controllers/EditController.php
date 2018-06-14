<?php

namespace App\Http\Controllers;

use File;
use App\Photos;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use PhpAcademy\Image\Filters; 

class EditController extends Controller
{
    public function edit()
    {     
        $findFoto = Photos::where('id', $_GET['id'])->get();
        return view('edit', [
            'foto' => $findFoto
            ]);
    }
    
    public function submit(Request $request)
    {
        //var_dump();exit;
        //$btnValue=$request->button;
        return $this->submitImg($request);
        
    }

    public function submitImg(Request $request){
        $imgId=$request->id;
        $this->validate($request, [
            'isPublic'     => 'required|max:8',
            'type'         => 'required',
            'description'  => 'max:4000'
                ]);
        /**
         * Save to DB
         */
        $photos = Photos::find($imgId);
        $photos->name            = $request->name;
        $photos->description     = $request->description;
        $photos->isPublic        = $request->isPublic;
        $photos->type            = $request->type;
        $photos->save();
        
        return redirect('thankyou');
    }
    
    public function thankyou()
    {
        $gallery= Photos::all();
        return view('index', [
            'fotografije' => $gallery
        ]);
    }

}