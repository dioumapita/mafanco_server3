<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportationFIle extends Model
{
    use HasFactory;

    protected $table = 'importation_file';

    protected $fillable = ['date_ajout','name_file'];

    protected $dates = ['date_ajout'];
}
