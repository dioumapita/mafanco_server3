<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrientationDossier extends Model
{
    use HasFactory;

    protected $table = 'orientation_dossiers';

    public $primaryKey = 'id';

    protected $fillable = ['lieu_orientation','date_orientation','status','dossier_affaire_civils_id'];

    protected $dates = ['date_orientation'];

    public function dossieraffaireCivil()
    {
        return $this->belongsTo('App\Models\DossierAffaireCivil','dossier_affaire_civils_id','id');
    }
}
