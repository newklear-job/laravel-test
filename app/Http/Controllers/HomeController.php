<?php

namespace App\Http\Controllers;

use Debugbar;
use Illuminate\Http\Request;
use Bouncer;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:see-user-related-content');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Debugbar::info('backups/backup['.date('m/d/Y H:i:s', time()).'].sql');
        return view('home');
    }
}
