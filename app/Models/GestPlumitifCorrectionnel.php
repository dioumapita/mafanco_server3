<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestPlumitifCorrectionnel extends Model
{
    use HasFactory;

    protected $table = 'gest_plumitif_correctionnels';

    protected $fillable = [
        'datecrea','daterev','numero','date_decision','affaire','prevention',
        'partie_civile','arch'
    ];
}
