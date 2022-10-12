<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'id',
        'nome',
        'cpf',
        'telefone',
        'placa',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'string'
    ];


    public function getClientesPlacaNumeroFinal($numero)
    {
        return $this->select('*')
            ->whereRaw('RIGHT(placa,1) = ?', $numero)
            ->get();
    }


    public function validate($dados)
    {
        $validator = Validator::make($dados, [
            'nome' => 'required|max:255',
            'cpf' => 'required|integer',
            'telefone' => 'required|integer',
            'placa' => 'required|max:7'
        ]);

        return $validator;
    }
}
