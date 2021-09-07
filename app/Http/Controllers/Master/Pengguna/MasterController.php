<?php

namespace App\Http\Controllers\Master\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Master;

class MasterController extends Controller
{
    public function getIndex() {
        $data['master'] = Master::all();
        return view('master.user.master.main',$data);
    }

    public function getCrete(){
         return view('master.user.master.form');
    }

    public function postData() {
        $query = Master::pagination(10);
    }
}
