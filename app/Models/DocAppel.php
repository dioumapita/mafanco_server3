<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocAppel extends Model
{
    use HasFactory;

    protected $table = 'doc_appels';

    protected $fillable = ['nom_doc','chemin_doc','rg_appels_id'];
}
