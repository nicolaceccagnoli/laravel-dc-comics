<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // L'assegnazione di massa ci permette di mettere all'interno di 
    // un'istanza tutti i dati passati alla richiesta, specificando però
    // quali dati possono essere passati
    // I campi che sono mass assignable sono:
    protected $fillable = [
        'title',
        'description',
        'thumb',
        'price',
        'series',
        'sale_date',
        'type',
        'artists',
        'writers',
    ];

    // Funziona anche mettendo il guarded vuoto
    // protected $guarded = [] ;
}

