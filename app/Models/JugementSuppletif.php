<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JugementSuppletif extends Model
{
    use HasFactory;

    protected $table = 'jugement_suppletif';

    protected $fillable = [
        'num','num_anti',
        'concerne','date_naiss','lieu_naiss','sexe','rang_naiss',
        'requerant','profession_requerant','quartier_requerant',
        'date_requete','pere','date_naiss_pere','lieu_naiss_pere',
        'profession_pere','domicile_pere','mere','date_naiss_mere',
        'lieu_naiss_mere','profession_mere','domicile_mere',
        'premier_temoin','date_naiss_premier_temoin','lieu_naiss_premier_temoin',
        'profession_premier_temoin','domicile_premier_temoin','deuxieme_temoin',
        'date_naiss_deuxieme_temoin','lieu_naiss_deuxieme_temoin','profession_deuxieme_temoin',
        'domicile_deuxieme_temoin','date_audience','en_presence','president','greffier','telephone',
        'rendez_vous','num_requette','lieu_transcrit','sexe_requerant','etat_civil','users_id','status','expire_at',
        'annee_id','type','sexe_premier_temoin','sexe_deuxieme_temoin'
    ];

    protected $dates = [
          'date_requete','date_naiss_pere','date_naiss_mere','date_naiss_premier_temoin',
          'date_naiss_deuxieme_temoin','date_audience','date_naiss','rendez_vous'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
