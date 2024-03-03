<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comic;

class ComicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Richiamiamo dalla cartella config il file 'comics' che contiene la 
        // struttura dei dati da passare al DB
        $comicData = config('comics');

        // Creiamo un ciclo per cui
        foreach ($comicData as $index=> $singleComic) {
            // Ad ogni comic presente nel file viene creata una nuova istanza del Model Comic
            $comic = new Comic();

            // E gestiamo l'inserimento dei dati all'interno del DB
            $comic->title = $singleComic['title'];
            $comic->description = $singleComic['description'];
            $comic->thumb = $singleComic['thumb'];
            // Tolgo il carattere $ dal prezzo
            $comic->price = str_replace('$', '', $singleComic['price']);
            $comic->series = $singleComic['series'];
            $comic->sale_date = $singleComic['sale_date'];
            $comic->type = $singleComic['type'];
            $comic->artists = implode(', ', $singleComic['artists']);
            $comic->writers = implode(', ', $singleComic['writers']);
            $comic->save();
        }

    }
}
