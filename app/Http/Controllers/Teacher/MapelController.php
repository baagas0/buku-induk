<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{
    Kelompok,
    Mapel,
    SubMapel,
};

class MapelController extends Controller
{
    public function getIndex()
    {
        $data['kelompoks'] = Kelompok::with('mapel')->get();

        return view('teacher.mapel.main', $data);
    }
}
