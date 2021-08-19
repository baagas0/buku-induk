<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\UpdImport;

class UpdController extends Controller
{
    public function getInput(){
        return view('teacher.upd.input');
    }
    public function postProccessInput(Request $request){
        $data = $request->all();
        
        $import = Excel::import(new UpdImport($data), $request->file_nilai, null, \Maatwebsite\Excel\Excel::XLSX);
        dd($import);
    }
}
