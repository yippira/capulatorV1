<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\User;

class ModulesController extends Controller
{

    //disable module controller unless when authorised
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
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
        return view('dashboard.modules.index')->with('modules',$user->modules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return the modules adding view.
        return view('dashboard.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->validate($request, [
        //     'year'=> 'required',
        //     'semester'=>'required'

        // ]);

        //We need to first take the year and semester. 

        $year = $request->input('year');
        $semester = $request->input('semester');
            
        //create module, using default year and semester

        //test one lets get the num_mods out.
        for($i = 1; $i <= $request->input('num_mods'); $i++){
         $module = new Module;
         $module->module_code = $request->input('mod_code' . $i);
         $module->grade = $request->input('grade' . $i);
         $module->mc_worth = $request->input('mc_worth' . $i);
         $module->year_taken = $year;
         $module->sem_taken = $semester;
         $module->user_id = auth()->user()->id;
         $module->save();

        }


        return redirect('/modules');
        ;
   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //not very necessary.
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Module::find($id);

                //check if user is correct
                if(auth()->user()-id !== $module->user_id){

                    //have to do this part next time
                    return "error unauthorised.";
        
                }
        
                return "edit module here";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'mc_worth'=> 'required',
            'grade'=>'required',

        ]);

            //edit module

        $module = Module::find($id);
        $module->grade = $request->input('grade');
        $module->mc_worth = $request->input('mc_worth');
        $module->save();

        return redirect('/dashboard');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $module = Module::find($id);
                //check if user is correct
                if(auth()->user()->id !== $module->user_id){
                    return "error unauthorised destroy";
                    return redirect('/dashboard');
        
                }
        $module->delete();
        $request->session()->flash('alert-success', 'Module ' . $module->module_code . ' was successfully deleted!');

        return redirect('/modules');
    }
}
