<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requette extends Model
{
    use HasFactory;

    protected $table = 'requettes';

    protected $fillable = ['numero','date_requette','requerant','objet'];
}
