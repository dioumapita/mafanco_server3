<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestNationalite extends Model
{
    use HasFactory;

    protected $table = 'gest_nationalites';

    protected $fillable = [
        'datecrea','daterev','numero','date','nom','date_naissance',
        'lieu_naissance','filiation','arch'
    ];
}
