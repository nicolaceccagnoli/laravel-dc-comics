@extends('layouts.app')

@section('page-title', 'Aggiungi Comics')



@section('main-content')


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

    {{-- Creo un FORM per la creazione di un nuovo Comic;
        il name dei campi input non deve essere necessariamente lo stesso 
        del nome della colonna della Tabella Comic, ma è meglio che corrispondano --}}
    <form action="{{ route('comics.store') }}" method="POST">
        {{-- 
            Cross
            Site
            Request
            Forgery
            Genera un input nascosto con un token all'interno per verificare che tutte le richieste
            del front-end provengano dal sito stesso e si usa per le richieste in POST
        --}}
        @csrf

        <div class="mb-3">
            <label for="cover" class="form-label">COVER</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="cover" name="thumb" placeholder="Inserisci la Copertina"
                maxlength="1024" value="{{ old('thumb') }}">
            @error('thumb')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    

        <div class="mb-3">
            <label for="title" class="form-label">TITOLO</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il Titolo"
                maxlength="64" value="{{ old('title') }}" required>
            @error('title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="price" class="form-label">PREZZO in €</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Inserisci il Prezzo"
                min="1" max="999" value="{{ old('price') }}" required>
            @error('price')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="series" class="form-label">SERIE</label>
            <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series"
                placeholder="Inserisci la serie di appartenenza" maxlength="64" value="{{ old('series') }}" required>
            @error('series')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipologia di fumetto</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" placeholder="Inserisci la tipologia di"
                maxlength="64" value="{{ old('type') }}" required>
            @error('type')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Inserisci la descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Inserisci la descrizione"
                maxlength="500" value="{{ old('description') }}" required></textarea>
            @error('description')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="authors" class="form-label">Inserisci gli autori</label>
            <input type="text" class="form-control @error('writers') is-invalid @enderror" id="authors" name="writers" placeholder="Inserisci gli autori"
                maxlength="500" value="{{ old('writers') }}" required>
            @error('writers')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="artists" class="form-label">Inserisci gli artisti</label>
            <input type="text" class="form-control @error('artists') is-invalid @enderror" id="artists" name="artists" placeholder="Inserisci gli autori"
                maxlength="500"  value="{{ old('artists') }}"required>
            @error('artists')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Inserisci la data di pubblicazione</label>
            <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="date" name="sale_date"
                required value="{{ old('sale_date') }}" pattern="\d{4}-\d{2}-\d{2}">
            @error('sale_date')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div>
            <button type="submit" class="btn btn-success w-100">
                + Aggiungi
            </button>
        </div>

    </form>

@endsection
