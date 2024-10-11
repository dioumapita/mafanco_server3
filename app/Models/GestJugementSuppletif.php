<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestJugementSuppletif extends Model
{
    use HasFactory;

    protected $table = 'gest_jugement_suppletifs';

    protected $fillable = [
        'id',
        'datecrea','daterev','numero','date','nom','date_naissance',
        'lieu_naissance','filiation','arch'
    ];


}
