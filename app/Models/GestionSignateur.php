<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionSignateur extends Model
{
    use HasFactory;

    protected $table = 'gestion_signateurs';

    protected $fillable = ['nom_signateur','sexe','fonction','status'];
}
