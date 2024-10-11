<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierFlagrantDelit extends Model
{
    use HasFactory;

    protected $table = 'dossier_flagrant_delits';

    protected $fillable = ['num_rp','pr_contre','detention','conseil','contact','prevention','plaignant'];
}
