<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Tutti i Comics';

        $comics = Comic::all();

        return view('comics.index', compact('title', 'comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Assegna tutti i dati inviati nella richiesta
        // HTTP al controller alla variabile 
        // inviati tramite POST
        $comicData = $request->all();

        // dd($comicData);

        $comic = new Comic();

        $comic->thumb = $comicData['thumb'];
        $comic->title = $comicData['title'];
        $comic->price = $comicData['price'];
        $comic->series = $comicData['series'];
        $comic->type = $comicData['type'];
        $comic->description = $comicData['description'];
        $comic->writers = $comicData['writers'];
        $comic->artists = $comicData['artists'];
        $comic->sale_date = $comicData['sale_date'];
        $comic->save();

        // dd($comic);

        return redirect()->route('comics.show', ['comic' => $comic->id]);

    }

    /**
     * Display the specified resource.
     */
    // Utilizzo la dependency injection
    public function show(Comic $comic)
    {
        //
        return view('comics.show', compact('comic'));
    }

    // public function show(string $id)
    // {
    //     //
    //     $comic = Comic::findOrFail($id);

    //     return view('comics.show', compact('comic'));
    // }

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
        //
    }
}
