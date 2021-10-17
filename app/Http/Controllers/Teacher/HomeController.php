<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\RaporPdfExport;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('teacher.auth:teacher');
    }

    /**
     * Show the Teacher dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rpdf = RaporPdfExport::get();

        $count_job = $rpdf->sum('count_job');
        $on_going_job = $rpdf->sum('on_going_job');

        $data['success_presentation_rpdf'] = ($on_going_job / $count_job) * 100;

        return view('teacher.dashboard', $data);
    }
}
