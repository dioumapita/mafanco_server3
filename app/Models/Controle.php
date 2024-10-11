<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controle extends Model
{
    use HasFactory;

    protected $table = 'controle';

    protected $fillable = ['profil','nom_candidat','s','date_naiss','lieu','pere','mere','n','dpe','session','pv'];
}
