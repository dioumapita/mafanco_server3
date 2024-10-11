<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestHeredite extends Model
{
    use HasFactory;

    protected $table = 'gest_heredites';

    protected $fillable = [
        'datecrea','daterev','numero','date','affaire','objet','arch'
    ];
}
