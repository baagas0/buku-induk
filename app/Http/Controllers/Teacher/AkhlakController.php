<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AkhlakImport;

class AkhlakController extends Controller
{
    public function getInput(){
        return view('teacher.akhlak.input');
    }
    public function postProccessInput(Request $request){
        $data = $request->all();
        
        $import = Excel::import(new AkhlakImport($data), $request->file_nilai, null, \Maatwebsite\Excel\Excel::XLSX);
        dd($import);
    }
}
