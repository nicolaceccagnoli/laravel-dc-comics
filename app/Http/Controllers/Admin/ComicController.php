<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Comic;

// Form Request
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Tutti i Comics';

        // Richiamo il Model dei Comic per eseguire la stampa in pagina
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
    public function store(StoreComicRequest $request)
    {
        // Assegna tutti i dati inviati dal FORM nella richiesta
        // HTTP al controller alla variabile
        // inviati tramite POST
        // $comicData = $request->all();

        // uso il metodo validated() 
        $validatedComicData = $request->validated();

        // dd($comicData);

        // Creo una nuova istanza di Comic grazie alla funzione statica create
        // possibile grazie al Mass Assignment
        $comic = Comic::create($validatedComicData);

        // OPPURE 

        // $comic = new Comic();

        // $comic->thumb = $comicData['thumb'];
        // $comic->title = $comicData['title'];
        // $comic->price = $comicData['price'];
        // $comic->series = $comicData['series'];
        // $comic->type = $comicData['type'];
        // $comic->description = $comicData['description'];
        // $comic->writers = $comicData['writers'];
        // $comic->artists = $comicData['artists'];
        // $comic->sale_date = $comicData['sale_date'];
        // $comic->save();

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

    // OPPURE passo l'id come argomento 
    // public function show(string $id)
    // {

    //     findOrFail fa si che quando viene trovato
    //     l'id che stiamo cercando viene assegnato a $comic
    //     altrimenti viene verrà generata un eccezione

    //     $comic = Comic::findOrFail($id);

    //     return view('comics.show', compact('comic'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        //
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        // Assegna tutti i dati inviati dal FORM nella richiesta
        // HTTP al controller alla variabile
        // inviati tramite POST
        // $comicData = $request->all();

        // uso il metodo validated() 
        $validatedComicData = $request->validated();

        // Utilizziamo il metodo update() su un'istanza di Comic
        // per aggiornare i suoi attributi con i dati forniti 
        // da $comicData, possibile grazie al Mass Assignment
        $comic->update($validatedComicData);

        // OPPURE

        // utilizziamo metodo fill per preparare un modello Comic
        // con i dati forniti senza aggiornarla effettivamente 

        // $comic->fill($comicData);

        // serve richiamare metodo save()
        // $comic->save();

        // OPPURE
        // aggiorno singolarmente gli attributi del modello Comic
        // (senza richiamare una nuova istanza)

        // $comic->title = $comicData['title'];
        // $comic->description = $comicData['description'];
        // $comic->thumb = $comicData['thumb'];
        // $comic->price = $comicData['price'];
        // $comic->series = $comicData['series'];
        // $comic->sale_date = $comicData['sale_date'];
        // $comic->type = $comicData['type'];
        // $comic->artists = $comicData['artists'];
        // $comic->writers = $comicData['writers'];
        // $comic->save();

        return redirect()->route('comics.show', ['comic' => $comic->id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        // Il metodo delete() ci serve per 
        // cancellare un record da una tabella
        $comic->delete();

        return redirect()->route('comics.index');

    }
}
