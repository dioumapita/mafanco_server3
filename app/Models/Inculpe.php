<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inculpe extends Model
{
    use HasFactory;

    protected $table = 'inculpes';

    protected $fillable = ['prenom_nom','date_naiss','lieu_naiss','pere','mere','domicile','rg_instructions_id'];

    protected $dates = ['date_naiss'];
}
