<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $labels = Label::all();
        $labels = Label::orderBy('name', 'asc')->get();
        return view('labels.index', compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('labels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
        ]);

        $label = new Label();
        $label->name = $validatedData['name'];
        $label->save();

        return redirect('/labels');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $label = Label::findOrFail($id);
        $songs = Song::where('label_id', $id)->orderBy('title', 'asc')->get();
        return view('labels.show', compact('label', 'songs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $label = Label::findOrFail($id);
        return view('labels.edit', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $label = Label::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|min:3',
        ]);

        $label->name = $validatedData['name'];
        $label->save();

        return redirect('/labels');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $label = Label::find($id);
        $label->delete();
        return redirect('/labels');
    }
}
