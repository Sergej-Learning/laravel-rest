<?php

namespace App\Http\Controllers;


use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$songs = Song::all();
        $songs = Song::join('labels', 'label_id', '=', 'labels.id')
            ->select('songs.id', 'songs.title', 'songs.band', 'labels.name')
            ->orderBy('songs.title', 'asc')
            ->get();

        return view('songs.index', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $labels = DB::table('labels')->select('id', 'name')->get();
        return view('songs.create', ['labels' => $labels]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'band' => 'required|min:2',
            'label_id' => 'required|exists:labels,id'
        ]);

        $song = new Song();
        $song->title = $validatedData['title'];
        $song->band = $validatedData['band'];
        $song->label_id = $validatedData['label_id'];
        $song->save();

        return redirect('/songs');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$song = Song::find($id);
        $song = Song::join('labels', 'label_id', '=', 'labels.id')
            ->select('songs.title', 'songs.band', 'songs.created_at', 'songs.updated_at', 'labels.name')
            ->where('songs.id', '=', $id)
            ->firstOrFail();
        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $song = Song::find($id);
        $labels = DB::table('labels')->select('id', 'name')->get();
        return view('songs.edit', [
            'song' => $song,
            'labels' => $labels
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $song = Song::find($id);

        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'band' => 'required|min:2',
            'label_id' => 'required',
        ]);

        $song->title = $validatedData['title'];
        $song->band = $validatedData['band'];
        $song->label_id = $validatedData['label_id'];

        $song->save();

        return redirect('songs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $song = Song::findOrFail($id);
        $song->delete();
        return redirect()->back()->with('sucess', 'Song wurde erfolgreich gelöscht!');
    }
}
