<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;

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
        $modules = Module::orderBy('created_at','desc')->paginate(5);
        return view('dashboard.modules.index')->with('modules',$modules);
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
        $this->validate($request, [
            'title'=> 'required',
            'body'=>'required'

        ]);

        //create module

        $module = new Module;
        $module->module_code = $request->input('module_code');
        $module->grade = $request->input('grade');
        $module->year_taken = $request->input('year_taken');
        $module->sem_taken = $request->input('sem_taken');
        $module->user_id = auth()->user()->id;
        $module->save();

        return redirect('/dashboard');
   

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
            'module_code'=> 'required',
            'grade'=>'required',
            'sem_taken'=>'required',
            'year_taken'=>'required'

        ]);

            //edit module

        $module = new Module;
        $module->module_code = $request->input('module_code');
        $module->grade = $request->input('grade');
        $module->year_taken = $request->input('year_taken');
        $module->sem_taken = $request->input('sem_taken');
        $module->user_id = auth()->user()->id;
        $module->save();

        return redirect('/dashboard');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
                //check if user is correct
                if(auth()->user()-id !== $module->user_id){
                    return "error unauthorised destroy";
                    return redirect('/dashboard');
        
                }
        $module->delete();

        return "deleted";
    }
}
