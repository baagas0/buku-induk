<?php

namespace App\Http\Controllers\Master\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function getIndex() {
        return view('master.user.master.main');
    }

    public function postData() {
        $query = Master::pagination(10);
    }
}
