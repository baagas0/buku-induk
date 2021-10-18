<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KelulusanImport;

class KelulusanController extends Controller
{
    public function getInput()
    {
        return view('master.kelulusan.input');
    }

    public function postProccessInput(Request $request)
    {
        $data = $request->all();

        $import = Excel::import(new KelulusanImport($data), $request->file_nilai, null, \Maatwebsite\Excel\Excel::XLSX);

        return redirect()->back()->with([
            'type' => 'success',
            'msg' => 'Data berhasil diproses'
        ]);
    }
}
