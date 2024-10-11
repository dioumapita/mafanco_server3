<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestOrdonnance extends Model
{
    use HasFactory;

    protected $table = 'gest_ordonnances';

    protected $fillable = [
        'datecrea','daterev','numero','date','demandeurs',
        'decision_ordonnance','arch'
    ];
}
