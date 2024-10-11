<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scelle extends Model
{
    use HasFactory;

    protected $table = 'scelles';

    protected $fillable = ['num','date_ajout','affaire','designation','obs','infraction','date_sortie'];

    protected $dates = ['date_ajout','date_sortie'];
}
