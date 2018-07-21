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
        // $modules = Module::orderBy('created_at','desc')->paginate(5);
        

        $user_id = auth()->user()->id;
        $user = User::find($user_id); 
        $modules = $user->modules->sortBy('sem_taken')->sortBy('year_taken');
        $mc_taken = 0;
        $current_CAP = 0;
        $temp_cap = 0;
        

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

        //Make Array of Various CAP here.
        $cap_array = array();
        $first_time = true;
        foreach($modules as $module){
            //initialise temp_year and sem
            $current_year = $module->year_taken;
            $current_sem = $module->sem_taken;
            if($first_time){
                $temp_year = $current_year;
                $temp_sem = $current_sem;
            }
            

            $mc_taken += $module->mc_worth;
            $value = $gradesValue[$module->grade];
            if($current_year != $temp_year || $current_sem != $temp_sem){

                //means we are in a different year
                
                //means we push
                $cap_array[] = $temp_cap/($mc_taken-4);
                //then we add the cap
                $temp_cap += $module->mc_worth *  $value;
                

            }else{
                //same year
                $temp_cap += $module->mc_worth *  $value;
                //remember to push the last year later
            }
            $temp_year = $current_year;
            $temp_sem = $current_sem;
            $first_time = false;
            $test_array[] = $temp_cap;
        }

        if($mc_taken != 0){
            $cap_array[] = $temp_cap/$mc_taken;
            $current_CAP = $temp_cap/$mc_taken;
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
            'modules' => $modules,
            'cap_array' => $cap_array,
            'cap_goal' => $user->CAP_goal,
            'test_array' => $test_array,
            
        );        
        return view('dashboard.index')->with($data);
    }

    public function targetSetting(){

        return view('dashboard.targetSetting');        
    }

    public function setGoal(Request $request){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user->CAP_goal = number_format($request->input('cap_goal'), 2, '.', ',');
        $user->save();

        return redirect('/targetSetting');

    }
}

