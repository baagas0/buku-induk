<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KetidakhadiranImport;

class PrestasiController extends Controller
{
    public function getInput()
    {
        return view('teacher.prestasi.input');
    }

    public function postProccessInput(Request $request)
    {
        $data = $request->all();

        $import = Excel::import(new KetidakhadiranImport($data), $request->file_nilai, null, \Maatwebsite\Excel\Excel::XLSX);
        dd($import);
    }
}
