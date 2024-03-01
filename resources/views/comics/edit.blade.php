@extends('layouts.app')

@section('page-title', $comic->title . ' Edit')

@section('main-content')

    <h1>
        {{ $comic->title }} Modifica
    </h1>

    <div class="row">
        <div class="col py-4">
            <div class="mb-4">
                <a href="{{ route('comics.index') }}" class="btn btn-primary">
                    Torna ai comics
                </a>

                <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
                    @csrf

                    @method('PUT')

                    <div class="mb-3">
                        <label for="cover" class="form-label">COVER</label>
                        <input value="{{ $comic->thumb }}" type="text" class="form-control" id="cover" name="thumb"
                            placeholder="Inserisci la Copertina" maxlength="1024">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">TITOLO</label>
                        <input value="{{ $comic->title }}" type="text" class="form-control" id="title" name="title"
                            placeholder="Inserisci il Titolo" maxlength="64" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">PREZZO in €</label>
                        <input value="{{ $comic->price }}" type="number" class="form-control" id="price" name="price"
                            placeholder="Inserisci il Prezzo" min="1" max="999" required>
                    </div>

                    <div class="mb-3">
                        <label for="series" class="form-label">SERIE</label>
                        <input value="{{ $comic->series }}" type="text" class="form-control" id="series"
                            name="series" placeholder="Inserisci la serie di appartenenza" maxlength="64" required>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Tipologia di fumetto</label>
                        <input value="{{ $comic->type }}" type="text" class="form-control" id="type" name="type"
                            placeholder="Inserisci la tipologia di" maxlength="64" required>
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label">Inserisci la descrizione</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Inserisci la descrizione"
                            maxlength="500" required>
                                {{ $comic->description }}
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label for="authors" class="form-label">Inserisci gli autori</label>
                        <input value="{{ $comic->writers }}" type="text" class="form-control" id="authors"
                            name="writers" placeholder="Inserisci gli autori" maxlength="500" required>
                    </div>

                    <div class="mb-3">
                        <label for="artists" class="form-label">Inserisci gli artisti</label>
                        <input value="{{ $comic->artists }}" type="text" class="form-control" id="artists"
                            name="artists" placeholder="Inserisci gli autori" maxlength="500" required>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Inserisci gli autori</label>
                        <input value="{{ $comic->date }}" type="date" class="form-control" id="date"
                            name="sale_date" placeholder="Inserisci la data di pubblicazione" required
                            pattern="\d{4}-\d{2}-\d{2}">
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
