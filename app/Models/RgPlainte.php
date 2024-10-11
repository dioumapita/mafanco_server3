<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RgPlainte extends Model
{
    use HasFactory;

    protected $table = 'rg_plaintes';

    protected $fillable = ['num','date_plainte','origine','infraction','partie_civil','orientation'];

    protected $dates = ['date_plainte'];

    public function accuses()
    {
        return $this->hasMany('App\Models\Accuse','rg_plaintes_id','id');
    }

    public function docPlaintes()
    {
        return $this->hasMany('App\Models\DocPlainte','rg_plaintes_id','id');
    }
}
