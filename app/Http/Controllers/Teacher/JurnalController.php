<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Resources\KelulusanResource;
use Illuminate\Pagination\Paginator;
use PDF;
use App\Jurnal;
use App\JurnalStudent;
use App\Kelas;
use App\Kelompok;
use App\Nilai;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\json_decode;

class JurnalController extends Controller
{
    public function getIndex()
    {
        $data['kelompok'] = Kelompok::get();
        $data['kelas'] = Kelas::get();
        return view('teacher.jurnal.main', $data);
    }

    public function postData(Request $request)
    {
        Paginator::currentPageResolver(fn () => $request->pagination['page']);
        $user = Auth::guard('teacher')->user();
        $wali_kelas_id = $user->kelas->id;
        $mapel = $user->lmapel;
        $filter = $request->get('query');
        $q = Jurnal::with('kelas', 'mapel', 'sub_mapel');

        if (isset($filter['kelas_id'])) {
            $q->where('kelas_id', $filter['kelas_id']);
            if ($filter['kelas_id'] != $wali_kelas_id) {
                $q->whereHas('mapel', function ($r_mapel) use ($mapel) {
                    $r_mapel->whereIn('name', $mapel);
                });
            }
        } else {
            $q->whereHas('mapel', function ($r_mapel) use ($mapel) {
                $r_mapel->whereIn('name', $mapel);
            });
        }

        if (isset($filter['date'])) {
            $fDate = explode(' - ', $filter['date']);
            $sDate = Carbon::parse($fDate[0]);
            $eDate = Carbon::parse($fDate[1]);

            $q->whereBetween('date', [$sDate, $eDate]);
        }

        return new KelulusanResource($q->paginate(5));
    }

    public function postDataJurnalStudent(Request $request)
    {
        Paginator::currentPageResolver(fn () => $request->pagination['page']);

        $q = JurnalStudent::where('jurnal_id', $request->get('jurnal_id'))
            ->with('student')
            ->paginate(5);

        return new KelulusanResource($q);
    }

    public function postDataStudent(Request $request)
    {
        Paginator::currentPageResolver(fn () => $request->pagination['page']);
        $filter = $request->get('query');
        $kelas_id = $request->get('kelas_id');
        $q = Student::where('kelas_id', $kelas_id);

        if (isset($filter['searchLike'])) {
            $searchLike = $filter['searchLike'];
            $q->where('name', 'like', '%' . $searchLike . '%')
                ->orWhere('nis', 'like', '%' . $searchLike . '%')
                ->orWhere('email', 'like', '%' . $searchLike . '%');
        }

        return new KelulusanResource($q->paginate(5));
    }

    public function postSave(Request $request)
    {
        $validatedData = $request->validate([
            'date'              => 'required',
            'jam_ke'            => 'required',
            'mapel'             => 'required',
            'kelas_id'          => 'required',
            'materi'            => 'required',
        ]);

        DB::beginTransaction();

        try {
            $ms = explode(",", $request->mapel);
            $jurnal = Jurnal::create([
                'date'          => carbon($request->date),
                'jam_ke'        => $request->jam_ke,
                'mapel_id'      => $ms[0] == 0 && $ms[1] == 0 ? 1 : $ms[0],
                'sub_mapel_id'  => $ms[1],
                'kelas_id'      => $request->kelas_id,
                'materi'        => $request->materi,
            ]);

            $jurnal_student = json_encode($request->jurnal_student);
            if (isset($request->jurnal_student)) {
                foreach (json_decode($jurnal_student) as $item) {
                    // Validating jurnal student items
                    if (isset($item->student_id) && isset($item->keterangan)) {
                        // Validating student data
                        $student = Student::find($item->student_id);
                        if ($student) {
                            JurnalStudent::create([
                                'jurnal_id'     => $jurnal->id,
                                'student_id'    => $student->id,
                                'keterangan'    => $item->keterangan,
                            ]);
                        }
                    }
                }
            }

            DB::commit();
            return response()->json([
                'status'    => 'Success',
                'message'   => 'Data berhasil ditambahkan',
                'log'       => [],
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status'    => 'Error',
                'message'   => 'Data gagal ditambahkan',
            ], 400);
        }
    }

    public function postExport(Request $request)
    {
        $date = Carbon::parse($request->date);
        $data['jurnals'] = Jurnal::whereDate('date', $date)->get();
        // return view('pdf.jurnal.main', $data);

        $pdf = PDF::loadView('pdf.jurnal.main',  $data, [], [
            'title'                    => 'Jurnal Kelas',
            'author'                   => 'Bagas Aditya Mahendra',
            'default_font' => 'poppins',
            'custom_font_dir'   => base_path('public/fonts/'),
            'custom_font_data'  => [
                'poppins' => [
                    'R'  => 'Poppins-Regular.ttf',    // regular font
                    'B'  => 'Poppins-SemiBold.ttf',       // optional: bold font
                ]
            ],
        ]);

        // $pdf->getMpdf()->SetWatermarkImage(asset(setting('logo_l_1')));
        // $pdf->getMpdf()->showWatermarkImage = true;
        return $pdf->download('Jurnal - ' . $date->format('D M Y') . '.pdf');
    }

    public function postGetByDate(Request $request)
    {
        return Jurnal::select('id', 'date')->whereDate('date', Carbon::parse($request->date))->get();
    }

    public function postUpdate($id, Request $request)
    {
    }

    public function postMultipleDestroy(Request $request)
    {
        $ids = $request->ids;
        return $ids;
    }
}
