<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestPlumitifCivil extends Model
{
    use HasFactory;

    protected $table = 'gest_plumitif_civils';

    protected $fillable = [
        'datecrea','daterev','numero','date_decision','affaire',
        'objet','date_appel','date_transmission','arch'
    ];
}
