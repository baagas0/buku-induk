<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{
    Kelompok,
    Mapel,
    SubMapel,
};
use DB;

class MapelController extends Controller
{
    public function getIndex(){
        $data['kelompoks'] = Kelompok::with('mapel')->get();

        foreach ($data['kelompoks'] as $key => $value) {

        }
        return view('master.mapel.main', $data);
    }

    public function postCuKelompok($type, $id = null, Request $req) 
    {
        $name = $req->name;
        if ($type == 'create') {
            Kelompok::create([
                'code' => str_replace(' ', '-', $name),
                'name' => $name,
            ]);
        }else if ($type == 'update') {
            Kelompok::find($id)
            ->update([
                'name' => $name,
            ]);
        }else {
            return 400;
        }
    }

    public function postCuMapel($type, $id = null, Request $req) 
    {
        if ($type == 'create') {
            Mapel::create($req->all());
        }else if ($type == 'update') {
            Mapel::find($id)
            ->update($req->all());
        }else {
            return 400;
        }
    }

    public function postCuSubMapel($type, $id = null, Request $req) 
    {
        if ($type == 'create') {
            SubMapel::create($req->all());
        }else if ($type == 'update') {
            SubMapel::find($id)
            ->update($req->all());
        }else {
            return 400;
        }
    }

    public function postDeleteData($table, $id) {
        $data = DB::table($table)->where('id', $id)->delete();

        // $data->delete();
        return 'Penghapusan data telah Berhasil';
    }
}
