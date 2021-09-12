<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\{
    RaporPdfExport,
    RaporPdfExportHistory,
};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('master.auth:master');
    }

    /**
     * Show the Master dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $rpdf = RaporPdfExport::get();

        $count_job = $rpdf->sum('count_job');
        $on_going_job = $rpdf->sum('on_going_job');
        // dd($count_job, $on_going_job);

        $data['success_presentation_rpdf'] = ($on_going_job / $count_job) * 100;
        return view('master.dashboard', $data);
    }
}
