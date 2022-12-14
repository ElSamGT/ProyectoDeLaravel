<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checahora extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUser',
        'idDia',
        'horaentrada',
        'fecha',
    ];
}
