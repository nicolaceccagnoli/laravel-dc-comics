@extends('layouts.app')

@section('page-title', 'Aggiungi Comics')

<form action="{{ route('comics.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="cover" class="form-label">COVER</label>
        <input type="text" class="form-control" id="cover" name="thumb" placeholder="Inserisci la Copertina"
            maxlength="1024">
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">TITOLO</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il Titolo"
            maxlength="64" required>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">PREZZO in €</label>
        <input type="number" class="form-control" id="price" name="price" placeholder="Inserisci il Prezzo"
            min="1" max="999" required>
    </div>

    <div class="mb-3">
        <label for="series" class="form-label">SERIE</label>
        <input type="text" class="form-control" id="series" name="series"
            placeholder="Inserisci la serie di appartenenza" maxlength="64" required>
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Tipologia di fumetto</label>
        <input type="text" class="form-control" id="type" name="type"
            placeholder="Inserisci la tipologia di fumetto" maxlength="64" required>
    </div>


    <div class="mb-3">
        <label for="description" class="form-label">Inserisci la descrizione</label>
        <textarea class="form-control" id="description" name="description" placeholder="Inserisci la descrizione"
            maxlength="500" required></textarea>
    </div>

    <div class="mb-3">
        <label for="authors" class="form-label">Inserisci gli autori</label>
        <input type="text" class="form-control" id="authors" name="writers" placeholder="Inserisci gli autori"
            maxlength="500" required>
    </div>

    <div class="mb-3">
        <label for="artists" class="form-label">Inserisci gli artisti</label>
        <input type="text" class="form-control" id="artists" name="artists" placeholder="Inserisci gli autori"
            maxlength="500" required>
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Inserisci gli autori</label>
        <input type="date" class="form-control" id="date" name="sale_date"
            placeholder="Inserisci la data di pubblicazione" required pattern="\d{4}-\d{2}-\d{2}">
    </div>

    <div>
        <button type="submit" class="btn btn-success w-100">
            + Aggiungi
        </button>
    </div>

</form>

@section('main-content')
