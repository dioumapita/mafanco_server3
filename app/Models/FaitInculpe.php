<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaitInculpe extends Model
{
    use HasFactory;

    protected $table = 'fait_inculpes';

    protected $fillable = ['date_faits','nature_faits','rg_instructions_id'];

    protected $dates = ['date_faits'];
}
