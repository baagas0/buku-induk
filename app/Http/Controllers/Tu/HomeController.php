<?php

namespace App\Http\Controllers\Tu;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('tu.auth:tu');
    }

    /**
     * Show the Tu dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('tu.home');
    }
}
