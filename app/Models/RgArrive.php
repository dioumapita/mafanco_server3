<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RgArrive extends Model
{
    use HasFactory;

    protected $table = 'rg_arrives';

    protected $fillable = ['num','date_ajout','origine','objet','description'];

    protected $dates = ['date_ajout'];

    public function docrgArrives()
    {
        return $this->hasMany('App\Models\DocRgArrive','rg_arrives_id','id');
    }
}
