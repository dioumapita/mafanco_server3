<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasierJudiciaire extends Model
{
    use HasFactory;

    protected $table = 'casier_judiciaires';

    protected $dates = ['date_naiss','date_copie'];

    protected $fillable = ['num_casier','concerne','pere','mere','date_naiss','lieu','domicile','etat_civil','profession','nationalite','copie','num_copie','date_copie','users_id','annee_id','delivre_par'];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
