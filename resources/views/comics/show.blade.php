@extends('layouts.app')

@section('page-title', $comic->title . 'Show')

@section('main-content')

    <h1>
        {{ $comic->title }}
    </h1>

    {{-- Creo un pulsante che riporti all'index dei Comics --}}
    <div class="row my-5">
        <div class="col text-center">
            <a href="{{ route('comics.index') }}" class="btn btn-primary">
                Vai a tutti i comic
            </a>
        </div>
    </div>

    {{-- Inizio del singolo Comic --}}
    <div class="row">
        <div class="col-auto m-auto card" style="width: 30rem;">
            <img src="{{ $comic['thumb'] }}" class="card-img-top" alt="{{ $comic['title'] }}">
            <div class="card-body">
                <h5 class="card-title">{{ $comic['title'] }}</h5>
                <p class="card-text">{{ $comic['price'] }} €</p>
                <div class="info">
                    <p class="card-text">
                        {{ $comic->description }}
                    </p>
                    <p class="card-text">
                        Serie:
                        <strong>
                            {{ $comic->series }}
                        </strong>
                    </p>
                    <p class="card-text">
                        Data di uscita:
                        <strong>
                            {{ $comic->sale_date }}
                        </strong>
                    </p>
                    <p class="card-text">
                        Autore/i:
                        <strong>
                            {{ $comic->writers }}
                        </strong>
                    </p>
                    <p class="card-text">
                        Artista/i:
                        <strong>
                            {{ $comic->artists }}
                        </strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- Fine del singolo Comic --}}

@endsection
