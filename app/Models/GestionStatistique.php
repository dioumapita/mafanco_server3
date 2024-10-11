<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionStatistique extends Model
{
    use HasFactory;

    protected $table = 'gestion_statistiques';

    protected $fillable = ['libelle','nbre','mois'];
}
