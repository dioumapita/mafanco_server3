<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appel extends Model
{
    use HasFactory;

    protected $table = 'appels';

    protected $fillable = ['numero','date_appel','les_parties','type','date_transmission','name_file'];
}
