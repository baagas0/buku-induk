<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KelulusanImport;

class KelulusanController extends Controller
{
    public function getInput(){
        return view('teacher.kelulusan.input');
    }
    
    public function postProccessInput(Request $request){
        $data = $request->all();
        
        $import = Excel::import(new KelulusanImport($data), $request->file_nilai, null, \Maatwebsite\Excel\Excel::XLSX);
        dd($import);
    }
}
