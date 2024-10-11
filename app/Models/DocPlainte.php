<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocPlainte extends Model
{
    use HasFactory;

    protected $table = 'doc_plaintes';

    protected $fillable = ['nom_doc','chemin_doc','rg_plaintes_id'];
}
