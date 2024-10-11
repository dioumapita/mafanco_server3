<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocRgArrive extends Model
{
    use HasFactory;

    protected $table = 'doc_rg_arrives';

    protected $fillable = ['nom_doc','chemin_doc','rg_arrives_id'];


}
