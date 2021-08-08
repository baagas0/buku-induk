<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{
    Student,
    ThPelajaran,
    UpdScore,
    Aspek,
};
use DB;

class StudentController extends Controller
{
    public function getIndex(){
        $data['data'] = Student::get();
        return view('teacher.student.main', $data);
    }

    public function getView($nis, Request $request){
        $th_pelajaran = $request->get('tahun_pelajaran');
        
        if ($th_pelajaran) {
            $th = ThPelajaran::search($th_pelajaran);
        }else {
            $th = ThPelajaran::orderBy('th_mulai', 'desc')->first();
        }
        // dd($th);

        $student = Student::where('nis', $nis)->first();
        $data['tahunpelajaran'] = array(2019,2020, 2022);
        $data['nilai'] = DB::select("
            SELECT a.code,a.name as nmkel, b.name,b.id as nameid,  b.is_sub, c.name as subname, c.id as subnameid
            from kelompoks a 
            left join mapels b on a.id=b.kelompok_id
            left join sub_mapels c on b.id = c.mapel_id
            ");

        $data['aspeks'] = Aspek::whereHas('score', function($q) use($th, $student){
            $q->where([
                'th_pelajaran_id'   => $th->id,
                'student_id'        => $student->id,
            ]);
        })->get();
        $data['upds'] = UpdScore::where([
            'th_pelajaran_id'   => $th->id,
            'student_id'        => $student->id,
        ])->get();
        $data['th'] = $th;
        $data['student'] = $student;
        return view('teacher.student.view', $data);
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