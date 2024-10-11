<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlumitifCivil extends Model
{
    use HasFactory;

    protected $table = 'plumitif_civils';

    protected $fillable = ['numero','date','objet','affaire'];
}
