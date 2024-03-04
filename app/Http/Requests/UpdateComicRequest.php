<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //Imposto le chiavi che saranno i 'name' degli input del Form
            // e i value saranno le regole di validazione

            'thumb' => 'nullable|max:1024|url',
            'title' => 'required|max:64',
            'price' => 'required|numeric|min:1|max:999',
            'series' => 'required|max:64',
            'type'=> 'required|max:64|in:graphic-novel,comicbook, webcomic',
            'description'=> 'required|max:500',
            'writers'=> 'required|max:500',
            'artists'=> 'required|max:500',
            'sale_date'  => 'required|date',
        ];
    }

        /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'thumb.url'=> 'Inserisci un URL valido.',
            'title.required'=> 'Il fumetto deve avere un titolo.',
            'price.required'=> 'Inserisci un prezzo compreso tra 1 e 999, eventaulmente separato da una ",".',
            'series.required'=> 'Il fumetto deve avere appartenere a una serie.',
            'type.in'=> 'Inserisci uno dei seguenti tipi: graphic-novel, comicbook o webcomic.',
            'description.required'=> 'Il fumetto deve avere una descrizione.',
            'writers.required'=> 'Il fumetto deve avere uno o più autori.',
            'artists.required'=> 'Il fumetto deve avere uno o più artisti.',
            'sale_date.required'=> 'Inserisci una data di pubblicazione.',
        ];
    }

}
