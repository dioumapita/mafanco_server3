<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocRgInstruction extends Model
{
    use HasFactory;

    protected $table = 'doc_rg_instructions';

    protected $fillable = ['nom_doc','chemin_doc','rg_instructions_id'];
}
