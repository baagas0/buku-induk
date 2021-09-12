<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use PDF;
use App\{
    Kelas,
    Student,
    ThPelajaran,
    Upd,
    UpdScore,
    Aspek,
    AspekScore,
    Ketidakhadiran,
    KetidakhadiranScore,
    Kegiatan,
    Prestasi,
    Kelulusan,
    Kelompok,
};
use DB;

class PdfController extends Controller
{
    public function getZip(){
        $zip_file = 'try1.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $path = storage_path('app\public\pdf\22XBT6LZ');
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file)
        {
            // We're skipping all subfolders
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();
                // dd($filePath);
                // extracting filename with substr/strlen
                $relativePath =  substr($filePath, strlen($path) + 1);

                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return response()->download($zip_file);
    }


    public function getSingle($nis = 11800659, Request $request) {
        $year = $request->get('tahun_pelajaran');

        if ($year) {
            $th_mulai   = substr($year, 0, 4);
            $th_selesai = substr($year, -4);

            $data['tahunpelajaran'] = range($th_mulai, $th_selesai);
            $th = ThPelajaran::search($year);
        }else {
            $data['tahunpelajaran'] = array(2019);
            $th = ThPelajaran::orderBy('th_mulai', 'desc')->first();
        }

        $student = Student::where('nis', $nis)->first();
        $data['nilai'] = DB::select("
            SELECT a.code,a.name as nmkel, b.name,b.id as nameid,  b.is_sub, c.name as subname, c.id as subnameid
            from kelompoks a 
            left join mapels b on a.id=b.kelompok_id
            left join sub_mapels c on b.id = c.mapel_id
            ");

        // dd($data['nilai']);

        $data['upds'] = UpdScore::where([
            'student_id'        => $student->id,
        ])
        ->whereIn('th_pelajaran', $data['tahunpelajaran'])
        ->get()
        ->groupBy('upd_id');

        $data['aspeks'] = Aspek::get();
        // ->whereIn('th_pelajaran', $data['tahunpelajaran'])
        // ->get()
        // ->groupBy('aspek_id');

        $data['ketidakhadirans'] = Ketidakhadiran::get();
        // dd($data);
        // ->whereIn('th_pelajaran', $data['tahunpelajaran'])
        // ->get()
        // ->groupBy('ketidakhadiran_id');

        $data['kegiatans'] = Kegiatan::get();
        // ->select('*')
        // ->get()
        // ->groupBy('kegiatan_id');

        $data['kelulusans'] = Kelulusan::where([
            'student_id'        => $student->id,
        ])
        ->get();
        $data['kelompoks'] = Kelompok::with('mapel')->get();
        $data['student'] = $student;

        // return view('pdf.nilai.try', $data);

        $pdf = PDF::loadView('pdf.nilai.try', $data);
        $pdf->setOption('page-width', '210');
        $pdf->setOption('page-height', '330');

        Storage::put('public/pdf/student/'.pdfName($nis), $pdf->output());

        return $pdf->download('Erapor - '.$student->name.'.pdf');

    }
}
