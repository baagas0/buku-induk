<?php

namespace App\Http\Controllers\Master\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Resources\TeacherResource;
use App\{Teacher, Kelompok};

class TeacherController extends Controller
{
    public function getIndex() {
        return view('master.user.guru.main');
    }

    public function postData(Request $req) {
        Paginator::currentPageResolver(fn() => $req->pagination['page']);

        $query = Teacher::paginate(10);
        // dd($query);

        return new TeacherResource($query);
    }

    public function getCreate() {
        $data['kelompoks'] = Kelompok::get();
        return view('master.user.guru.form', $data);
    }
}
