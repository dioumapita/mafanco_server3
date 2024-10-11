<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoCandidat extends Model
{
    use HasFactory;

    protected $table = 'photo_candidat';

    protected $fillable = ['centre','ecole','n_photo','prenom_et_nom','sexe','date_naiss','lieu','pere','mere','ses_bepc','pv_bepc','nat'];
}
