<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;

    protected $table = 'dossier';

    protected $fillable = ['nom_dossier','proprietaire','contact','date_ajout'];

    protected $dates = ['date_ajout'];

    public function documents()
    {
        return $this->hasMany('App\Models\Document');
    }
}
