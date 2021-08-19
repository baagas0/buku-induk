<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class UploadController extends Controller
{
    public function postFile(Request $request){
        $file = $request->file('file');
        $path = 'public/nilai/';
        Storage::disk('local')->makeDirectory($path);
        $file_name = '-'.time().'.'.$file->clientExtension();

        if (Storage::putFileAs($path, $file, $file_name)) {
            return 'storage/nilai/'.$file_name;
        }else {
            return 'failed';
        }
    }
}
