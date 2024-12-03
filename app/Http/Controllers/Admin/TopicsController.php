<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topics;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topics::all();
        return view('admin.topics.index',compact('topics'))->with('i', (request()->input('page', 1) - 1) * 5);
    

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.topics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
        $request->validate([
            
            'title' => 'required',
            'description' => 'required',
        ]);


        Topics::create($request->all());
   
        return redirect()->route('admin.topics.index')->with('success','Topic created successfully.');
    
     
    }

    /**
     * Display the specified resource.
     */
    public function show(Topics $topics)
    {
        return view('admin.topics.show',compact('topics'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topics $topic)
    {
        return view('admin.topics.edit',compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topics $topics)
    {
        $request->validate([
            
            'title' => 'required',
            'description' => 'required',
        ]);
  
        $topics->update($request->all());
  
        return redirect()->route('admin.topics.index')->with('success','topic updated successfully');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topics $topics)
    {
        $topics->delete();
  
        return redirect()->route('admin.topics.index')->with('success','Topic deleted successfully');
    }
}
