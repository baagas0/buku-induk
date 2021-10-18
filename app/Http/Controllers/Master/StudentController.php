<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\{
    StudentResource,
    UpdResource,
    AkhlakResource,
    KehadiranResource,
    PrestasiResource,
    KelulusanResource,
};
use App\Exports\{
    NilaiExport,
    StudentExport,
    AspekStudentExport,
    KetidakhadiranStudentExport,
    PrestasiExport,
    KelulusanExport,
    HasilUjianExport,
};
use App\{
    Kelas,
    Student,
    ThPelajaran,
    Upd,
    UpdScore,
    Aspek,
    AspekScore,
    HasilUjian,
    Ketidakhadiran,
    KetidakhadiranScore,
    Kegiatan,
    Prestasi,
    Kelulusan,
    Kelompok,
};
use App\Imports\StudentImport;
use DB;
use Illuminate\Pagination\Paginator;

class StudentController extends Controller
{
    public function getIndex()
    {
        $data['kelas'] = Kelas::get();
        $data['kegiatan'] = Kegiatan::get();
        $data['upd'] = Upd::get();
        $data['aspek'] = Aspek::get();
        $data['ketidakhadiran'] = Ketidakhadiran::get();
        // dd(11);
        return view('master.student.main', $data);
    }

    public function postData(Request $req)
    {
        Paginator::currentPageResolver(fn () => $req->pagination['page']);

        $q = Student::with('kelas');

        if (isset($req->all()['query'])) {
            $filter = $req->all()['query'];
            if ($filter) {
                if (isset($filter['kelas_id'])) {
                    $q->where('kelas_id', $filter['kelas_id']);
                }
                if (isset($filter['like'])) {
                    $q->where('name', 'like', '%' . $filter['like'] . '%')
                        ->orWhere('nis', 'like', '%' . $filter['like'] . '%');
                }
                if (isset($filter['sort']['field']) && isset($filter['sort']['sort'])) {
                    $q->orderBy($filter['sort']['field'], $filter['sort']['sort']);
                }
            }
        }
        return new StudentResource($q->paginate(10));
    }
    public function postDataUpd(Request $req, $id = null)
    {

        if ($id) {
            return UpdScore::with('student', 'upd')->find($id);
        }

        Paginator::currentPageResolver(fn () => $req->pagination['page']);

        $filter = $req->all()['query'];
        $student = Student::where('nis', $filter['nis'])->first();
        $q = UpdScore::where('student_id', $student->id)->with('upd')->paginate(5);

        return new UpdResource($q);
    }
    public function postUpdateUpd($type = 'update', $id = 0, Request $req)
    {
        if ($type == 'create') {
            UpdScore::create([
                'upd_id'        => $req->upd_id,
                'th_pelajaran'  => $req->th_pelajaran,
                'student_id'    => $req->student_id,
                'n_smt_1'       => $req->n_smt_1,
                'n_smt_2'       => $req->n_smt_2,
            ]);
        } else if ($type == 'update') {
            UpdScore::find($id)
                ->update([
                    'n_smt_1' => $req->n_smt_1,
                    'n_smt_2' => $req->n_smt_2,
                ]);
        } else {
            return 400;
        }
    }
    public function postDeleteData($table, $id, Request $req)
    {
        DB::table($table)->where('id', $id)->delete();
    }
    public function postDataAkhlak(Request $req, $id = null)
    {

        if ($id) {
            return AspekScore::with('student', 'aspek')->find($id);
        }

        Paginator::currentPageResolver(fn () => $req->pagination['page']);
        $filter = $req->all()['query'];
        $student = Student::where('nis', $filter['nis'])->first();
        $q = AspekScore::where('student_id', $student->id)->with('aspek')->paginate(5);

        return new UpdResource($q);
    }
    public function postUpdateAkhlak($type = 'update', $id = 0, Request $req)
    {
        if ($type == 'create') {
            AspekScore::create([
                'student_id'    => $req->student_id,
                'aspek_id'      => $req->aspek_id,
                'th_pelajaran'  => $req->th_pelajaran,
                'n_smt_1'       => $req->n_smt_1,
                'n_smt_2'       => $req->n_smt_2,
            ]);
        } else if ($type == 'update') {
            AspekScore::find($id)
                ->update([
                    'n_smt_1' => $req->n_smt_1,
                    'n_smt_2' => $req->n_smt_2,
                ]);
        } else {
            return 400;
        }
    }
    public function postDataKetidakhadiran(Request $req, $id = null)
    {

        if ($id) {
            return KetidakhadiranScore::with('student', 'ketidakhadiran')->find($id);
        }

        Paginator::currentPageResolver(fn () => $req->pagination['page']);
        $filter = $req->all()['query'];
        $student = Student::where('nis', $filter['nis'])->first();
        $q = KetidakhadiranScore::where('student_id', $student->id)->with('ketidakhadiran')->paginate(5);

        return new KehadiranResource($q);
    }
    public function postUpdateKetidakhadiran($type = 'update', $id = 0, Request $req)
    {
        // dd($req->all());
        if ($type == 'create') {
            KetidakhadiranScore::create([
                'student_id'        => $req->student_id,
                'ketidakhadiran_id' => $req->ketidakhadiran_id,
                'th_pelajaran'      => $req->th_pelajaran,
                'n_smt_1'           => $req->n_smt_1,
                'n_smt_2'           => $req->n_smt_2,
            ]);
        } else if ($type == 'update') {
            KetidakhadiranScore::find($id)
                ->update([
                    'n_smt_1' => $req->n_smt_1,
                    'n_smt_2' => $req->n_smt_2,
                ]);
        }
    }
    public function postDataPrestasi(Request $req, $id = null)
    {

        if ($id) {
            return Prestasi::with('student', 'kegiatan')->find($id);
        }

        Paginator::currentPageResolver(fn () => $req->pagination['page']);
        $filter = $req->all()['query'];
        $student = Student::where('nis', $filter['nis'])->first();
        $q = Prestasi::where('student_id', $student->id)->with('kegiatan')->paginate(5);

        return new KehadiranResource($q);
    }
    public function postUpdatePrestasi($type = 'update', $id = 0, Request $req)
    {
        if ($type == 'create') {
            Prestasi::create([
                'student_id'        => $req->student_id,
                'kegiatan_id'      => $req->kegiatan_id,
                'nomor_sertifikat' => $req->nomor_sertifikat,
            ]);
        } else {
            Prestasi::find($id)
                ->update([
                    'kegiatan_id'      => $req->kegiatan_id,
                    'nomor_sertifikat' => $req->nomor_sertifikat,
                ]);
        }
    }

    public function postDataKelulusan(Request $req, $id = null)
    {

        if ($id) {
            return Kelulusan::with('student')->find($id);
        }

        Paginator::currentPageResolver(fn () => $req->pagination['page']);
        $filter = $req->all()['query'];
        $student = Student::where('nis', $filter['nis'])->first();
        $q = Kelulusan::where('student_id', $student->id)->paginate(5);

        return new KelulusanResource($q);
    }
    public function postUpdateKelulusan($type = 'update', $id = 0, Request $req)
    {
        if ($type == 'create') {
            $check = Kelulusan::where($req->all())->first();
            if (!$check) {
                Kelulusan::create([
                    'student_id'    => $req->student_id,
                    'uraian'        => $req->uraian,
                    'ijazah'        => $req->ijazah,
                    'skhun'         => $req->skhun,
                    'shuambn'       => $req->shuambn,
                ]);
            } else {
                $check->update($req->all());
            }
        } else {
            Kelulusan::find($id)
                ->update([
                    'ijazah'    => $req->ijazah,
                    'skhun'     => $req->skhun,
                    'shuambn'   => $req->shuambn,
                ]);
        }
    }

    public function postDataHasilUjian(Request $req, $id = null)
    {

        $filter = $req->all()['query'];
        $student = Student::where('nis', $filter['nis'])->first();

        $array = [];
        $q = Kelompok::get()->toArray();
        $array = $q;

        $fixarray = [];
        $nourut = 0;

        for ($i = 0; $i < count($q); $i++) {
            $id = $array[$i]['id'];
            $qmapel = DB::select("select * from mapels where kelompok_id='" . $id . "' ");
            if (count($qmapel) > 0) {
                $array[$i]['mapel'] = $qmapel;

                for ($j = 0; $j < count($qmapel); $j++) {
                    $idmapel = $array[$i]['mapel'][$j]->id;
                    if ($array[$i]['mapel'][$j]->is_sub == 1) {
                        $qsmapel = DB::select("select * from sub_mapels where mapel_id='" . $idmapel . "' ");
                        if (count($qsmapel) > 0) {
                            $array[$i]['mapel'][$j]->submapel = $qsmapel;

                            for ($k = 0; $k < count($qsmapel); $k++) {
                                $idsmapel = $array[$i]['mapel'][$j]->submapel[$k]->id;
                                // dd($idsmapel);
                                $qsnilai = DB::select("select * from hasil_ujians where sub_mapel_id='" . $idsmapel . "'  and student_id='" . $student->id . "' limit 1");
                                if (count($qsnilai) > 0) {
                                    $array[$i]['mapel'][$j]->submapel[$k]->nilai = $qsnilai;
                                }
                                $fixarray[$nourut]['no'] = $nourut + 1;
                                $fixarray[$nourut]['mapel'] = $array[$i]['mapel'][$j]->name;
                                $fixarray[$nourut]['sub_mapel'] = $array[$i]['mapel'][$j]->submapel[$k]->name;
                                if (property_exists($array[$i]['mapel'][$j]->submapel[$k], 'nilai')) {
                                    $fixarray[$nourut]['n_um'] = $array[$i]['mapel'][$j]->submapel[$k]->nilai[0]->n_um;
                                    $fixarray[$nourut]['n_ijazah'] = $array[$i]['mapel'][$j]->submapel[$k]->nilai[0]->n_ijazah;
                                } else {
                                    $fixarray[$nourut]['n_um'] = "-";
                                    $fixarray[$nourut]['n_ijazah'] = "-";
                                }
                                $nourut++;
                            }
                        }
                    } else {
                        $qnilai = DB::select("select * from hasil_ujians where mapel_id='" . $idmapel . "'  and student_id='" . $student->id . "' limit 1");
                        if (count($qnilai) > 0) {
                            $array[$i]['mapel'][$j]->nilai = $qnilai;
                        }
                        $fixarray[$nourut]['no'] = $nourut + 1;
                        $fixarray[$nourut]['mapel'] = $array[$i]['mapel'][$j]->name;
                        $fixarray[$nourut]['sub_mapel'] = "-";
                        if (property_exists($array[$i]['mapel'][$j], 'nilai')) {
                            $fixarray[$nourut]['n_um'] = $array[$i]['mapel'][$j]->nilai[0]->n_um;
                            $fixarray[$nourut]['n_ijazah'] = $array[$i]['mapel'][$j]->nilai[0]->n_ijazah;
                        } else {
                            $fixarray[$nourut]['n_um'] = "-";
                            $fixarray[$nourut]['n_ijazah'] = "-";
                        }
                        $nourut++;
                    }
                }
            }
        }
        return $fixarray;
    }

    public function getDetail($type, $nis)
    {
        $data['student'] = Student::where('nis', $nis)->first();
        $data['kelas'] = Kelas::get();
        return view('master.student.' . $type, $data);
    }

    public function postUpdate($type, $nis, Request $req)
    {
        $student = Student::where('nis', $nis)->first();

        if ($type == 'personal') {
            $student->update([
                'name'      => $req->name,
                'nis'       => $req->nis,
                'kelas_id'  => $req->kelas_id,
                'email'     => $req->email,
            ]);
            return 1;
        } else if ($type == 'password') {
            if ($req->password == $req->confirm_password) {
                $student->update([
                    'password'  => bcrypt($req->password)
                ]);
                return 1;
            }
            return 0;
        } else {
            return 0;
        }
    }

    public function getExport()
    {
        $data['kelas']      = Kelas::get();
        return view('master.student.export', $data);
    }

    public function postExportProccess(Request $request)
    {
        $kelas_id   = $request->kelas_id;
        $tipe       = $request->tipe;

        if ($tipe == 'nilai') {
            return Excel::download(new NilaiExport($kelas_id), ucwords($tipe) . ' - StudentExport.xlsx');
        } elseif ($tipe == 'upd') {
            $heading = ['Nama Kegiatan', 'Tahun', 'Nilai Semester 1', 'Nilai Semester 2'];
        } elseif ($tipe == 'akhlak') {
            return Excel::download(new AspekStudentExport($kelas_id), ucwords($tipe) . ' - StudentExport.xlsx');
        } elseif ($tipe == 'ketidakhadiran') {
            return Excel::download(new KetidakhadiranStudentExport($kelas_id), ucwords($tipe) . ' - StudentExport.xlsx');
        } elseif ($tipe == 'prestasi') {
            return Excel::download(new PrestasiExport($kelas_id), ucwords($tipe) . ' - StudentExport.xlsx');
        } elseif ($tipe == 'kelulusan') {
            return Excel::download(new KelulusanExport($kelas_id), ucwords($tipe) . ' - StudentExport.xlsx');
        } elseif ($tipe == 'hasil_ujian') {
            return Excel::download(new HasilUjianExport($kelas_id), ucwords($tipe) . ' - StudentExport.xlsx');
        } else {
            $heading = [];
        }

        return Excel::download(new StudentExport($kelas_id, $heading), ucwords($tipe) . ' - StudentExport.xlsx');
    }

    public function getImport()
    {
        return view('master.student.import');
    }
    public function postImportProccess(Request $request)
    {
        Excel::import(new StudentImport, $request->file_student);

        return redirect()->back()->with([
            'type' => 'success',
            'msg' => 'Data berhasil diproses'
        ]);
    }

    public function getView($nis, Request $request)
    {
        $year = $request->get('tahun_pelajaran');

        if ($year) {
            $th_mulai   = substr($year, 0, 4);
            $th_selesai = substr($year, -4);

            $data['tahunpelajaran'] = range($th_mulai, $th_selesai);
            $th = ThPelajaran::search($year);
        } else {
            $data['tahunpelajaran'] = array(2005, 2019);
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
        return view('master.student.view', $data);
    }
}

/*
    Custom query example

    $data['key']= DB::table('employee')
    ->join('hr_leave', 'hr_leave.hrid', '=', 'employee.id')
    ->select('employee.*')
    ->where('hr_leave.oid', $id)
    ->get();

    // Another way //

    $cards = DB::select("SELECT
        cards.id_card,
        cards.hash_card,
        cards.`table`,
        users.name,
        0 as total,
        cards.card_status,
        cards.created_at as last_update
    FROM cards
    LEFT JOIN users
    ON users.id_user = cards.id_user
    WHERE hash_card NOT IN ( SELECT orders.hash_card FROM orders )
    UNION
    SELECT
        cards.id_card,
        orders.hash_card,
        cards.`table`,
        users.name,
        sum(orders.quantity*orders.product_price) as total,
        cards.card_status,
        max(orders.created_at) last_update
    FROM menu.orders
    LEFT JOIN cards
    ON cards.hash_card = orders.hash_card
    LEFT JOIN users
    ON users.id_user = cards.id_user
    GROUP BY hash_card
    ORDER BY id_card ASC");
*/
