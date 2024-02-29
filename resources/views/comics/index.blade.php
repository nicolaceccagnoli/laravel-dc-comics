@extends('layouts.app')

@section('page-title', 'Comics')

@section('main-content')

    <h1>
        {{ $title }}
    </h1>

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
                </div>
            </div>
        @endforeach
    </div>
@endsection
