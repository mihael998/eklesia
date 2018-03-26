<?php
namespace App\Http\Transformer;

use App\Chiesa;
use Illuminate\Support\Facades\Storage;
use League\Fractal;

class ChiesaTransformer extends Fractal\TransformerAbstract
{
	public function transform(Chiesa $chiesa)
	{
	    return [
            'id'      => (int) $chiesa->id,
            'nome'   => $chiesa->nome,
            'indirizzo'    => $chiesa->indirizzo,
            'sito'    => $chiesa->sito,
            'email'    => $chiesa->email,
            'telefono'    => $chiesa->telefono,
            'foto'    => Storage::disk('gcs')->url('public/img/chiese/'.$chiesa->foto),
            
            'congregazione'   => $chiesa->congregazione!=null?[
                'id' => $chiesa->congregazione->id,
                'nome' => $chiesa->congregazione->nome
            ]:null,
            'comune' => [
                'id' => (int) $chiesa->comune->id,
                'nome' => $chiesa->comune->nome,
                'latitudine' => $chiesa->comune->latitudine,
                'longitudine' => $chiesa->comune->longitudine,
                'provincia' => $chiesa->comune->provincia->nome,
                'regione' => $chiesa->comune->regione->nome,
                'sigla_provincia' => $chiesa->comune->provincia->sigla_automobilistica
            ]
        ];
	}
}