<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HasilUjianImport;
use App\{
    Kelompok,
};

class HasilUjianController extends Controller
{
    public function getInput(){
        $data['kelompok'] = Kelompok::get();
        return view('master.hasil_ujian.input', $data);
    }
    
    public function postProccessInput(Request $request){
        $mapel = $request->mapel;
        $import = Excel::import(new HasilUjianImport($mapel), $request->file_nilai, null, \Maatwebsite\Excel\Excel::XLSX);
        dd($import);
    }
}
