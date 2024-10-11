<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlumitifCorrectionnel extends Model
{
    use HasFactory;

    protected $table = 'plumitif_correctionnels';

    protected $fillable = ['numero','date','objet','affaire'];
}
