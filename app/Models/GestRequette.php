<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestRequette extends Model
{
    use HasFactory;

    protected $table = 'gest_requettes';

    protected $fillable = [
        'datecrea','daterev','numero','date_requete','requerant','objet','arch'
    ];
}
