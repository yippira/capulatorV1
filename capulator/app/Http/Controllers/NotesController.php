<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Note;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        $data = array(
            'notes' => $user->notes,
        );
        return view('dashboard.Notes.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.Notes.create');
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

        //create note

        $note = new Note;
        $note->title = $request->input('title');
        $note->body = $request->input('body');
        $note->user_id = auth()->user()->id;
        $note->save();

        $request->session()->flash('alert-success','Note "' . $request->input('title') . '" successfully created.');
        return redirect('/notes');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        return view('dashboard.Notes.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $note = Note::find($id);

        //check if user is correct
        if(auth()->user()->id !== $note->user_id){
            $request->session()->flash('alert-danger','Unauthorised Page');
            redirect('dashboard.Notes');
 
        }

        $request->session()->flash('alert-success','Note "' . $request->input('title') . '" successfully edited.');
 
        return view('dashboard.Notes.edit')->with('note',$note);
       

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
            'title'=> 'required',
            'body'=>'required'

        ]);

        //edit note
        
        $note = Note::find($id);
        $note->title = $request->input('title');
        $note->body = $request->input('body');
    
        $note->save();

        $request->session()->flash('alert-success','Note "' . $request->input('title') . '" successfully edited.');
        return redirect('/notes');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        //check if user is correct
        if(auth()->user()->id !== $note->user_id){
            
        $request->session()->flash('alert-danger','Unauthorised Page');
 
        
            return redirect('/dashboard/notes');

        }
$note->delete();
session()->flash('alert-success','Note "' . $note->title . '" successfully deleted.');
 
if(URL::previous() == 'http://capulator.test/dashboard'){
    return redirect('/dashboard');
}
return redirect('/notes');
    }
}
