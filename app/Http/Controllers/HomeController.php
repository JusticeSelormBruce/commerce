<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

        $role_ids = json_decode('[' . Auth::user()->role->routes_ids . ']', true);
        if (sizeof($role_ids[0]) < 3) {
            Session::put('state',0);
             return redirect('market-place-index');
        } else {
            Session::put('state',1);
            return view('home')->with('msg', 'Welcome' . Auth::user()->name . ' Please complete authentication  face 2 to continue');;
        }
    }
}
