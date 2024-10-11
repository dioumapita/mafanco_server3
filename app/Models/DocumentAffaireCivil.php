<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentAffaireCivil extends Model
{
    use HasFactory;

    protected $table = 'document_affaire_civils';

    protected $fillable = ['nom_doc','chemin_doc','dossier_affaire_civils_id'];

    public function dossieraffaireCivil()
    {
        return $this->belongsTo('App\Models\DossierAffaireCivil','dossier_affaire_civils_id','id');
    }
}
