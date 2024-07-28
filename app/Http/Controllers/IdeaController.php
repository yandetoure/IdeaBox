<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class IdeaController extends Controller
{
    /**
     * Display a listing of the ideas.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
{
    $ideas = Idea::with('user', 'category')->get();
    $ideas = Idea::all();
    return view('ideas.index', compact('ideas'));
}

public function create()
{
    $categories = Category::all(); // Fetch all categories, adjust query as needed
    return view('ideas.create', compact('categories'));
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
            'user_id' => auth()->id(), // auth()->user()->id can be shortened to auth()->id()
        ]);

        return redirect()->route('ideas.index')->with('success', 'Publication réussie');
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
        $comments = $idea->comments()->paginate(4); // Paginer les commentaires
        return view('ideas.show', compact('idea', 'comments'));
    }

    public function myideas( ){
        $ideas = Idea::where('user_id', auth()->id())->get();
        return view('ideas.myideas', compact('ideas'));
    }
    /**
     * Show the form for editing the specified idea.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all(); 
        $idea = Idea::findOrFail($id);
        return view('ideas.edit', compact('idea','categories'));
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
        $idea->update([
            'image' => $request->input('image'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('ideas.index')->with('success', 'Publification modifiée!');
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

        return redirect()->route('ideas.index')->with('success', 'Idée supprimée!');
    }
}
