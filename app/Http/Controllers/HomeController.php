<?php

namespace App\Http\Controllers;
use App\Report;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->role == 'normal'){
          return view('propertyform');
        }else{

        $agents = User::where(['role' => "agent"])->count();
        $users = User::where(['role' => "normal"])->count();
          return view('dashboard')->with('users', $users)->with('agents', $agents);
        }

    }
}
