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
        $labels = Label::all();
        //  $labels = Song::join('labels', 'label_id', '=', 'labels.id')
        //  ->select('songs.title', 'songs.band')
        //  ->orderBy('songs.band', 'asc')
        //  ->get();

     return view('labels.index', ['labels'=>$labels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $labels = DB::table('labels')->select('id','name')->get();
        return view('labels.create',['labels'=>$labels]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|min:3',
            'label_id'=>'required'
        ]);

        $label = new Label();
        $label ->name = $validatedData['name'];
        $label ->label_id = $validatedData['label_id'];
        $label ->save();

        return redirect('/labels');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $label = Label::find($id);
        return view('labels.show',compact('label'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $label = Label::find($id);
        $label->delete();
        return redirect('labels');
    }
}
