<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificatNationalite extends Model
{
    use HasFactory;

    protected $table = 'certificat_nationalites';

    protected $fillable = ['num','date_demande','copie','num_copie','date_copie','prenom_nom','date_naiss','lieu','pere','mere','domicile','article','signateur','fonction','type','users_id','annee_id'];

    protected $dates = ['date_demande','date_copie','date_naiss'];

    public function docCertificats()
    {
        return $this->hasMany('App\Models\DocCertificat','certificat_nationalites_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }

}
