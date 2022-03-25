<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class HomeController extends Controller
{
    public function home(Request $request)
    {
        return view('modules.home.dashboard');
    }
    public function dashboard(Type $var = null)
    {
        return view('modules.home.home');
    }
}
