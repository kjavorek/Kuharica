<?php

namespace App\Http\Controllers;

use File;
use App\Photos;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use PhpAcademy\Image\Filters; 

class FormController extends Controller
{
    public function form()
    {     
        return view('form');
    }
    
    public function preview()
    {
        return view('form',[
            'imgName' => "tmp.jpg"
                ]);
    }
    
    public function submit(Request $request)
    {
        //var_dump();exit;
        $btnValue=$request->button;
        return $this->submitImg($request);
        
    }

    public function submitImg(Request $request){
        $imgName=$request->img;
        $this->validate($request, [
            'isPublic'     => 'required|max:8',
            'type'         => 'required',
            'description'  => 'max:4000'
                ]);
        $fileName_640  = '640_'.time() . '_' . $imgName;
        $fileName_1080  = '1080_'.time() . '_' . $imgName;
        $path='app/tmp/'.$imgName;
        if($request->isPublic){
            $newPath='public/publicImages';
        }else{
            $newPath='privateImages';
        }
        $path_640=$newPath . '/' . $fileName_640;
        $path_1080=$newPath . '/' . $fileName_1080;
        Image::make(storage_path($path))->resize(640, 640)->save(storage_path('app/' . $path_640));
        Image::make(storage_path($path))->resize(1080, 1080)->save(storage_path('app/'. $path_1080));
        if($imgName=='tmp.jpg'){
            File::delete(storage_path('app/tmp/img.jpg'));
        }
        File::delete(storage_path($path));
        /**
         * Save to DB
         */
        $photos = new Photos();
        $photos->isPublic        = $request->isPublic;
        $photos->url_640         = $path_640;
        $photos->url_1080        = $path_1080;
        $photos->name            = $request->name;
        $photos->mealGroup       = 1;
        $photos->description     = $request->description;
        $photos->userId          = $request->user;
        $photos->type             = $request->type;

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