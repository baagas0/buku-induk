<?php

namespace App\Http\Controllers\Master\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kelas;
use DB;

class KelasController extends Controller
{
    public function getIndex() {
        $data['kelas'] = Kelas::all();
        return view('master.user.kelas.main',$data);
    }
    public function getCreate() {
        return view('master.user.kelas.form');
    }
    public function postSave(Request $req) {
       DB::table('kelas')->insert([
            'name' => $req->name,
       ]);
        $data['kelas'] = Kelas::all();
        return view('master.user.kelas.main',$data);
    }
    public static function getEdit($id){

        $data['kelas'] = Kelas::find($id);
        return view('master.user.kelas.edit',$data);
    }
    public static function postUpdate(Request $req, $id){
        DB::table('kelas')->where('id', $id)->update([
            'name' => $req->name,
        ]);
        $data['kelas'] = Kelas::all();
        return view('master.user.kelas.main',$data);

    }
    public function getDelete($id){
        DB::table('kelas')->where('id', $id)->delete();
        $data['kelas'] = Kelas::all();
        return view('master.user.kelas.main',$data);
    }
}
