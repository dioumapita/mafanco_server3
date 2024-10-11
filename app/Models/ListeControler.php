<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeControler extends Model
{
    use HasFactory;

    protected $table = 'liste_controler';

    protected $fillable = ['profil','nom_candidat','s','date_naiss','lieu','pere','mere','n','dpe','session','pv','status','nbr_char'];
}
