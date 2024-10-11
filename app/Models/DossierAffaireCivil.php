<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierAffaireCivil extends Model
{
    use HasFactory;

    protected $table = 'dossier_affaire_civils';

    public $primaryKey = 'id';

    protected $fillable = ['num_rg','num_greffe','objet','demandeur','conseil_1','contact_1','defendeur','conseil_2','contact_2'];

    public function orientationDossiers()
    {
        return $this->hasMany('App\Models\OrientationDossier','dossier_affaire_civils_id','id');
    }

    public function documentaffaireCivils()
    {
        return $this->hasMany('App\Models\DocumentAffaireCivil','dossier_affaire_civils_id','id');
    }

}
