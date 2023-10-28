<?php

namespace App\Http\Controllers;

use App\Models\Tudu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tudus = Tudu::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('home', compact('tudus'));
    }
}
