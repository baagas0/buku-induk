<?php

namespace App\Http\Controllers\Master\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Resources\TeacherResource;
use DB;
use App\{
    Teacher,
    Kelompok,
    Kelas,
    Mapel,
};

class TeacherController extends Controller
{
    public function getIndex()
    {
        return view('master.user.guru.main');
    }

    public function postData(Request $req)
    {
        Paginator::currentPageResolver(fn () => $req->pagination['page']);

        $query = Teacher::with('kelas');
        if ($req->get('query')) {
            $query->where('name', 'like', '%' . $req->get('query')['like'] . '%')
                ->orWhere('email', 'like', '%' . $req->get('query')['like'] . '%')
                ->orWhere('mapel', 'like', '%' . $req->get('query')['like'] . '%');
        }

        return new TeacherResource($query->paginate(10));
    }

    public function getCreate()
    {
        $data['kelompoks'] = Kelompok::get();
        $data['kelases'] = Kelas::get();
        $data['mapels'] = Mapel::get();
        return view('master.user.guru.form', $data);
    }

    public function postSave(Request $req)
    {
        return Teacher::create([
            'name'      => $req->name,
            'email'     => $req->email,
            'password'  => bcrypt($req->password),
            'kelas_id'  => $req->kelas,
            'mapel'     => json_encode($req->mapel),
        ]);
    }
    public static function getEdit($id)
    {
        $data['teacher'] = Teacher::find($id);
        // dd(json_decode($data['teacher']));
        $data['kelompoks'] = Kelompok::get();
        $data['kelases'] = Kelas::get();
        $data['mapels'] = Mapel::get();
        return view('master.user.guru.edit', $data);
    }
    public static function postUpdate(Request $req, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->kelas_id = $req->kelas_id;
        $teacher->name = $req->name;
        $teacher->email = $req->email;
        if (!empty($req->password)) {
            $teacher->password = bcrypt($req->password);
        }
        $teacher->kelas_id = $req->kelas_id;
        $teacher->mapel = json_encode($req->mapel);
        $teacher->save();
    }
    public function postDelete($id)
    {
        DB::table('teachers')->where('id', $id)->delete();
    }
}
