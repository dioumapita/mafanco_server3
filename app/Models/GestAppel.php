<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestAppel extends Model
{
    use HasFactory;

    protected $table = 'gest_appels';

    protected $fillable = ['datecrea','daterev','numero','date_appel','les_parties','type','statuts','place','date_transmission','arch'];
}
