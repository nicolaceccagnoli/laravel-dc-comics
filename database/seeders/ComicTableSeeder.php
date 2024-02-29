<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Model\Comic;

class ComicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $comicData = config('comics');

        foreach ($comicData as $index=> $singleComic) {
            $comic = new Comic();

            $comic->title = $singleComic['title'];
            $comic->description = $singleComic['description'];
            $comic->thumb = $singleComic['thumb'];
            // Tolgo il carattere $ dal prezzo
            $comic->price = str_replace('$', '', $singleComic['price']);
            $comic->series = $singleComic['series'];
            $comic->sale_date = $singleComic['sale_date'];
            $comic->type = $singleComic['type'];
            $comic->artists = $singleComic['artists'];
            $comic->writers = $singleComic['writers'];
        }

    }
}
