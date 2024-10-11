<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RgAppel extends Model
{
    use HasFactory;

    protected $table = 'rg_appels';

    protected $fillable = ['num','date_appel','appelant','contact_1','defendeur','contact_2','juge','etat','date_transmition'];

    protected $dates = ['date_appel','date_transmition'];

    public function docAppels()
    {
        return $this->hasMany('App\Models\DocAppel','rg_appels_id','id');
    }
}
