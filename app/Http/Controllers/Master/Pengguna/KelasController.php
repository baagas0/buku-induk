<?php

namespace App\Http\Controllers\Master\Pengguna;

use App\Http\Controllers\Controller;
use App\Http\Resources\KelasResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Kelas;
use App\Teacher;
use DB;

class KelasController extends Controller
{
    public function getIndex()
    {
        $data['teachers'] = Teacher::get();
        return view('master.user.kelas.main', $data);
    }

    public function postData(Request $req)
    {
        Paginator::currentPageResolver(fn () => $req->pagination['page']);

        $query = Kelas::with('teacher');
        if ($req->get('query')) {
            $query->where('name', 'like', '%' . $req->get('query')['like'] . '%');
        }

        return new KelasResource($query->paginate(10));
    }

    public function getDetail($id)
    {
        return Kelas::with('teacher')->findOrFail($id);
    }
    public function postSave($type, $id = 0, Request $req)
    {
        if ($type == 'create') {
            $kelas = Kelas::create([
                'name' => $req->name,
            ]);
            $kelas_id = $kelas->id;
            if ($req->wali_id != 0) {
                $teacher = Teacher::find($req->wali_id)->update([
                    'kelas_id' => $kelas_id,
                ]);
            }

            return 'Data berhasil dibuat';
        } else if ($type == 'update') {
            $kelas = Kelas::find($id);
            $kelas_id = $kelas->id;
            $kelas->update([
                'name' => $req->name,
            ]);
            if ($req->wali_id != 0) {
                $teacher = Teacher::find($req->wali_id)->update([
                    'kelas_id' => $kelas_id,
                ]);
            }

            return 'Data berhasil diubah';
        } else {
            return 'Tidak tipe perubahan pada data apapun.';
        }
    }

    public function getDelete($id)
    {
        DB::table('kelas')->where('id', $id)->delete();
        $data['kelas'] = Kelas::all();
        return view('master.user.kelas.main', $data);
    }
}
