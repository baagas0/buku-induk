<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\NilaiImport;
use Maatwebsite\Excel\Facades\Excel;
use Storage;
use App\Http\Resources\NilaiResource;
use App\{
    Kelompok,
    Nilai,
    Kelas,
};
use Auth;

class NilaiController extends Controller
{
    public function getInput()
    {
        $data['kelompok'] = Kelompok::get();
        return view('teacher.nilai.main', $data);
    }
    public function getAnalisis(Request $request)
    {
        $data['kelas']      = Kelas::get();
        $semester = $request->get('semester');
        $tahun_pelajaran = $request->get('tahun_pelajaran');
        $mapel = $request->get('mapel');
        $kelas_id = $request->get('kelas_id');
        $ms = explode(",", $mapel);

        $data['kelompok'] = Kelompok::get();
        $nilai      = Nilai::query();
        if ($semester) {
            $nilai->where('semester', $semester);
        }
        $nilai->whereHas('master', function ($q) use ($tahun_pelajaran, $mapel, $ms) {
            if ($tahun_pelajaran) {
                $q->where('th_pelajaran', $tahun_pelajaran);
            }
            if ($mapel) {
                $q->where([
                    'mapel_id'          => $ms[0],
                    'sub_mapel_id'      => $ms[1],
                ]);
            }
        });
        $nilai->whereHas('student', function ($q) use ($kelas_id) {
            if ($kelas_id) {
                $q->where('kelas_id', $kelas_id);
            }
        });
        if (!$semester) {
            $nilai->limit(0);
        }
        $data['nilai'] = $nilai->get();
        return view('teacher.nilai.analisis', $data);
    }

    public function postProccessInput(Request $request)
    {
        $data = $request->all();

        $import = Excel::import(new NilaiImport($data), $request->file_nilai, null, \Maatwebsite\Excel\Excel::XLSX);

        return redirect()->back()->with([
            'type' => 'success',
            'msg' => 'Data berhasil diproses'
        ]);
    }
}
