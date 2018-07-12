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

        //we have to sort out to show only modules by user later.
        //currently getting all modules
        $user_id = auth()->user()->id;
        $user = User::find($user_id); 
        $modules = Module::orderBy('created_at','desc')->paginate(5);

        $user_id = auth()->user()->id;
        $user = User::find($user_id); 
        $modules = $user->modules;
        $mc_taken = 0;
        $current_CAP = 0;
        //Define grades value here
        $gradesValue = array(
            'A+' => '5',
            'A' => '5',
            'A-' => '4.5',
            'B+' => '4',
            'B' => '3.5',
            'B-' => '3',
            'C+' => '2.5',
            'C' => '2',
            'D+' => '1.5',
            'D' => '1',
            'F' => '0'
        );


        foreach($modules as $module){
            $mc_taken += $module->mc_worth;
            $value = $gradesValue[$module->grade];
            $current_CAP += $module->mc_worth * $value;

        }

        
        if($mc_taken != 0){      
            $current_CAP /= $mc_taken;
        }
        $temp = $current_CAP;
        $avg_grade = '';
        foreach($gradesValue as $value){
            $avg_grade = array_search($value, $gradesValue);
            $temp = $current_CAP - $value;
            if($temp >= 0){

                break;
            }
        }

        $data = array(
            'mc_taken' => $mc_taken,
            'current_CAP' => number_format($current_CAP, 2),
            'avg_grade' => $avg_grade,
            'modules' => $user->modules,
        );        
        return view('dashboard.index')->with($data);
    }

    public function targetSetting(){

        return view('dashboard.targetSetting');        
    }
}

