<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\{RaporPdfResource, TeacherResource};
use App\{
    Kelas,
    RaporPdfExport,
    HistoryRaporPdfExport,
};
use Illuminate\Pagination\Paginator;

class EraporController extends Controller
{
    public function getIndex() {
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
}
