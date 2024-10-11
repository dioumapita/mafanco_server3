<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accuse extends Model
{
    use HasFactory;

    protected $table = 'accuses';

    protected $fillable = ['prenom_nom','date_naiss','lieu_naiss','pere','mere','domicile','rg_plaintes_id'];

    protected $dates = ['date_naiss'];
}
