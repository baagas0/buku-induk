<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
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
    public function index() {
        // dd(Auth::guard('teacher')->user());
        return view('teacher.dashboard');
    }
}
