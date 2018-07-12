<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\User;

class DashboardController extends Controller
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
        
        $user_id = auth()->user()->id;
        $user = User::find($user_id); 
        $modules = $user->modules;
        $mc_taken = 0;
        foreach($modules as $module){
            $mc_taken += $module->mc_worth;

        }
        $data = array(
            'mc_taken' => $mc_taken,
        );

        
        return view('dashboard.index')->with($data);
    }


}
