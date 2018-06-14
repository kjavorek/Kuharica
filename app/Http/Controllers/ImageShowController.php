<?php

namespace App\Http\Controllers;

use App\Photos;
use App\User;
use Illuminate\Http\Request;

class ImageShowController extends Controller
{
    public function imageShow(Request $data)
    {
        $findFoto = Photos::where('id', $_GET['id'])->get();
        $user=$findFoto[0]["userId"];
        $findUser= User::where('id', $user)->get();
        return view('imageShow', [
            'foto' => $findFoto,
            'user' => $findUser
            ]);
    }
    
    public function destroy(Request $request, Photos $photo)
    {
        $imgId = basename(request()->path());
        $img = Photos::find($imgId);
        $img->delete();
        return redirect('/');
    }
    
}
