@extends('layouts.app')

@section('page-title', $comic->title . ' Edit')

@section('main-content')

    <h1>
        {{ $comic->title }} Modifica
    </h1>

    <div class="row">
        <div class="col py-4">
            <div class="mb-4">
                {{-- Pulsante per reindirizzare alla vista di tutti i Comics --}}
                <a href="{{ route('comics.index') }}" class="btn btn-primary">
                    Torna ai comics
                </a>

                {{-- Se la validation fallisce, si viene 
                ricatapultati nella pagina precedente --}}
                {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                --}}

                {{-- Ricreo un FORM per la modifica dei Comic pressochè identico a quello per la creazione
                    tranne per il suo value che sarà il record già presente nel singolo Comic
                    che riporterà alla rotta update del controller, passo sempre come argomento l'id del singolo comic --}}
                <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
                    {{-- 
                        Cross
                        Site
                        Request
                        Forgery
                        Genera un input nascosto con un token all'interno per verificare che tutte le richieste
                        del front-end provengano dal sito stesso e si usa per le richieste in POST
                    --}}
                    @csrf

                    {{-- Richiamo il metodo PUT che non può essere passato come method direttamente al FORM;
                        viene utilizzato per aggiornamenti completi dell'istanza del DB --}}
                    @method('PUT')

                    <div class="mb-3">
                        <label for="cover" class="form-label">COVER</label>
                        <input value="{{ $comic->thumb }}" type="text" class="form-control @error('thumb') is-invalid @enderror" id="cover" name="thumb"
                            placeholder="Inserisci la Copertina" maxlength="1024">
                        @error('thumb')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">TITOLO</label>
                        <input value="{{ $comic->title }}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            placeholder="Inserisci il Titolo" maxlength="64" required>
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">PREZZO in €</label>
                        <input value="{{ $comic->price }}" type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                            placeholder="Inserisci il Prezzo" min="1" max="999" required>
                        @error('price')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="series" class="form-label">SERIE</label>
                        <input value="{{ $comic->series }}" type="text" class="form-control @error('series') is-invalid @enderror" id="series"
                            name="series" placeholder="Inserisci la serie di appartenenza" maxlength="64" required>
                        @error('series')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Tipologia di fumetto</label>
                        <input value="{{ $comic->type }}" type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type"
                            placeholder="Inserisci la tipologia di" maxlength="64" required>
                        @error('type')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Inserisci la descrizione</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Inserisci la descrizione"
                            maxlength="500" required>
                                {{ $comic->description }}
                        </textarea>
                        @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
        
                    </div>

                    <div class="mb-3">
                        <label for="authors" class="form-label">Inserisci gli autori</label>
                        <input value="{{ $comic->writers }}" type="text" class="form-control @error('writers') is-invalid @enderror" id="authors"
                            name="writers" placeholder="Inserisci gli autori" maxlength="500" required>
                        @error('writers')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                                </div>

                    <div class="mb-3">
                        <label for="artists" class="form-label">Inserisci gli artisti</label>
                        <input value="{{ $comic->artists }}" type="text" class="form-control @error('artists') is-invalid @enderror" id="artists"
                            name="artists" placeholder="Inserisci gli autori" maxlength="500" required>
                        @error('artists')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Inserisci gli autori</label>
                        <input value="{{ $comic->date }}" type="date" class="form-control @error('sale_date') is-invalid @enderror" id="date"
                            name="sale_date" placeholder="Inserisci la data di pubblicazione" required
                            pattern="\d{4}-\d{2}-\d{2}">
                        @error('sale_date')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-warning w-100">
                            Aggiorna
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
