<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPosition;

class JobPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $positions = JobPosition::latest()->paginate(5);
    
        return view('auth.jobPosition.index',compact('positions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.jobPosition.create');
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
            'name' => 'required',
        ]);
      
        $position = new JobPosition;
        $position->name = $request->name;
        $position->save();

        return redirect()->route('position.index')
        ->with('success','job Position created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(JobPosition $position)
    {
        return view('auth.jobPosition.show',compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JobPosition $position)
    {
        return view('auth.jobPosition.edit',compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobPosition $position)
    {
        $request->validate([
            'name' => 'required',
         
        ]);
  
        $position->update($request->all());
  
        return redirect()->route('position.index')->with('success','job Position updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPosition $position)
    {
        $position->delete();
    
        return redirect()->route('position.index')
                        ->with('success','job Position deleted successfully');
    }
}
