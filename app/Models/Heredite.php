<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heredite extends Model
{
    use HasFactory;

    protected $table = 'heredites';

    protected $fillable = ['numero','date','affaire','objet'];
}
