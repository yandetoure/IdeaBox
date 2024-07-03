<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the ideas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ideas = Idea::all();
        return view('ideas.index', compact('ideas'));
    }

    /**
     * Show the form for creating a new idea.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Ideas.create');
    }

    /**
     * Store a newly created idea in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|string',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Idea::create([
            'image' => $request->input('image'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('ideas.index')->with('success', 'Idea created successfully!');
    }

    /**
     * Display the specified idea.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idea = Idea::findOrFail($id);
        return view('ideas.show', compact('idea'));
    }

    /**
     * Show the form for editing the specified idea.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Logic for showing the edit form (if needed)
    }

    /**
     * Update the specified idea in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|string',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $idea = Idea::findOrFail($id);
        $idea->image = $request->input('image');
        $idea->content = $request->input('content');
        $idea->category_id = $request->input('category_id');
        $idea->save();

        return redirect()->route('ideas.index')->with('success', 'Idea updated successfully!');
    }

    /**
     * Remove the specified idea from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idea = Idea::findOrFail($id);
        $idea->delete();

        return redirect()->route('ideas.index')->with('success', 'Idea deleted successfully!');
    }
}
