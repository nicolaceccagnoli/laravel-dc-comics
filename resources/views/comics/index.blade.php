@extends('layouts.app')

@section('page-title', 'Comics')

@section('main-content')

    <h1>
        {{ $title }}
    </h1>

    {{-- Inizio del Pulsante 'AGGIUNGI', per creare un nuovo Model Comic --}}
    <div class="row">
        <div class="col">
            <div class="mb-4">
                {{-- Rimandiamo alla rotta create del Controller --}}
                <a href="{{ route('comics.create') }}" class="btn btn-success w-100 fs-5">
                    + AGGIUNGI
                </a>
            </div>
        </div>
    </div>
    {{-- Fine del Pulsante 'AGGIUNGI --}}

    {{-- Inizio della stampa dei Comic --}}
    <div class="row">
        @foreach ($comics as $singleComic)
            <div class="col-auto m-auto card" style="width: 18rem;">
                <img src="{{ $singleComic['thumb'] }}" class="card-img-top" alt="{{ $singleComic['title'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $singleComic['title'] }}</h5>
                    <p class="card-text">{{ $singleComic['price'] }} €</p>
                    <a href="{{ route('comics.show', ['comic' => $singleComic->id]) }}" class="btn btn-primary">
                        Vai al singolo comic
                    </a>

                    {{-- Rimandiamo alla rotta edit del controller e passiamo come argomento l'id del singolo Comic --}}
                    <a href="{{ route('comics.edit', ['comic' => $singleComic->id]) }}" class="btn btn-warning">
                        Modifica
                    </a>

                    {{-- Aggiungiamo un pulsante Elimina che aprirà una modale --}}
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $singleComic->id }}">
                        Elimina
                    </button>
            
                    {{-- Inizio della modale inseriamo il form per l'eliminazione del singolo fumetto --}}
                    <div class="modal fade" id="staticBackdrop-{{ $singleComic->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                Eliminazione Fumetto
                              </h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Sei sicuto di voler eliminare: {{ $singleComic->title }}?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              {{-- Creiamo il form per l'eliminazione che con l'action reindirizza alla rotta destroy del controller, 
                              come argomento passo l'id del singolo comic--}}
                              <form 
                                    action="{{ route('comics.destroy', ['comic' => $singleComic->id]) }}" 
                                    method="POST">
                                    {{-- 
                                        Cross
                                        Site
                                        Request
                                        Forgery
                                        Genera un input nascosto con un token all'interno per verificare che tutte le richieste
                                        del front-end provengano dal sito stesso e si usa per le richieste in POST
                                    --}}
                                    @csrf
                                    {{-- Richiamo il metodo DELETE che non può essere inserito nel FORM --}}
                                    @method('DELETE')
                                        <button 
                                        type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Elimina
                                        </button>
                                </form>
                            </div>
                          </div>
                        </div>
                    </div>
                    {{-- Fine modale --}}
                </div>
            </div>
        @endforeach
    </div>
    {{-- Fine della stampa dei Comic --}}

@endsection
