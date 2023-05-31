<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CurrentOpening;

class CurrentOpeningcontroller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $openings = CurrentOpening::latest()->paginate(5);
    
        return view('auth.current_opening.index',compact('openings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.current_opening.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',

        ]);
        $user_name=auth()->user()->name;
      
        $opening = new CurrentOpening;
        $opening->name = $user_name;
        $opening->title = $request->title;
        $opening->description = $request->description;

        $opening->save();

        return redirect()->route('current_opening.index')
        ->with('success','Opening created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CurrentOpening $currentOpening)
    {
        
        return view('auth.current_opening.show',compact('currentOpening'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CurrentOpening $currentOpening)
    {
        return view('auth.current_Opening.edit',compact('currentOpening'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CurrentOpening $currentOpening)
    {
       
        $request->validate([
            'title' => 'required',
            'description' => 'required',
         
        ]);
  
        $currentOpening->update($request->all());
  
        return redirect()->route('current_opening.index')->with('success','Current Opening updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurrentOpening $currentOpening)
    {
        $currentOpening->delete();
    
        return redirect()->route('current_opening.index')
                        ->with('success','Current Opening deleted successfully');
    }

}
