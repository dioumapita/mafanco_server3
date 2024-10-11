<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'document';

    protected $fillable = ['nom_doc','chemin_doc','date_ajout','dossier_id'];

    protected $dates = ['date_ajout'];

    public function dossier()
    {
        return $this->belongsTo('App\Models\Dossier');
    }
}
