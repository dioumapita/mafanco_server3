<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodeAntidate extends Model
{
    use HasFactory;

    protected $table = 'periode_antidates';

    protected $fillable = ['num_debut','num_fin','mois','mouvement_debut','mouvement_fin'];
}
