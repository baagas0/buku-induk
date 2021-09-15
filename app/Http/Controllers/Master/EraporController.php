<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use App\Http\Resources\{RaporPdfResource, TeacherResource};
use Auth;
use App\{
    Kelas,
    RaporPdfExport,
    RaporPdfExportHistory,
};
use Illuminate\Pagination\Paginator;

class EraporController extends Controller
{
    public function __construct(Redirector $redirect)
    {
        $this->user = '';
        // dd($this->user);
    }

    public function getIndex() {

        if (checkGuard('Waka Kurikulum') == false) {
            return redirect()->route('master.home')->with([
                'type' => 'danger',
                'msg' => 'Ooops.., Anda tidak memiliki akses kesini'
            ]);
        }

        $data['kelas'] = Kelas::get();
        return view('master.erapor.main', $data);
    }
    public function postData(Request $req) {
        Paginator::currentPageResolver(fn() => $req->pagination['page']);

        $query = RaporPdfExport::with('kelas')
        ->orderBy('id', 'desc')
        ->paginate(10);

        return new RaporPdfResource($query);
    }
    public function postProgressData(){
        return RaporPdfExport::where('status', 'proccess')->get();
    }

    public function postSaving(Request $req) {
        RaporPdfExport::create([
            'kelas_id' => $req->kelas_id,
            'th_pelajaran' => json_encode($req->th_pelajaran),
        ]);
    }

    public function getView($token) {
        $data['raporPdf'] = RaporPdfExport::where('token', $token)->first();
        $data['history'] = RaporPdfExportHistory::where('rapor_pdf_exports_id', $data['raporPdf']->id);
        $data['historyPdf'] = RaporPdfExportHistory::where('rapor_pdf_exports_id', $data['raporPdf']->id);
        // dd($data['history']->get()[0]->component);
        return view('master.erapor.view', $data);
    }

    public function getZip($token) {
        $zip_file = 'E-rapor '.date('d M Y').' - '.$token.'.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $path = storage_path('app\public\pdf/'.$token);
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
}
