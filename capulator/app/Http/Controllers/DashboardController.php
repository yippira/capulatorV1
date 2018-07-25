<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\User;
use App\Note;

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
        

        $modules = $user->modules->sortBy('sem_taken')->sortBy('year_taken');
        $newest = $user->modules->sortByDesc('created_at')->sortByDesc('updated_at')->first();
        
        $notes = Note::where('user_id', $user_id)->orderBy('updated_at','DESC')->take(10)->get();
        $mc_taken = 0;
        $current_CAP = 0;
        $temp_cap = 0;

        $real_mc_taken = 0;
        

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
            'F' => '0',
            'S' => '0'
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
            

            
            $real_mc_taken += $module->mc_worth;
            $value = $gradesValue[$module->grade];

            if($current_year != $temp_year || $current_sem != $temp_sem){

                //means we are in a different year
                //we have to push previous.
                if($mc_taken != 0){
                    $cap_array[] = $temp_cap/($mc_taken);
                }
                //then we add the cap
                $temp_cap += $module->mc_worth *  $value;
                $mc_taken += $module->mc_worth;
                if($module->grade == 'S'){
                    //minus away..
                    $mc_taken -= $module->mc_worth; //We do not count here in calculation, but we deduct in MC to graduation
                }

            }else{
                //same year
                $mc_taken += $module->mc_worth;
                $temp_cap += $module->mc_worth *  $value;
                //remember to push the last year later
                if($module->grade == 'S'){
                    //minus away..
                    $mc_taken -= $module->mc_worth; //We do not count here in calculation, but we deduct in MC to graduation
                }
            }
            $temp_year = $current_year;
            $temp_sem = $current_sem;
            $first_time = false;
            //$test_array[] = $temp_cap;
            //$test_array2[] = $mc_taken;
        }

        //Adds last year
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
            'mc_taken' => $real_mc_taken,
            'current_CAP' => number_format($current_CAP, 2),
            'avg_grade' => $avg_grade,
            'modules' => $modules,
            'cap_array' => $cap_array,
            'cap_goal' => $user->CAP_goal,
            'exemption' => $user->exemption,
            'module_timestamp' => $newest,
            'notes' => $notes,
           // 'test_array' => $test_array,
            //'test_array2' =>$test_array2
            
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

    public function user(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $data = array(
            
            
            'exemption' => $user->exemption,
        );


        return view('dashboard.userSetting')->with($data);
    }

    public function setSpecial(Request $request){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user->exemption = $request->input('exemption');
        $user->save();
        $request->session()->flash('alert-success','Exemption Successfully Added!');

        return redirect('/user');

    }
    public function reset(Request $request){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        foreach($user->modules as $module){
            $module->delete();

        }
        $request->session()->flash('alert-success', 'Your modules were successfully deleted!');

        return redirect('/user');
    }
}

