<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActeInculpe extends Model
{
    use HasFactory;

    protected $table = 'acte_inculpes';

    protected $fillable = ['date_actes','nature_actes','rg_instructions_id'];

    protected $dates = ['date_actes'];
}
