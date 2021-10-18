<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HasilUjianImport;
use App\{
    Kelas,
    Kelompok,
    Nilai,
};

class HasilUjianController extends Controller
{
    public function getIndex(Request $request)
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
        return view('master.hasil_ujian.index', $data);
    }
    public function getInput()
    {
        $data['kelompok'] = Kelompok::get();
        return view('master.hasil_ujian.input', $data);
    }

    public function postProccessInput(Request $request)
    {
        $mapel = $request->mapel;
        $import = Excel::import(new HasilUjianImport($mapel), $request->file_nilai, null, \Maatwebsite\Excel\Excel::XLSX);

        return redirect()->back()->with([
            'type' => 'success',
            'msg' => 'Data berhasil diproses'
        ]);
    }
}
